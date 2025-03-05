<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" data-enable-remember="true" role="button"><i class="fas fa-bars"></i></a>
    </li>

    @if(auth()->user()->role == \App\Enums\Role::ADMIN)
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=route('admin.home')?>" class="nav-link">{{ __('messages.main') }}</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=route('admin.users.index')?>" class="nav-link">{{ __('messages.user.plural') }}</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=route('admin.animal_pets.index')?>" class="nav-link">{{ __('messages.animal_pet.plural') }}</a>
        </li>
    @else
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=route('user.home')?>" class="nav-link">{{ __('messages.main') }}</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=route('user.profile')?>" class="nav-link">{{ __('messages.user.profile') }}</a>
        </li>
{{--        <li class="nav-item d-none d-sm-inline-block">--}}
{{--            <a href="<?=route('user.animal_pets.index')?>" class="nav-link">{{ __('messages.animal_pet.plural') }}</a>--}}
{{--        </li>--}}
    @endif
    <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=route('logout')?>" class="nav-link">{{ __('messages.auth.logout') }}</a>
    </li>
</ul>
