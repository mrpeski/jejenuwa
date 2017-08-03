<?php

Breadcrumbs::register('dash', function($breadcrumbs)
{
    $breadcrumbs->push('Dashboard', route('dash'));
});

Breadcrumbs::register('dash_asset', function($breadcrumbs)
{
    $breadcrumbs->push('Dashboard');
    $breadcrumbs->push('Asset Tracking');
});

// Home > Pages
Breadcrumbs::register('pages', function($breadcrumbs)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push('Pages', route('Page_index'));
});

Breadcrumbs::register('new_page', function($breadcrumbs)
{
    $breadcrumbs->parent('pages');
    $breadcrumbs->push('Add New Page', route('Page_create'));
});

Breadcrumbs::register('edit_page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('pages');
    $breadcrumbs->push($page->title, route('Page_edit', $page->id));
});

// Home > Media
Breadcrumbs::register('media', function($breadcrumbs)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push('Media', route('Media_index'));
});

// Home > Settings
Breadcrumbs::register('settings', function($breadcrumbs)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push('Setting', route('Setting_index'));
});

// Home > Settings
Breadcrumbs::register('menu', function($breadcrumbs)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push('Menu', route('Menu_index'));
});

Breadcrumbs::register('bin', function($breadcrumbs)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push('Bin', route('Bin_index'));
});

Breadcrumbs::register('warehouse', function($breadcrumbs)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push('Inventory');
    $breadcrumbs->push('Warehouse', route('Warehouse_index'));
});

Breadcrumbs::register('new_warehouse', function($breadcrumbs)
{
    $breadcrumbs->parent('warehouse');
    $breadcrumbs->push('New', route('Warehouse_create'));
});

Breadcrumbs::register('flow', function($breadcrumbs)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push('Inventory');
    $breadcrumbs->push('Flow', route('Product_flow'));
});

Breadcrumbs::register('insights', function($breadcrumbs)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push('Inventory');
    $breadcrumbs->push('Insights', route('Product_index'));
});

Breadcrumbs::register('info', function($breadcrumbs)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push('Inventory');
    $breadcrumbs->push('Information', route('Ship_arrivals'));
});

Breadcrumbs::register('users', function($breadcrumbs)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push('Users', route('Staff_index'));
});

Breadcrumbs::register('user_single', function($breadcrumbs)
{
    $breadcrumbs->parent('users');
    $breadcrumbs->push('edit');
});


