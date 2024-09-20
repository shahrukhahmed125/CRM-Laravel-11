<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\PipelineController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;


//// ---------- AUTHENTICATION  ---------- //// 


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login_auth', [AuthController::class, 'login_auth'])->name('login_auth');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/regsiter_auth', [AuthController::class, 'register_auth'])->name('register_auth');


//// ---------- ROLE: USER ---------- //// 


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [GuestController::class, 'index'])->name('guest.dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('guest.logout');
});


//// ---------- ROLE: ADMIN ---------- //// 


Route::middleware(['auth', 'role:admin'])->group(function () {

    // -------- DASHBOARD FUNCTIONS -------- //

    Route::get('/AdminDashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/AdminChangePassword', [AdminController::class, 'changePassword'])->name('admin.changePassword');
    Route::post('/AdminChangePasswordPost', [AdminController::class, 'changePasswordPost'])->name('admin.changePasswordPost');
    Route::get('/AdminProfile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::Post('/AdminProfilePost', [AdminController::class, 'profilePost'])->name('admin.profilePost');
    Route::get('/AdminLogout', [AuthController::class, 'logout'])->name('admin.logout');

    // -------- CUSTOMER CRUD AND SEARCH FUNCTIONS -------- //

    Route::get('/AdminCustomer', [AdminController::class, 'customerData'])->name('admin.customerData');
    Route::get('/AdminAddCustomer', [AdminController::class, 'addCustomerData'])->name('admin.addCustomerData');
    Route::Post('/AdminAddCustomerPost', [AdminController::class, 'addCustomerDataPost'])->name('admin.addCustomerDataPost');
    Route::get('/AdminEditCustomer/{id}', [AdminController::class, 'editCustomerData'])->name('admin.editCustomerData');
    Route::post('/AdminEditCustomer/{id}', [AdminController::class, 'editCustomerDataPost'])->name('admin.editCustomerDataPost');
    Route::get('AdminDeleteCustomer/{id}', [AdminController::class, 'deleteCustomerData'])->name('admin.deleteCustomerData');
    Route::get('/AdminCustomers/search', [AdminController::class, 'customerSearch'])->name('admin.customerSearch');

    // -------- USERS CRUD FUNCTIONS -------- //

    Route::get('/AdminUser', [AdminController::class, 'userData'])->name('admin.userData');
    Route::get('/AdminAddUser', [AdminController::class, 'addUserData'])->name('admin.addUserData');
    Route::Post('/AdminAddUserPost', [AdminController::class, 'addUserDataPost'])->name('admin.addUserDataPost');
    Route::get('AdminDeleteUser/{id}', [AdminController::class, 'deleteUserData'])->name('admin.deleteUserData');
    Route::get('/AdminEditUser/{id}', [AdminController::class, 'editUserData'])->name('admin.editUserData');
    Route::post('/AdminEditUser/{id}', [AdminController::class, 'editUserDataPost'])->name('admin.editUserDataPost');

    // -------- CUSTOMERS INTERACTIONS FUNCTIONS -------- //

    Route::resource('Admin/interaction', InteractionController::class, [
        'names' => [
            'index'   => 'admin.interactions.index',
            'create'  => 'admin.interactions.create',
            'store'   => 'admin.interactions.store',
            'show'    => 'admin.interactions.show',
            'edit'    => 'admin.interactions.edit',
            'update'  => 'admin.interactions.update',
            'destroy' => 'admin.interactions.destroy',
        ]
    ]);

    // -------- CUSTOMERS PIPELINES FUNCTIONS -------- //

    Route::resource('Admin/pipelines', PipelineController::class, [
        'names' => [
            'index'   => 'admin.pipelines.index',
            'create'  => 'admin.pipelines.create',
            'store'   => 'admin.pipelines.store',
            'show'    => 'admin.pipelines.show',
            'edit'    => 'admin.pipelines.edit',
            'update'  => 'admin.pipelines.update',
            'destroy' => 'admin.pipelines.destroy',
        ]
    ]);

    // -------- CUSTOMERS DEALS FUNCTIONS -------- //

    Route::resource('Admin/deals', DealController::class, [
        'names' => [
            'index'   => 'admin.deals.index',
            'create'  => 'admin.deals.create',
            'store'   => 'admin.deals.store',
            'show'    => 'admin.deals.show',
            'edit'    => 'admin.deals.edit',
            'update'  => 'admin.deals.update',
            'destroy' => 'admin.deals.destroy',
        ]
    ]);

    Route::get('/Admin/notifications', [AdminController::class, 'showNotifications'])->name('admin.notifications');
    Route::get('/Admin/notifications/delete/{notify}', [AdminController::class, 'deleteNotification'])->name('admin.notification.delete');
});


//// ---------- ROLE: SALES ---------- //// 


Route::middleware(['auth', 'role:sales'])->group(function () {

    // -------- DASHBOARD FUNCTIONS -------- //

    Route::get('/SalesDashboard', [SalesController::class, 'index'])->name('sales.dashboard');
    Route::get('/SalesChangePassword', [SalesController::class, 'changePassword'])->name('sales.changePassword');
    Route::post('/SalesChangePasswordPost', [SalesController::class, 'changePasswordPost'])->name('sales.changePasswordPost');
    Route::get('/SalesLogout', [AuthController::class, 'logout'])->name('sales.logout');

    // -------- CUSTOMER CRUD AND SEARCH FUNCTIONS -------- //

    Route::get('/SalesCustomer', [SalesController::class, 'customerData'])->name('sales.customerData');
    Route::get('/SalesAddCustomer', [SalesController::class, 'addCustomerData'])->name('sales.addCustomerData');
    Route::Post('/SalesAddCustomerPost', [SalesController::class, 'addCustomerDataPost'])->name('sales.addCustomerDataPost');
    Route::get('/SalesEditCustomer/{id}', [SalesController::class, 'editCustomerData'])->name('sales.editCustomerData');
    Route::post('/SalesEditCustomer/{id}', [SalesController::class, 'editCustomerDataPost'])->name('sales.editCustomerDataPost');
    Route::get('/SalesCustomers/search', [SalesController::class, 'customerSearch'])->name('sales.customerSearch');

    // -------- CUSTOMERS INTERACTIONS FUNCTIONS -------- //

    Route::resource('Sales/interaction', InteractionController::class, [
        'names' => [
            'index'   => 'sales.interactions.index',
            'create'  => 'sales.interactions.create',
            'store'   => 'sales.interactions.store',
            'show'    => 'sales.interactions.show',
            'edit'    => 'sales.interactions.edit',
            'update'  => 'sales.interactions.update',
            'destroy' => 'sales.interactions.destroy', // This will not be accessible for sales
        ]
    ])->except(['destroy']);

    // -------- CUSTOMERS PIPELINES FUNCTIONS -------- //

    Route::resource('Sales/pipelines', PipelineController::class, [
        'names' => [
            'index'   => 'sales.pipelines.index',
            'create'  => 'sales.pipelines.create',
            'store'   => 'sales.pipelines.store',
            'show'    => 'sales.pipelines.show',
            'edit'    => 'sales.pipelines.edit',
            'update'  => 'sales.pipelines.update',
            'destroy' => 'sales.pipelines.destroy', // This will not be accessible for sales
        ]
    ])->except(['destroy']);

    // -------- CUSTOMERS DEALS FUNCTIONS -------- //

    Route::resource('Sales/deals', DealController::class, [
        'names' => [
            'index'   => 'sales.deals.index',
            'create'  => 'sales.deals.create',
            'store'   => 'sales.deals.store',
            'show'    => 'sales.deals.show',
            'edit'    => 'sales.deals.edit',
            'update'  => 'sales.deals.update',
            'destroy' => 'sales.deals.destroy', // This will not be accessible for sales
        ]
    ])->except(['destroy']);
});


//// ---------- ROLE: SUPPORT ---------- //// 


Route::middleware(['auth', 'role:support'])->group(function () {

    // -------- DASHBOARD FUNCTIONS -------- //

    Route::get('/SupportDashboard', [SupportController::class, 'index'])->name('support.dashboard');
    Route::get('/SupportChangePassword', [SupportController::class, 'changePassword'])->name('suport.changePassword');
    Route::post('/SupportChangePasswordPost', [SupportController::class, 'changePasswordPost'])->name('suport.changePasswordPost');
    Route::get('/SupportLogout', [AuthController::class, 'logout'])->name('support.logout');

    // -------- CUSTOMERS CRUD AND SEARCH FUNCTIONS -------- //

    Route::get('/SupportCustomer', [SupportController::class, 'customerData'])->name('support.customerData');
    Route::get('/SupportEditCustomer/{id}', [SupportController::class, 'editCustomerData'])->name('support.editCustomerData');
    Route::post('/SupportEditCustomer/{id}', [SupportController::class, 'editCustomerDataPost'])->name('support.editCustomerDataPost');
    Route::get('/SupportCustomers/search', [SupportController::class, 'customerSearch'])->name('support.customerSearch');

    // -------- CUSTOMERS INTERACTIONS FUNCTIONS -------- //

    Route::resource('Support/interaction', InteractionController::class, [
        'names' => [
            'index'   => 'support.interactions.index',
            'create'  => 'support.interactions.create',
            'store'   => 'support.interactions.store',
            'show'    => 'support.interactions.show',
            'edit'    => 'support.interactions.edit',
            'update'  => 'support.interactions.update',
            'destroy' => 'support.interactions.destroy', // This will not be accessible for support
        ]
    ])->except(['destroy']);

    // -------- CUSTOMERS PIPELINES FUNCTIONS -------- //

    Route::resource('Support/pipelines', PipelineController::class, [
        'names' => [
            'index'   => 'support.pipelines.index',
            'create'  => 'support.pipelines.create', // This will not be accessible for support
            'store'   => 'support.pipelines.store', // This will not be accessible for support
            'show'    => 'support.pipelines.show',
            'edit'    => 'support.pipelines.edit', // This will not be accessible for support
            'update'  => 'support.pipelines.update',  // This will not be accessible for support
            'destroy' => 'support.pipelines.destroy', // This will not be accessible for support
        ]
    ])->only(['index', 'show']);
});


Route::middleware(['auth'])->group(function () {
    Route::get('admin/reports/index', [ReportController::class, 'index'])->name('admin.reports.index');
    Route::get('admin/reports/sales-performance', [ReportController::class, 'salesPerformance'])->name('admin.reports.sales-performance');
    Route::get('admin/reports/customer-interactions', [ReportController::class, 'customerInteractions'])->name('admin.reports.customer-interactions');
});