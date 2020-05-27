<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nom = $request->get('nombre');
        $productos = Product::orderBy('nombre')
                ->where('nombre', 'like',"%$nom%")
                ->paginate(2);
        return view('admin.product.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::orderBy('nombre','DESC')->paginate(100);
        return view('admin.product.create',compact('categorias'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->nombre        = $request->nombre;
        $product->slug          = $request->slug;
        $product->category_id   = $request->category_id;
        $product->cantidad      = $request->cantidad;
        $product->precio_actual         = $request->precioactual;
        $product->precio_anterior       = $request->precioanterior;
        $product->porcentaje_descuento      = $request->porcentajededescuento;
        $product->descripcion_corta         = $request->descripcion_corta;
        $product->descripcion_larga         = $request->descripcion_larga;
        $product->especificaciones      = $request->especificaciones;
        $product->datos_de_interes      = $request->datos_de_interes;
        $product->visitas       = $request->visitas;
        $product->ventas        = $request->ventas;
        $product->estado        = $request->estado;
        if($request->sliderprincipal){
            $product->sliderprincipal = 'Si';
        }else {
            $product->sliderprincipal = 'No';
        }
        if($request->activo){
            $product->activo = 'Si';
        }else {
            $product->activo = 'No';
        }
        $product->save();
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
