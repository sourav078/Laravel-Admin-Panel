<?php


use App\Http\Controllers\BlogController;

use App\Http\Controllers\PortfolioController;

use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GroupController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\UserSettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::redirect('/', '/admin');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('clear-all', function () {
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('clear-compiled');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    dd(
        'Cached Cleared'
        . ' view:clear ' .
        ' config:clear ' .
        ' cache:clear ' .
        ' config:cache ' .
        ' clear-compiled ' .
        ' route:clear '
    );
});

Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::post('/admin/login/submit', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout/submit', [LoginController::class, 'logout'])->name('admin.logout.submit');

/**
 * ====================================================================================
 * if this prefix changed admin changed then please change the 48 to 51 line route code
 * ====================================================================================
 */

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('roles', RolesController::class, ['name' => 'admin.roles']);
    Route::post('roles/multiple_request_submit', [RolesController::class, 'multiple_role_submit'])->name('admin.roles.multiple.create');
    Route::resource('users', UsersController::class, ['name' => 'admin.users']);
    /**
     * here setting extra route
     */
    /**
     * For datatable ajax route setting here
     */
    Route::get('users_all', [UsersController::class, 'allUser'])->name('users.lists.all');
    /**
     * End
     */
    Route::get('users/destroy_by_hard_delete/{id}', [UsersController::class, 'destroy_by_hard_delete'])->name('users.destroy_by_hard_delete');
    Route::get('restore_user', [UsersController::class, 'restore_user'])->name('users.restore');
    Route::get('users/restore_user_process/{id}', [UsersController::class, 'restore_user_process'])->name('users.restore_user_process');
    /**
     * User settings route start
     */
    Route::get('user/settings', [UserSettingsController::class, 'index'])->name('user.settings');
    Route::get('user/settings/update', [UserSettingsController::class, 'update'])->name('user.settings.update');
    /**
     * User settings route end
     */
    Route::resource('permission', PermissionController::class, ['name' => 'admin.permission']);
    Route::resource('group', GroupController::class, ['name' => 'admin.group']);


    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::get('/password/reset/submit', [ForgotPasswordController::class, 'reset'])->name('admin.password.update');
    /**
     * forget password related
     */
    Route::get('/forget-password', [\App\Http\Controllers\Backend\PasswordController::class, 'generatePasswordResetForm'])->name('admin.password.forget');
    Route::post('/forget-password-processing', [\App\Http\Controllers\Backend\PasswordController::class, 'forgetPasswordEmailHandler'])->name('admin.password.forget.submit');
    Route::get('/forget-password-reset-new', [\App\Http\Controllers\Backend\PasswordController::class, 'resetNewPassword'])->name('admin.password.forget.reset.new');
    Route::post('/new-password-process', [\App\Http\Controllers\Backend\PasswordController::class, 'newPasswordProcess'])->name('admin.new.password.process');
    /**
     * Account settings
     */
    Route::get('/account-settings', [DashboardController::class, 'accountSettings'])->name('admin.home.account.settings');
    Route::post('/account-settings-submit', [DashboardController::class, 'accountSettingsSubmitForm'])->name('admin.home.account.settings.submit');
    /**
     * Service
     */
// Route for displaying all services
    Route::get('/services', [ServiceController::class, 'index'])->name('service.index');

// Route for displaying the form to create a new service
    Route::get('/services/create', [ServiceController::class, 'create'])->name('service.create');

// Route for storing a new service
    Route::post('/services', [ServiceController::class, 'store'])->name('service.store');

// Route for displaying a specific service
    Route::get('/services/{service}', [ServiceController::class, 'show'])->name('service.show');

// Route for displaying the form to edit a specific service
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('service.edit');

// Route for updating a specific service
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('service.update');

// Route for deleting a specific service
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('service.destroy');





    Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');


    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create');


    Route::post('/blogs', [BlogController::class, 'store'])->name('blog.store');


    Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog.show');


    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');


    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blog.update');


    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');

    /**
     * portfolio
     */
// Route for displaying all services
    Route::get('/portfolios', [PortfolioController::class, 'index'])->name('portfolio.index');

// Route for displaying the form to create a new service
    Route::get('/portfolios/create', [PortfolioController::class, 'create'])->name('portfolio.create');

// Route for storing a new service
    Route::post('/portfolios', [PortfolioController::class, 'store'])->name('portfolio.store');

// Route for displaying a specific service
    Route::get('/portfolios/{portfolio}', [PortfolioController::class, 'show'])->name('portfolio.show');

// Route for displaying the form to edit a specific service
    Route::get('/portfolios/edit/{portfolio}', [PortfolioController::class, 'edit'])->name('portfolio.edit');

// Route for updating a specific service
    Route::put('/portfolios/{portfolio}', [PortfolioController::class, 'update'])->name('portfolio.update');

// Route for deleting a specific service
    Route::delete('/portfolios/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');

});
