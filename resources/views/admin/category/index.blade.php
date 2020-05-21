@extends('plantilla.admin')
@section('titulo','Administración de Categorias')
@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')
<div class="row" id="confirmareliminar">
  @include('custom.modal_eliminar',[''])
    <div class="col-md-12">
        <div class="card">            
            <div class="card-header">
                <h3 class="card-title">Sección de Categorías</h3>
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
              <span id="ruta" style="display:none;">{{route('admin.category.index')}}</span>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <a class="btn btn-success m-2 float-right" href="{{route('admin.category.create')}}">Crear</a>
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
                      @foreach ($categorias as $categoria)
                      <tr>
                          <td>{{$categoria->id}}</td>
                          <td>{{$categoria->nombre}}</td>
                          <td>{{$categoria->slug}}</td>
                          <td>{{$categoria->descripcion}}</td>
                          <td>{{$categoria->created_at}}</td>
                          <td>{{$categoria->updated_at}}</td>
                          <td>
                              <a class="btn btn-secondary" href="{{ route('admin.category.show',$categoria->slug) }}"><i class="far fa-eye"></i></a>
                          </td>
                          <td>
                              <a class="btn btn-primary" href="{{ route('admin.category.edit',$categoria->slug) }}"><i class="far fa-edit"></i></a>
                          </td>
                          <td>
                              <a class="btn btn-danger" href="#" @click="deseas_eliminar({{$categoria->id}})"
                                data-toggle="modal" data-target="#modal_eliminar"
                              >
                                <i class="far fa-trash-alt"></i>
                              </a>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                {{$categorias->appends($_GET)->links()}}
              </div>
              <!-- /.card-body -->
        </div>
    </div>
</div>


@endsection



