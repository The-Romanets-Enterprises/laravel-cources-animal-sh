<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Animal;
use App\Models\AnimalPet;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// ======================= FRONT =========================

// Home
Breadcrumbs::for('front.home', function (BreadcrumbTrail $trail) {
    $trail->push(__('messages.main'), route('front.home'));
});

// ======================= ADMIN =========================

// Home
Breadcrumbs::for('admin.home', function (BreadcrumbTrail $trail) {
    $trail->push(__('messages.main'), route('admin.home'));
});

// Article
// Home > Article
Breadcrumbs::for('admin.articles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push(__('messages.article.plural'), route('admin.articles.index'));
});

// Home > Article > Create
Breadcrumbs::for('admin.articles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.articles.index');
    $trail->push(__('messages.article.create'), route('admin.articles.create'));
});

// Home > Article > Edit
Breadcrumbs::for('admin.articles.edit', function (BreadcrumbTrail $trail, Article $article) {
    $trail->parent('admin.articles.index');
    $trail->push(str($article->title)->words(4), route('admin.articles.edit', [$article]));
});

// User
// Home > User
Breadcrumbs::for('admin.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push(__('messages.user.plural'), route('admin.users.index'));
});

// Home > User > Create
Breadcrumbs::for('admin.users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users.index');
    $trail->push(__('messages.user.create'), route('admin.users.create'));
});

// Home > User > Edit
Breadcrumbs::for('admin.users.edit', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('admin.users.index');
    $trail->push($user->name, route('admin.users.edit', $user));
});

// Home > ChangePassword
Breadcrumbs::for('admin.change-password', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push(__('messages.user.change-password'), route('admin.change-password'));
});

// City
// Home > City
Breadcrumbs::for('admin.cities.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push(__('messages.city.plural'), route('admin.cities.index'));
});

// Home > City > Create
Breadcrumbs::for('admin.cities.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.cities.index');
    $trail->push(__('messages.city.create'), route('admin.cities.create'));
});

// Home > City > Edit
Breadcrumbs::for('admin.cities.edit', function (BreadcrumbTrail $trail, City $city) {
    $trail->parent('admin.cities.index');
    $trail->push($city->name, route('admin.cities.edit', $city));
});

// Country
// Home > Country
Breadcrumbs::for('admin.countries.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push(__('messages.country.plural'), route('admin.countries.index'));
});

// Home > Country > Create
Breadcrumbs::for('admin.countries.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.countries.index');
    $trail->push(__('messages.country.create'), route('admin.countries.create'));
});

// Home > Country > Edit
Breadcrumbs::for('admin.countries.edit', function (BreadcrumbTrail $trail, Country $country) {
    $trail->parent('admin.countries.index');
    $trail->push($country->name, route('admin.countries.edit', $country));
});

// Animal
// Home > Animal
Breadcrumbs::for('admin.animals.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push(__('messages.animal.plural'), route('admin.animals.index'));
});

// Home > Animal > Create
Breadcrumbs::for('admin.animals.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.animals.index');
    $trail->push(__('messages.animal.create'), route('admin.animals.create'));
});

// Home > Animal > Edit
Breadcrumbs::for('admin.animals.edit', function (BreadcrumbTrail $trail, Animal $animal) {
    $trail->parent('admin.animals.index');
    $trail->push($animal->name, route('admin.animals.edit', $animal));
});

// AnimalPet
// Home > AnimalPet
Breadcrumbs::for('admin.animal-pets.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push(__('messages.animal_pet.plural'), route('admin.animal-pets.index'));
});

// Home > AnimalPet > Create
Breadcrumbs::for('admin.animal-pets.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.animal-pets.index');
    $trail->push(__('messages.animal_pet.create'), route('admin.animal-pets.create'));
});

// Home > AnimalPet > Edit
Breadcrumbs::for('admin.animal-pets.edit', function (BreadcrumbTrail $trail, AnimalPet $animalPet) {
    $trail->parent('admin.animal-pets.index');
    $trail->push($animalPet->name, route('admin.animal-pets.edit', $animalPet));
});

// Token
// Home > Token
Breadcrumbs::for('admin.tokens.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push(__('messages.token.plural'), route('admin.tokens.index'));
});

// Home > Token > Create
Breadcrumbs::for('admin.tokens.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.tokens.index');
    $trail->push(__('messages.token.create'), route('admin.tokens.create'));
});

// Home > Token > Edit
Breadcrumbs::for('admin.tokens.edit', function (BreadcrumbTrail $trail, $token) {
    $trail->parent('admin.tokens.index');

    $token = auth()->user()->tokens()->findOrFail($token);

    $trail->push($token->name, route('admin.tokens.edit', $token->name));
});

//// Home > Blog > [Category]
//Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//    $trail->parent('blog');
//    $trail->push($category->title, route('category', $category));
//});
