<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin-dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('admin-dashboard', route('admin-dashboard'));
});

//  Villas Breadcrumb

Breadcrumbs::for('villa-list', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-dashboard');
    $trail->push('Villa list', url('admin-dashboard/villas'));
});

Breadcrumbs::for('add-new-villas', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-dashboard');
    $trail->push('Add new villas', url('admin-dashboard/villas'));
});

Breadcrumbs::for('edit-villa', function (BreadcrumbTrail $trail, $villas) {
    $trail->parent('villa-list');
    $trail->push($villas->name, url('admin-dashboard/villa-update/{slug}', $villas));
});

Breadcrumbs::for('view-villa', function (BreadcrumbTrail $trail, $villas) {
    $trail->parent('villa-list');
    $trail->push($villas->name, url('admin-dashboard/villas/{slug}', $villas));
});

// Amenities breadcrumbs

Breadcrumbs::for('amenities-list',function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Amenities List', url('admin-dashboard/amenities'));
});

// Service Breadcrumb 

Breadcrumbs::for('service-list',function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Service List', url('admin-dashboard/services'));
});

// Property type Breadcrumb

Breadcrumbs::for('property-type-list',function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Property types', url('admin-dashboard/catgories'));
});