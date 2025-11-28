<?php
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
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
Route::get('categories/{id}', function ($id) {
    return "This is Category Details => $id";
});

// Route::get('/articles',function(){
//     return view('articles.index');
// });

Route::get('/articles',[ArticleController::class,'index']);

Route::get('/categories', [CategoryController::class, 'index']);
