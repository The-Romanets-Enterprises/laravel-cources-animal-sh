<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class FileUploadController extends Controller
{
    /**
     * Загрузка файла.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        /** @var UploadedFile[] $files */
        $files = $request->allFiles();

        if (empty($files)) {
            abort(422, 'Никакие файлы не были загружены.');
        }

        if (count($files) > 1) {
            abort(422, 'Одновременно может быть загружен только 1 файл.');
        }

        $requestKey = array_key_first($files);
        $file = is_array($request->input($requestKey))
            ? $request->file($requestKey)[0]
            : $request->file($requestKey);

        $path = $file->store('tmp', 'public'); // Сохраняем во временную папку

        return response()->json(['path' => $path]);
    }


    /**
     * Удаление файла.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        $content = $request->getContent();

        // Проверяем, что данные есть
        if (empty($content)) {
            return response()->json(['error' => 'Данные для удаления не переданы.'], 400);
        }

        // Декодируем JSON
        $data = json_decode($content, true);

        // Если декодирование не удалось или это не массив
        if (!is_array($data)) {
            // Предполагаем, что это может быть просто строка (путь)
            $filePath = $content;
        } else {
            // Иначе берем путь из массива
            $filePath = $data['path'] ?? null;
        }

        if (!$filePath) {
            return response()->json(['error' => 'Путь к файлу не указан.'], 400);
        }

        // Удаляем обратные слэши и приводим к нормальному виду
        $filePath = str_replace('\\', '/', $filePath);

        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            return response()->json(['success' => 'Файл успешно удален.']);
        }

        return response()->json(['error' => 'Файл не найден.'], 404);
    }
}
