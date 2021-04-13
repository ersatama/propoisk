<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.
Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('subcategory', 'SubCategoryCrudController');
    Route::crud('filter', 'FilterCrudController');
    Route::crud('globalfilter', 'GlobalFilterCrudController');
    Route::crud('announcement', 'AnnouncementCrudController');
    Route::crud('task', 'TaskCrudController');
    Route::crud('country', 'CountryCrudController');
    Route::crud('region', 'RegionCrudController');
    Route::crud('city', 'CityCrudController');
    Route::crud('statistics', 'StatisticsCrudController');
    Route::crud('company', 'CompanyCrudController');
    Route::crud('advertising', 'AdvertisingCrudController');
    Route::crud('chat', 'ChatCrudController');
    Route::crud('support', 'SupportCrudController');
    Route::crud('payments', 'PaymentsCrudController');
    Route::crud('settings', 'SettingsCrudController');
    Route::crud('notification', 'NotificationCrudController');
    Route::crud('api', 'ApiCrudController');
}); // this should be the absolute last line of this file