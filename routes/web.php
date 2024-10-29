<?php

use App\Livewire\Admin\Home;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Brands\AddBrand;
use App\Livewire\Admin\Profile\Profile;
use App\Livewire\Admin\Brands\AllBrands;
use App\Livewire\Admin\Brands\EditBrand;
use App\Livewire\Admin\Products\AddProduct;
use App\Livewire\Admin\Products\AllProducts;
use App\Livewire\Admin\Products\Editproduct;
use App\Livewire\Admin\Categories\AddCategory;
use App\Livewire\Admin\Categories\EditCategory;
use App\Livewire\Admin\Warehouses\AddWarehouse;
use App\Livewire\Admin\Categories\AllCategories;
use App\Livewire\Admin\Warehouses\AllWarehouses;
use App\Livewire\Admin\Warehouses\EditWarehouse;
use App\Livewire\Admin\RolesAndPermissions\Roles\AddRole;
use App\Livewire\Admin\RolesAndPermissions\Roles\EditRole;
use App\Livewire\Admin\RolesAndPermissions\RolesAndPermissions;
use App\Livewire\Admin\RolesAndPermissions\Permissions\AddPermission;
use App\Livewire\Admin\RolesAndPermissions\Permissions\EditPermission;
use App\Livewire\Admin\RolesAndPermissions\Roles\AssignPermission;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' =>  'auth'], function(){

    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
    Route::get('/logout', Logout::class)->name('logout');

});


// admin route
Route::group(['prefix' =>  'dashboard'], function(){
    
    Route::get('/', Home::class)->name('admin.dashboard');

    Route::group(['prefix' =>  'profile'], function(){

        Route::get('/', Profile::class)->name("admin.profile");
    });

    Route::group(['prefix' =>  'brands'], function(){

        Route::get('/', AllBrands::class)->name('brand.index');
        Route::get('/add', AddBrand::class)->name('brand.add');
        Route::get('/edit/{bid}', EditBrand::class)->name('brand.edit');
    });

    Route::group(['prefix' =>  'categories'], function(){

        Route::get('/', AllCategories::class)->name("categories.index");
        Route::get('/add', AddCategory::class)->name("categories.add");
        Route::get('/edit/{cid}', EditCategory::class)->name("categories.edit");
    });

    Route::group(['prefix' =>  'products'], function(){

        Route::get('/', AllProducts::class)->name("product.index");
        Route::get('/add', AddProduct::class)->name("product.add");
        Route::get('/edit/{pid}', Editproduct::class)->name("product.edit");
    });

    Route::group(['prefix' =>  'warehouses'], function(){

        Route::get('/', AllWarehouses::class)->name("warehouse.index");
        Route::get('/add', AddWarehouse::class)->name("warehouse.add");
        Route::get('/edit/{wid}', EditWarehouse::class)->name("warehouse.edit");
    });
    
    Route::group(['prefix' =>  'roles-and-permissions'], function(){

        Route::get('/', RolesAndPermissions::class)->name("roles-and-permissions.index");
        Route::get('/add-role', AddRole::class)->name("roles-and-permissions.add-role");
        Route::get('/edit-role/{rid}', EditRole::class)->name("roles-and-permissions.edit-role");
        Route::get('/add-permission', AddPermission::class)->name("roles-and-permissions.add-permission");
        Route::get('/edit-permission/{peid}', EditPermission::class)->name("roles-and-permissions.edit-permission");
        Route::get('/assign-permissions/{roleId}', AssignPermission::class)
            ->name("roles-and-permissions.assign-permissions");
    }); 
});


