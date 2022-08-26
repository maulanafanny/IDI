<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Menu
Breadcrumbs::for('menu', function (BreadcrumbTrail $trail) {
    $trail->push('Menu', route('menu'));
});

// Home > Checkout
Breadcrumbs::for('cart', function (BreadcrumbTrail $trail) {
    $trail->parent('menu');
    $trail->push('Cart', route('cart'));
});

// Home > Checkout > Seat
Breadcrumbs::for('seat', function (BreadcrumbTrail $trail) {
    $trail->parent('cart');
    $trail->push('Seat', route('seat'));
});

// Home > Checkout > Seat > Payment
Breadcrumbs::for('payment', function (BreadcrumbTrail $trail) {
    $trail->parent('seat');
    $trail->push('Payment', route('payment'));
});
