<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Menu
Breadcrumbs::for('main', function (BreadcrumbTrail $trail) {
    $trail->push('Menu', route('menu'), ['icon' => 'fa-solid fa-border-all']);
    $trail->push('Keranjang', route('cart'), ['icon' => 'fa-solid fa-bag-shopping']);
    $trail->push('Meja', route('seat'), ['icon' => 'fa-solid fa-chair']);
    $trail->push('Pembayaran', route('payment'), ['icon' => 'fa-solid fa-wallet']);
    $trail->push('Riwayat', route('history'), ['icon' => 'fa-solid fa-clock-rotate-left']);
});

// Home
Breadcrumbs::for('menu', function (BreadcrumbTrail $trail) {
    $trail->push('Menu', route('menu'), ['icon' => 'fa-solid fa-border-all']);
});

// Home > Cart
Breadcrumbs::for('cart', function (BreadcrumbTrail $trail) {
    $trail->parent('menu');
    $trail->push('Keranjang', route('cart'), ['icon' => 'fa-solid fa-bag-shopping']);
});

// Home > Cart > Seat
Breadcrumbs::for('seat', function (BreadcrumbTrail $trail) {
    $trail->parent('cart');
    $trail->push('Meja', route('seat'), ['icon' => 'fa-solid fa-chair']);
});

// Home > Cart > Seat > Payment
Breadcrumbs::for('payment', function (BreadcrumbTrail $trail) {
    $trail->parent('seat');
    $trail->push('Pembayaran', route('payment'), ['icon' => 'fa-solid fa-wallet']);
});

// Home > Cart > Seat > Payment
Breadcrumbs::for('summary', function (BreadcrumbTrail $trail) {
    $trail->parent('payment');
});

// Home > Cart > Seat > Payment > History
Breadcrumbs::for('history', function (BreadcrumbTrail $trail) {
    $trail->parent('payment');
    $trail->push('Riwayat', route('history'), ['icon' => 'fa-solid fa-clock-rotate-left']);
});
