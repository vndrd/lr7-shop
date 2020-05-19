@extends('plantilla.admin')
@section('titulo','Crear Categoría')

@section('contenido')
<div id="apicategory">
<form action="{{ route('admin.category.store') }}" method="POST">
    @csrf
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Administración de Categorías</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                    <input v-model="nombre" 
                        @@blur="getCategory" 
                        @@focus="mostrar_mensaje=false"
                        class="form-control" 
                        type="text" 
                        name="nombre">
                <label for="slug">Slug</label>
                    <input readonly 
                        v-model="generarSLug"  
                        class="form-control" 
                        type="text" 
                        name="slug">
                <div v-if="settings.mostrar_mensaje" 
                    v-bind:class="settings.clase_slug" >
                    @{{ settings.mensaje_slug }}
                </div>
                <label class="d-block" for="descripcion">Descripción</label>
                    <textarea class="form-control" 
                            name="descripcion" 
                            cols="30" 
                            rows="5"></textarea>                            
            </div>
        </div><!-- /.card-body -->
        <div class="card-footer">
            <a href="{{route('cancelar','admin.category.index')}}" class="btn btn-danger" >Cancelar</a>
            <input 
            :disabled="settings.deshabilitar_boton"
            type="submit" 
            value="Guardar" 
            class="btn btn-primary float-right">
        </div><!-- /.card-footer-->
    </div><!-- /.card -->
</form>
</div>
@endsection



