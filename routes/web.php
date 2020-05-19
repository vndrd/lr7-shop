<?php

use Illuminate\Support\Facades\Route;
use App\Product;
use App\Category;

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

Route::get('/', function () {
    return view('tienda.index');
});

/* #5 */
/*
$prod = new Product();
    $prod->nombre = 'Producto 3';
    $prod->slug = 'Producto 3';
    $prod->category_id =  2;
    $prod->descripcion_corta = 'Producto 3';
    $prod->descripcion_larga = 'Producto 3';
    $prod->especificaciones = 'Producto 3';
    $prod->datos_De_interes = 'Producto 3';
    $prod->estado = 'Nuevo';
    $prod->activo = 'Si';
    $prod->sliderprincipal = 'No';
$prod->save();
return $prod;
*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('plantila.admin');  
});
Route::resource('admin/category', 'Admin\AdminCategoryController')->names('admin.category');
Route::get('cancelar/{ruta}',function($ruta){
    return redirect()->route('admin.category.index')->with('cancelar','Acción Cancelada');
})->name('cancelar');