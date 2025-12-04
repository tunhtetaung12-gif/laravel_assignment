<?php
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', function () {
    return view('welcome');
});

// static route
Route::get('/blogs',function(){
    return "This is Blog Lists.";
});

// dynamic route
Route::get('blogs/{id}',function($id){
    return"This is Blog Details => $id";
});

// naming route
Route::get('/dashboard',function(){
    return"Welcome Home Page";
})->name('dashboard.tpp');

// redirect route
Route::get('/tpp',function(){
    return redirect()->route('dashboard.tpp');
});

// group route
Route::prefix('/backend')->group(function(){
    Route::get('/admin',function(){
        return "This is Admin Page";
    });
    Route::get('/students',function(){
        return"This is Students Page";
    });
    Route::get('/students/{id}',function($id){
        return"This is students details=>$id";
    });
    Route::get('/teachers',function(){
        return redirect()->route('dashboard.tpp');
    });
});

// day_testing
// Route::get('categories/{id}', function ($id) {
//     return "This is Category Details => $id";
// });

// Route::get('/articles',function(){
//     return view('articles.index');
// });

Route::get('/articles',[ArticleController::class,'index']);

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Route::get('/categories/{id}',[CategoryController::class,'show'])->name('categories.show');


//Update for products
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/categories/{id}/edit',[CategoryController::class,'edit'])->name('categories.edit');
Route::post('categories/{id}/update',[CategoryController::class,'update'])->name('categories.update');

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');





Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');

//delete
Route::post('/categories/{id}/delete',[CategoryController::class,'delete'])->name('categories.delete');

Route::post('/products/{id}/delete',[ProductController::class,'delete'])->name('products.delete');

//user route

Route::resource('users', UserController::class);

