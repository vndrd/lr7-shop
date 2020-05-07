@extends('plantilla.admin')
@section('titulo','Admin Categories')

@section('estilos')

@endsection

@section('contenido')

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Prueba</h3>
            
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                    <div id="app">
                        <form action="">
                            <h1>Crear Categoría</h1>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input v-model="nombre" 
            
                                    @blur="getCategory" 
                                    @focus = "div_aparecer= false"
                                
                                class="form-control" type="text" name="nombre" id="nombre">
                                <label for="slug">Slug</label>
                                <input readonly v-model="generarSLug"  class="form-control" type="text" name="slug" id="slug">
                                <div v-if="div_aparecer" v-bind:class="div_clase_slug">
                                   @{{ div_mensajeslug }}
                                </div>
                                <br v-if="div_aparecer">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5"></textarea>
                                
                            </div>
                            <input 
                             :disabled = "deshabilitar_boton==1"
                            type="submit" value="Guardar" class="btn btn-primary float-right">
                    
                        </form>
                        <br><br>
            
                        @{{ nombre }}
                        <br>
                    
                        @{{ generarSLug }}
                        <br>
                        @{{ slug }}
                    </div>
                </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
@endsection



