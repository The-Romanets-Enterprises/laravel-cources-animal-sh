<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\UserRequest;
use App\Models\Photo;
use App\Models\User;
use App\Rules\Auth\MatchOldPasswordRule;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $role = $request->enum('role', Role::class);

        $title = __('messages.user.plural');

        $users = User::query();
        if ($role)
        {
            $users->where('role', $role);
        }
        $users->orderBy('created_at', 'DESC');
        $users = $users->paginate(config('settings.paginate'));

//        $date_now = now();
//        $date_create = Carbon::create();
//        $date_parse = Carbon::parse('2008-10-05');
//
//        dump($date_now->format('d M Y'));
//        dump($date_create->format('d M Y'));
//        dump($date_parse->translatedFormat('d M Y'));
//
//        $date_end = $date_now->clone()->addDays(10);
////        $date_end->subDays(10);
//
//        dump('==================');
//
//        dump($date_now->format('d M Y'));
//        dump($date_end->format('d M Y'));
//
//        dump($date_now->diffInHours($date_end));
//        dump($date_now->clone());
//        dump($date_now->days(1));
//        dump($date_now->days(1));

//        $str = str('Hello world Привет мир');
//        $random = Str::random(20);
//        $password = Str::password();
//        $my_str = Str::of('MY string');
//
//        dump($str);
//        dump($str->upper());
//        dump($str->lower());
//        dump($str->title());
//        dump($str->take(4));
//        dump($str->words(2, '...'));
//        dump($str->camel());
//        dump($str->reverse());
//        dump($random);

//        $values = collect([
//            4, 8, 10, 25, 9, 3, 5, 8
//        ]);
//        dump($values->skip(2)->take(2));
//        dump($values->contains(25));
//        dump($values->search(25));
//        dump($values->search(444));
//        dump((bool)$values->search(4));
//        dump($values->filter(function ($value) {
//            return true;
//        }));
//        $values->put('hello', 'World');
//        $values->push([
//            '84' => 454
//        ]);
//        $values->add([
//            '84' => 454
//        ]);

//        $values->forget(5);
//        $values->pull(5);
//        $values->chunk(5);
//        $values->pluck();
//        dump($values);

        return view('admin.user.index', compact(
            'title',
            'role',
            'users',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $title = __('messages.user.create');

        return view('admin.user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $user = User::createUser($request);

        $redirect = to_route('admin.users.index');

        if (!$user)
        {
            return $redirect->with('error', __('messages.user.error.store'));
        }

        $this->syncFiles($request, $user, 'photos');

        return $redirect->with('success', __('messages.user.success.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        $title = __('messages.user.edit', ['user' => $user->name]);

        $photosFiles = $this->prepareFileData($user->photos);

        return view('admin.user.edit', compact(
            'title',
            'user',
            'photosFiles',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $result = User::updateUser($request, $user);

        $redirect = to_route('admin.users.index');

        $this->syncFiles($request, $user, 'photos');

        if (!$result)
        {
            return $redirect->with('error', __('messages.user.error.update'));
        }

        return $redirect->with('success', __('messages.user.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        $is_destroyed = DB::transaction(function () use ($user) {
            // Удаляем связанные фото
            foreach ($user->photos as $photo) {
                if (Storage::disk('public')->exists($photo->path)) {
                    Storage::disk('public')->delete($photo->path);
                }
                $photo->deletePhoto($photo);
            }
            // Удаляем саму сущность
            return User::deleteUser($user) !== null;
        });

        $redirect = redirect()->back();

        if ($is_destroyed === null)
        {
            return $redirect->with('error', __('messages.user.error.my-self'));
        }

        return $redirect->with('success', __('messages.user.success.destroy'));
    }

    protected function prepareFileData($files)
    {
        return $files->map(fn($file) => [
            'source' => asset('storage/' . $file->path),
            'options' => [
                'type' => 'local',
                'file' => [
                    'name' => basename($file->path),
                    'type' => mime_content_type(storage_path('app/public/' . $file->path))
                ]
            ]
        ])->toArray();
    }

    protected function syncFiles($request, $user, $type)
    {
        $model = Photo::class;
        $existingFiles = $user->$type->pluck('path')->toArray();
        $newFilePaths = array_filter($request->input($type, []), 'is_string');

        // Удаление файлов
        $filesToDelete = array_diff($existingFiles, $newFilePaths);
        foreach ($filesToDelete as $path) {
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $user->$type()->where('path', $path)->delete();
        }

        // Добавление новых файлов
        if ($request->has($type)) {
            foreach ($newFilePaths as $path) {
                if (is_string($path) && Storage::disk('public')->exists($path) && !in_array($path, $existingFiles)) {
                    $newPath = "users/$type/" . basename($path);
                    Storage::disk('public')->move($path, $newPath);
                    $model::createFromPath($newPath, $user->id, User::class);
                }
            }
        }
    }

    public function changePassword()
    {
        $title = __('messages.user.change-password');

        return view('admin.user.change-password', compact('title'));
    }

    public function passwordStore(ChangePasswordRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $user->password = Hash::make($request->new_password);
        $user->update();

        return to_route('admin.home')->with('success', __('messages.user.success.change-password'));
    }
}
