@extends('plantilla.admin')
@section('titulo','Administración de Productos')
@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')
<div class="row" id="confirmareliminar">
  @include('custom.modal_eliminar',[''])
    <div class="col-md-12">
        <div class="card">            
            <div class="card-header">
                <h3 class="card-title">Sección de Productos</h3>
                <div class="card-tools">
                  <form>
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="nombre" class="form-control float-right" 
                          placeholder="Buscar"
                          value="{{request()->get('nombre')}}">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default float-right"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <span id="ruta" style="display:none;">{{route('admin.product.index')}}</span>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <a class="btn btn-success m-2 float-right" href="{{route('admin.product.create')}}">Crear</a>
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Slug</th>
                      <th>Descripción</th>
                      <th>Fecha creación</th>
                      <th>Fecha modificación</th>
                      <th colspan="3"></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($productos as $product)
                      <tr>
                          <td>{{$product->id}}</td>
                          <td>{{$product->nombre}}</td>
                          <td>{{$product->slug}}</td>
                          <td>{{$product->descripcion}}</td>
                          <td>{{$product->created_at}}</td>
                          <td>{{$product->updated_at}}</td>
                          <td>
                              <a class="btn btn-secondary" href="{{ route('admin.product.show',$product->slug) }}"><i class="far fa-eye"></i></a>
                          </td>
                          <td>
                              <a class="btn btn-primary" href="{{ route('admin.product.edit',$product->slug) }}"><i class="far fa-edit"></i></a>
                          </td>
                          <td>
                              <a class="btn btn-danger" href="#" @click="deseas_eliminar({{$product->id}})"
                                data-toggle="modal" data-target="#modal_eliminar"
                              >
                                <i class="far fa-trash-alt"></i>
                              </a>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                {{$productos->appends($_GET)->links()}}
              </div>
              <!-- /.card-body -->
        </div>
    </div>
</div>


@endsection



