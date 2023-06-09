<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TestSendMailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/master', function () {
    return view('client.layout.master');
});

// Route::get('/', function () {
//     return view('client.pages.home');
// })->name('home');

// Route::get('/blog', function () {
//     return view('client.pages.blog');
// })->name('blog');

// Route::get('/shop', function () {
//     return view('client.pages.shop');
// })->name('shop');

// Route::get('/contact', function () {
//     return view('client.pages.contact');
// })->name('contact');

//refactor->Controller
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [ClientHomeController::class, 'index'])->name('client.home');


Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');



// admin page start
// Route::get('/admin', function () {
//     return view('admin.pages.index');
// })->name('admin');

// Route::get('/admin/user', function () {
//     return view('admin.pages.user');
// })->name('admin/user');

// Route::get('/admin/products', function () {
//     return view('admin.pages.product.list');
// })->name('admin.products');

// Route::get('/admin/blog', function () {
//     return view('admin.pages.blog');
// })->name('admin/blog');

// Route::get('/admin/add-product', function () {
//     return view('admin.pages.product.add-product');
// })->name('admin.add-product');

// Route::post('/admin/product/save', [ProductController::class, 'store'])->name('admin.product.save');

//->middleware('auth.admin')
Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('admin.master');
    })->name('admin');

    Route::get('/user', [UserController::class, 'index'])->name('admin.user');
    Route::get('/user/create', function () {
        return view('admin.pages.user.add-user');
    })->name('admin.user.create');
    Route::post('/user/save', [UserController::class, 'store'])->name('admin.user.save');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/user/update', [UserController::class, 'update'])->name('admin.user.update');
    Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
    // Route::get('/user', [UserController::class, 'index']);



    // Route::get('/products', function () {
    //     return view('admin.pages.product.list');
    // })->name('admin.products');

    Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
    Route::post('/products/save', [ProductController::class, 'store'])->name('admin.product.save');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');


    Route::get('/blog', function () {
        return view('admin.pages.blog');
    })->name('admin.blog');

    Route::resource('product_category', ProductCategoryController::class);

    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::resource('article', ArticleController::class);
    Route::get('/article/create', function () {
        return view('admin.pages.article.create');
    })->name('admin.article.create');
    Route::post('/article/save', [ArticleController::class, 'store'])->name('admin.article.save');
    Route::post('/article-get-slug', [ArticleController::class, 'getSlug'])->name('article.get.slug');

    Route::get('/add-product', function () {
        return view('admin.pages.product.add-product');
    })->name('admin.add-product');

    // Route::post('/product/save', [ProductController::class, 'store'])->name('admin.product.save');
});

// Route::get('/login', [UserController::class, 'getLogin'])->name('getlogin');
// Route::post('/login', [UserController::class, 'login'])->name('login');
// Route::post('/logout', [UserController::class, 'logout'])->name('logout');
// khac functionName, ->name()

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/test-send-mail', [TestSendMailController::class, 'sendMail']);


// Route::get('them-user', function () {
//     User::create([
//         'name' => 'Member 2',
//         'email' => 'mem2@green.com',
//         'password' => bcrypt('12345')
//     ]);
// });

// Route::get('them-category', function () {
//     Category::create([
//         'name' => 'SP02',
//         'user_id' => 2
//     ]);
// });

// Route::get('cat-on-user', function () {
//     // $category = User::all()->toArray();
//     $category = User::with('category')->get()->toArray();
//     dd($category);
// });