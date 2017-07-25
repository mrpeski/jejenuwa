<?php

Breadcrumbs::register('dash', function($breadcrumbs)
{
    $breadcrumbs->push('Dashboard', route('dash'));
});

// Home > Pages
Breadcrumbs::register('pages', function($breadcrumbs)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push('Pages', route('Page_index'));
});

// Home > Media
Breadcrumbs::register('media', function($breadcrumbs)
{
    $breadcrumbs->parent('dash');
    $breadcrumbs->push('Media', route('Media_index'));
});
