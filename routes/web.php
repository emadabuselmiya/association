<?php

use App\Http\Controllers\ControlPanel\BlogController;
use App\Http\Controllers\ControlPanel\ClientController;
use App\Http\Controllers\ControlPanel\ContactController as ControlPanelContactController;
use App\Http\Controllers\ControlPanel\DashboardController;
use App\Http\Controllers\ControlPanel\OrderController as ControlPanelOrderController;
use App\Http\Controllers\ControlPanel\PageController;
use App\Http\Controllers\ControlPanel\StaticPagesController;
use App\Http\Controllers\ControlPanel\PhotoAlbumController;
use App\Http\Controllers\ControlPanel\PlanController;
use App\Http\Controllers\ControlPanel\ProjectController;
use App\Http\Controllers\ControlPanel\SubServiceController;
use App\Http\Controllers\ControlPanel\TeamController;
use App\Http\Controllers\ControlPanel\UserController;
use App\Http\Controllers\ControlPanel\SliderController;
use App\Http\Controllers\ControlPanel\SpecialtyController;
use App\Http\Controllers\ControlPanel\VedioAlbumController;
use App\Http\Controllers\ControlPanel\WebsitController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\ViewController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlPanel\MenuController;
use App\Http\Controllers\ControlPanel\SubMenuController;
use App\Http\Controllers\ControlPanel\ServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group([
    'as' => 'site.',
], function () {
    Route::get('/', [SiteController::class, 'index'])->name('home');
    Route::get('/st/{slug}', [SiteController::class, 'view_page'])->name('view-page');

});


// Control Panel Routs
Route::middleware('auth')
    ->prefix('c-panel')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('users', [UserController::class, 'index'])->name('all-users');
        Route::get('users/create', [UserController::class, 'create'])->name('create-users');
        Route::post('users/create', [UserController::class, 'store'])->name('store-users');
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('edit-users');
        Route::put('users/{user}', [UserController::class, 'update'])->name('update-users');
        Route::delete('users', [UserController::class, 'destroy'])->name('delete-users');

        Route::get('setting/website-setting', [WebsitController::class, 'edit'])->name('setting-website-edit');
        Route::post('setting/website-setting', [WebsitController::class, 'update'])->name('setting-website-update');

        Route::resource('services', ServiceController::class);
        Route::resource('subservices', SubServiceController::class);
        Route::resource('clients', ClientController::class);
        Route::resource('projects', ProjectController::class);
        Route::resource('pages', PageController::class);
        Route::resource('pages/static', StaticPagesController::class);
        Route::resource('blogs', BlogController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('orders', ControlPanelOrderController::class);
        Route::get('contacts', [ControlPanelContactController::class, 'index'])->name('contacts.index');
        Route::get('contacts/{contact}', [ControlPanelContactController::class, 'show'])->name('contacts.show');
        Route::delete('contacts/{contact}', [ControlPanelContactController::class, 'destroy'])->name('contacts.destroy');
        Route::resource('sliders', SliderController::class);

        Route::resource('specialties', SpecialtyController::class);

        Route::resource('photo-album', PhotoAlbumController::class);
        Route::put('photo-album/{photo_album}/photos', [PhotoAlbumController::class, 'updatePhotos'])->name('photo-album.updatePhotos');
        Route::resource('vedio-album', VedioAlbumController::class);

        Route::get('plans/{service}', [PlanController::class, 'show'])->name('plans.show');
        Route::get('plans/create/{service}', [PlanController::class, 'create'])->name('plans.create');
        Route::post('plans/create', [PlanController::class, 'store'])->name('plans.store');
        Route::get('plans/{plan}/edit', [PlanController::class, 'edit'])->name('plans.edit');
        Route::put('plans/{plan}/edit', [PlanController::class, 'update'])->name('plans.update');
        Route::delete('plans/{plan}', [PlanController::class, 'destroy'])->name('plans.destroy');

        Route::resource('menus', MenuController::class);
        Route::resource('sub-menus', SubMenuController::class);

        Route::get('sub-menu/ajax/{id}', [PageController::class, 'getSubMenus'])->name('subMenu.ajax');
    });


require __DIR__ . '/auth.php';
