<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        @if(auth()->user()->role == \App\Enums\Role::ADMIN)
        <li class="nav-item">
            <a href="<?=route('admin.home')?>" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>{{ __('messages.main') }}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?=route('admin.cities.index')?>" class="nav-link">
                <i class="nav-icon fas fa-city"></i>
                <p>{{ __('messages.city.plural') }}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?=route('admin.countries.index')?>" class="nav-link">
                <i class="nav-icon fas fa-flag"></i>
                <p>{{ __('messages.country.plural') }}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?=route('admin.addresses.index')?>" class="nav-link">
                <i class="nav-icon fas fa-map"></i>
                <p>{{ __('messages.address.plural') }}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?=route('admin.animals.index')?>" class="nav-link">
                <i class="nav-icon fas fa-paw"></i>
                <p>{{ __('messages.animal.plural') }}</p>
            </a>
        </li>
        @else
            <li class="nav-item">
                <a href="<?=route('user.home')?>" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>{{ __('messages.main') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?=route('user.profile')?>" class="nav-link">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>{{ __('messages.user.profile') }}</p>
                </a>
            </li>
        @endif

{{--        <li class="nav-item has-treeview">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <i class="nav-icon fas fa-newspaper"></i>--}}
{{--                <p>--}}
{{--                    {{ __('messages.article.plural') }}--}}
{{--                    <i class="right fas fa-angle-left"></i>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('admin.articles.index') }}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>{{ __('messages.article.list') }}</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('admin.articles.create') }}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>{{ __('messages.article.create') }}</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
    </ul>
</nav>
<!-- /.sidebar-menu -->
