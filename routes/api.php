<?php

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('welcome', function () {
    // $data = Product::max('price');
    // $data = Product::min('price');
    // $data = Product::avg('price');

    // $data = round(Product::sum('price'), 2);
    // $data = round(Order::sum('total'), 2);

    // $data = Order::count();

    // $data = Product::all()->take(10);
    // $data = Product::all()->take(10)->skip(10); // not work - do skipping after query - first way to limit
    // $data = Product::all()->skip(10)->take(10); // work
    // $data = Product::all()->skip(10); // work
    // $data = Product::all()->limit(10); // not work - these work in qyery not in collection
    // $data = Product::all()->offset(10); // not work - these work in qyery not in collection

    // $data = Product::skip(10)->get(); // not work - SQL ERROR
    // $data = Product::take(10)->skip(10)->get(); // work - do skipping in the query - better thaqn first way
    // $data = Product::skip(10)->take(10)->get(); // work

    // $data = Product::limit(10)->get(); // work - do skipping in the query - better thaqn first way
    // $data = Product::offset(10)->get(); // not work - SQL ERROR
    // $data = Product::limit(10)->offset(10)->get(); // work - limit : take, offset : skip
    // $data = Product::offset(10)->limit(10)->get(); // work

    //**********************************************/

    // $data = Category::where('name', 'like', 'n%')->get();
    // $data = Category::with('subCategories')->first();
    // $data = Category::with(['subCategories'])->first();
    // $data = Category::withCount(['subCategories'])->first(); // number of sub categories

    // $data = Category::with(['subCategories' => function ($query) {
    //     $query->where('name', 'like', 's%');
    // }])->get();

    // $data = Category::withCount(['subCategories' => function ($query) {
    //     $query->where('name', 'like', 's%');
    // }])->with(['subCategories'])->get();

    // $data = Category::with(['subCategories' => function ($query) {
    //     $query->where('name', 'like', 's%');
    // }])->withCount(['subCategories'])->get();

    // $data = Category::with(['subCategories' => function ($query) {
    //     $query->with(['products' => function ($query) {
    //         $query->where('name', 'like', 's%');
    //     }])->get();
    // }])->get();

    $data = Category::with(['subCategories' => function ($query) {
        $query->with(['products' => function ($query) {
            $query->where('name', 'like', 's%');
        }])->withCount(['products'])->get();
    }])->withCount(['subCategories'])->get();

    return response()->json(['data' => $data]);
    // return response()->json(['data' => 'Welcome Here']);
});
