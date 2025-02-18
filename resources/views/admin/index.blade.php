@extends('layouts.layout')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <!-- Content Header (Page header) -->
    @include('layouts.page-header')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @isset($animal_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-purple">
                            <div class="inner">
                                <h3>{{ $animal_count }}</h3>

                                <p>{{ __('messages.animal.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-paw"></i>
                            </div>
                            <a href="<?=route('admin.animals.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                @isset($animal_pet_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-info">
                            <div class="inner">
                                <h3>{{ $animal_pet_count }}</h3>

                                <p>{{ __('messages.animal_pet.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-bug"></i>
                            </div>
                            <a href="<?=route('admin.animal_pets.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @isset($car_piece_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-olive">
                            <div class="inner">
                                <h3>{{ $car_piece_count }}</h3>

                                <p>{{ __('messages.car_piece.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-gears"></i>
                            </div>
                            <a href="<?=route('admin.car-pieces.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                @isset($faq_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-teal">
                            <div class="inner">
                                <h3>{{ $faq_count }}</h3>

                                <p>{{ __('messages.faq.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-question"></i>
                            </div>
                            <a href="<?=route('admin.faqs.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                @isset($article_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-secondary">
                            <div class="inner">
                                <h3>{{ $article_count }}</h3>

                                <p>{{ __('messages.article.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <a href="<?=route('admin.articles.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @isset($color_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-orange">
                            <div class="inner">
                                <h3>{{ $color_count }}</h3>

                                <p>{{ __('messages.color.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-palette"></i>
                            </div>
                            <a href="<?=route('admin.colors.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                @isset($interior_color_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-lime">
                            <div class="inner">
                                <h3>{{ $interior_color_count }}</h3>

                                <p>{{ __('messages.interior_color.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-palette"></i>
                            </div>
                            <a href="<?=route('admin.interior-colors.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                @isset($interior_material_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-cyan">
                            <div class="inner">
                                <h3>{{ $interior_material_count }}</h3>

                                <p>{{ __('messages.interior_material.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-swatchbook"></i>
                            </div>
                            <a href="<?=route('admin.interior-materials.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                @isset($equipment_category_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-yellow">
                            <div class="inner">
                                <h3>{{ $equipment_category_count }}</h3>

                                <p>{{ __('messages.equipment_category.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-gear"></i>
                            </div>
                            <a href="<?=route('admin.equipment-categories.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @isset($damage_type_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-warning">
                            <div class="inner">
                                <h3>{{ $damage_type_count }}</h3>

                                <p>{{ __('messages.damage_type.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-screwdriver-wrench"></i>
                            </div>
                            <a href="<?=route('admin.damage-types.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                @isset($tech_damage_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-indigo">
                            <div class="inner">
                                <h3>{{ $tech_damage_count }}</h3>

                                <p>{{ __('messages.tech_damage.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-screwdriver-wrench"></i>
                            </div>
                            <a href="<?=route('admin.tech-damages.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                @isset($special_damage_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-maroon">
                            <div class="inner">
                                <h3>{{ $special_damage_count }}</h3>

                                <p>{{ __('messages.special_damage.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-screwdriver-wrench"></i>
                            </div>
                            <a href="<?=route('admin.special-damages.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                @isset($internal_damage_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-teal">
                            <div class="inner">
                                <h3>{{ $internal_damage_count }}</h3>

                                <p>{{ __('messages.internal_damage.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-screwdriver-wrench"></i>
                            </div>
                            <a href="<?=route('admin.internal-damages.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @isset($ecology_class_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-cyan">
                            <div class="inner">
                                <h3>{{ $ecology_class_count }}</h3>

                                <p>{{ __('messages.ecology_class.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-wind"></i>
                            </div>
                            <a href="<?=route('admin.ecology-classes.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                @isset($transmission_type_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-warning">
                            <div class="inner">
                                <h3>{{ $transmission_type_count }}</h3>

                                <p>{{ __('messages.transmission_type.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-gears"></i>
                            </div>
                            <a href="<?=route('admin.transmission-types.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                @isset($body_type_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-success">
                            <div class="inner">
                                <h3>{{ $body_type_count }}</h3>

                                <p>{{ __('messages.body_type.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-car-side"></i>
                            </div>
                            <a href="<?=route('admin.body-types.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                @isset($fuel_type_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-primary">
                            <div class="inner">
                                <h3>{{ $fuel_type_count }}</h3>

                                <p>{{ __('messages.fuel_type.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-gas-pump"></i>
                            </div>
                            <a href="<?=route('admin.fuel-types.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @isset($city_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-red">
                            <div class="inner">
                                <h3>{{ $city_count }}</h3>

                                <p>{{ __('messages.city.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-city"></i>
                            </div>
                            <a href="<?=route('admin.cities.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                @isset($country_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-teal">
                            <div class="inner">
                                <h3>{{ $country_count }}</h3>

                                <p>{{ __('messages.country.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-flag"></i>
                            </div>
                            <a href="<?=route('admin.countries.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
                    @isset($address_count)
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-gradient-blue">
                                <div class="inner">
                                    <h3>{{ $address_count }}</h3>

                                    <p>{{ __('messages.address.plural') }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-map"></i>
                                </div>
                                <a href="<?=route('admin.addresses.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    @endisset
                @isset($language_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-secondary">
                            <div class="inner">
                                <h3>{{ $language_count }}</h3>

                                <p>{{ __('messages.language.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <a href="<?=route('admin.languages.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @if(auth()->user()->role == \App\Enums\Role::ADMIN)
                    @isset($token_count)
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>{{ $token_count }}</h3>

                                    <p>{{ __('messages.token.plural') }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-solid fa-key"></i>
                                </div>
                                <a href="<?=route('admin.tokens.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    @endisset
                    @isset($admin_count)
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>{{ $admin_count }}</h3>

                                    <p>{{ __('messages.admin.plural') }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-solid fa-user"></i>
                                </div>
                                <a href="<?=route('admin.admins.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    @endisset
                @endif
                @isset($user_count)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gray">
                            <div class="inner">
                                <h3>{{ $user_count }}</h3>

                                <p>{{ __('messages.user.plural') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user"></i>
                            </div>
                            <a href="<?=route('admin.users.index')?>" class="small-box-footer">{{ __('messages.more') }} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endisset
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
