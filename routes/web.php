<?php

use App\Livewire\Admin\Home;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Brands\AddBrand;
use App\Livewire\Admin\Brands\AllBrands;
use App\Livewire\Admin\Brands\EditBrand;
use App\Livewire\Admin\Categories\AddCategory;
use App\Livewire\Admin\Categories\AllCategories;
use App\Livewire\Admin\Categories\EditCategory;
use App\Livewire\Admin\Products\AddProduct;
use App\Livewire\Admin\Products\AllProducts;
use App\Livewire\Admin\Products\Editproduct;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' =>  'auth'
], function(){

    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
    Route::get('/logout', Logout::class)->name('logout');

});

Route::group([], function(){

    // admin route
    Route::group([
        'prefix' =>  'dashboard'
    ], function(){
    
        Route::get('/', Home::class)->name('admin.dashboard');

        // brands
        Route::get('/brands', AllBrands::class)->name('brand.index');
        Route::get('/brands/add', AddBrand::class)->name('brand.add');
        Route::get('/brands/edit/{bid}', EditBrand::class)->name('brand.edit');

        //categories
        Route::get('/categories', AllCategories::class)->name("categories.index");
        Route::get('/categories/add', AddCategory::class)->name("categories.add");
        Route::get('/categories/edit/{cid}', EditCategory::class)->name("categories.edit");

        // products
        Route::get('/products', AllProducts::class)->name("product.index");
        Route::get('/products/add', AddProduct::class)->name("product.add");
        Route::get('/products/edit/{pid}', Editproduct::class)->name("product.edit");
    
    });

});



