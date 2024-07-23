<?php

use Illuminate\Support\Facades\Route;
use App\Models\Transact;
use App\Models\Account;

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

Route::get('/', function () {
    echo "<style>table{border-spacing: 10px;} table, th, td{border: 1px solid #DCDCDC;} td{padding:10px;}</style>";
    // echo "<link href=\"{{ asset('css/app.css') }}\" rel=\"stylesheet\">";
    // $hold =  Transact::all();
    // $hold = Transact::find(1);
    // $hold->account()->name;

    // return $hold->user;
    // return Account::find($hold->user)->name;

    $transacts = Transact::all();
    $users = Account::all();
    echo "<table><tr><th>Name</th><th>date</th><th>amount</th><th>reference</th></tr>";
    foreach ($transacts as $transact){
        // echo $transact->user;
        // echo $users->find($transact->user)->name."<br>";
        echo "<tr>";
        echo "<td>".Account::find($transact->user)->name."</td>";
        echo "<td>".$transact->date."</td>";
        echo "<td>".$transact->computed."</td>";
        echo "<td>".$transact->reference."</td>";
        echo "</tr>";
    }



    // return $transact;





    echo "</table>";



    // return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/');

Route::get('/all', [App\Http\Controllers\AllController::class, 'index'])->name('all');
Route::get('search-autocomplete', [App\Http\Controllers\UsersController::class, 'searchAutocomplete']);

Route::resource('/accounts', 'App\Http\Controllers\UsersController');
Route::resource('/transacts', 'App\Http\Controllers\TransactsController');
Route::resource('/requests', 'App\Http\Controllers\RequestsController');
Route::resource('/collects', 'App\Http\Controllers\CollectsController');
Route::resource('/remits', 'App\Http\Controllers\RemitsController');
Route::resource('/dues', 'App\Http\Controllers\DuesController');



















Route::get('form', [App\Http\Controllers\AllController::class, 'index']);
Route::get('search-autocomplete', [App\Http\Controllers\AllController::class, 'searchAutocomplete']);