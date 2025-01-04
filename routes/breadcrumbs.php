<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Article;
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
