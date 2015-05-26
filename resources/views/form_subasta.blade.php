<?php use App\Articulo; ?>
@extends('layouts.madre')


@section('titulo', 'PAGINA PRINCIPAL')

@stop


@section('info_extra')
<script type="text/javascript" src="{{ url('js/validaciones.js') }}"></script>
<div id="sns_content" class="wrap layout-m new-subasta">
  <div class="container">
    <div class="row">
      <div id="sns_main" class="col-md-12 col-main">
        <div id="sns_mainmidle">
          <div class="account-create">
            <div class="page-title">
              <h1>Nueva subasta</h1>
            </div>
            <form action="{{ url('add_subasta') }}" method="post" enctype="multipart/form-data" id="form-validate">
             <!--   <form  method="post" enctype="multipart/form-data" id="form-validate"> -->
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
              <div class="fieldset">
                <input type="hidden" name="success_url" value="">
                <input type="hidden" name="error_url" value="">
                <h2 class="legend">Detalles Articulo</h2>
                <ul class="form-list">
                  <li class="fields">
                    <div class="customer-name">
                      <div class="field ">
                        <label for="nombre_producto" class="required"><em>*</em>Nombre Producto</label>
                        <div class="input-box">
                          <input type="text" id="nombre_producto" name="nombre_producto" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                          <span class='errorJS' id='nombre_producto_error'>&nbsp;Campo obligatorio</span></td>
                        </div>
                      </div>
                      <div class="field ">
                        <label for="modelo" class="required"><em>*</em>Modelo</label>
                        <div class="input-box">
                          <input type="text" id="modelo" name="modelo" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                          <span class='errorJS' id='modelo_error'>&nbsp;Campo obligatorio</span></td>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
                <ul class="form-list">
                  <li class="fields">
                    <div class="customer-name">
                      <div class="field ">
                        <label for="localizacion" class="required"><em>*</em>Localización</label>
                        <div class="input-box">
                          <select id="localizacion" value="" title="Nombre" name="localizacion" maxlength="255" class="input-text required-entry">
                            <option value="">Cargando...</option>
                          </select>
                          <span class='errorJS' id='localizacion_error'>&nbsp;Campo obligatorio</span></td>
                        </div>
                      </div>
                      <script>
                              // Script pro rellenar dropdown!
                              $.getJSON("{{ url('get_localidades') }}", function(result){
                                var scatm = "";
                                $.each(result, function(i, field){
                                  scatm += "<option value="+field.id+">"+field.nombre+"</option>";
                                });
                                $(".field select#localizacion").html(scatm);
                              });
                              </script>
                              <div class="field ">
                                <label for="estado" class="required"><em>*</em>Estado</label>
                                <div class="input-box">
                                  <input type="text" id="estado" name="estado" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                                  <span class='errorJS' id='estado_error'>&nbsp;Campo obligatorio</span></td>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <ul class="form-list">
                          <li class="fields">
                            <div class="customer-name">
                              <div class="field ">
                                <label for="descripcion" class="required"><em>*</em>Descripción</label>
                                <div class="input-box">
                                  <textarea id="descripcion" name="descripcion" value="" title="Descarticulo" maxlength="255" class="input-text required-entry" rows="4" cols="70" name="descarticulo"> </textarea>
                                  <span class='errorJS' id='descripcion_error'>&nbsp;Campo obligatorio</span></td>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="fieldset">
                        <input type="hidden" name="success_url" value="">
                        <input type="hidden" name="error_url" value="">
                        <h2 class="legend">Imagenes Articulo</h2>
                        <ul class="form-list">
                          <li class="fields">
                            <div class="customer-name">
                              <div class="field ">
                                <label for="email" class="control-label">IMAGENES</label>
                                <div id="img_container">
                                  <input type="file" id="imgart_1" class="cnt" name="images[0]"> 
                                  <span class='errorJS' id='imgart_1_error'>&nbsp;debe haber una imagen</span></td>
                                </div>
                                <button type="button" id="masImagenes" class="btn btn-primary"><i class="fa fa-plus"></i> IMAGENES </button>
                                <button type="button" id="menosImagenes" class="btn btn-primary"><i class="fa fa-minus"></i> IMAGENES </button>
                                <script>
                                $("#masImagenes").click(function() {
                                  if($(".cnt").length < 6){
                                    var addto = "#imgart_"+$(".cnt").length;
                                    $(addto).after('<input type="file" id="imgart_'+($(".cnt").length+1)+'" class="cnt" name="images['+$(".cnt").length+']">');
                                  }
                                });
                                $("#menosImagenes").click(function() {
                                  if($(".cnt").length > 1){
                                    var delto = "#imgart_"+$(".cnt").length;
                                    $(delto).remove();
                                  }
                                });
                                </script>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="fieldset">
                        <input type="hidden" name="success_url" value="">
                        <input type="hidden" name="error_url" value="">
                        <h2 class="legend">Configuracion</h2>
                        <ul class="form-list">
                          <li class="fields">
                            <div class="customer-name">
                              <div class="field">
                                <label for="categoria" class="required"><em>*</em>Categoria</label>
                                <div class="input-box">
                                 <select id="categoria" value="" title="Nombre" name="sel_categroia" maxlength="255" class="input-text required-entry">
                                  <option value="">Cargando...</option>
                                </select>
                                <span class='errorJS' id='sel_categroia_error'>&nbsp;Debes escojer una</span></td>
                                <script>
                              // Script pro rellenar dropdown!
                              $.getJSON("{{ url('get_allCategories') }}", function(result){
                                var scatm = "";
                                $.each(result, function(i, field){
                                  scatm += "<option value="+field.id+">"+field.nombre+"</option>";
                                });
                                $(".field select#categoria").html(scatm);
                              });
                              </script>
                            </div>
                          </div>
                          <div class="field ">
                            <label for="subcategoria" class="required"><em>*</em>Sub-Categoria</label>
                            <div class="input-box">
                             <select name="subcategoria" id="subcategoria" name="narticulo" value="" title="Nombre" name="sel_subcategroia" maxlength="255" class="input-text required-entry">
                              <option value="">Seleccione una categoria.</option>
                            </select>
                            <span class='errorJS' id='sel_subcategroia_error'>&nbsp;Debes escojer una</span></td>
                            <div id="descriptext" class="input-box"></div>
                            <script>
                              // Script pro rellenar dropdown!
                              $(".field select#categoria").change(function() {
                                var aux = "{{ url('get_allSubCategoriesOnCategory') }}/"+$(".field select#categoria").val();
                                $.getJSON(aux , function(result){
                                  var scatm = "";
                                  $.each(result, function(i, field){
                                    scatm += "<option value="+field.id+">"+field.nombre+"</option>";
                                  });
                                  $(".field select#subcategoria").html(scatm);
                                });
                              });

                              $(".field select#subcategoria").change(function() { 
                                var aux2 = "get_subCategoryDescription/"+$(".field select#subcategoria").val();
                                $.get(aux2 , function(result){
                                  $("#descriptext").html("<p style='color:green;'>Descripcion:</b>"+result);
                                });

                              });
                              </script>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <ul class="form-list">
                      <li class="fields">
                        <div class="customer-name">
                          <div class="field ">
                            <label for="precio_inicial" class="required"><em>*</em>Precio inicial</label>
                            <div class="input-box">
                              <input type="text" id="precio_inicial" name="precio_inicial" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                              <br>
                              <span class='errorJS' id='precio_inicial_error'>&nbsp;Campo obligatorio</span></td>
                              <span class='errorJS' id='precio_inicial_error2'>&nbsp;Debe ser un numero positivo, con dos decimales como máximo</span>
                            </div>
                          </div>
                          <div class="field ">
                            <label for="incremento_precio" class="required"><em>*</em>Incremento de las pujas</label>
                            <div class="input-box">
                              <input type="text" id="incremento_precio" name="incremento_precio" value="" title="Nombre" maxlength="255" class="input-text required-entry">
                              <br>
                              <span class='errorJS' id='incremento_precio_error'>&nbsp;Campo obligatorio</span></td>
                              <span class='errorJS' id='incremento_precio_error2'>&nbsp;Debe ser un numero positivo, con dos decimales como máximo</span>                          </div>
                            </div>
                            <div class="field ">
                              <label >Tu puja acabará :</label>
                              <div class="input-box">


                               <input type="text" id="fechafin" name="fechafin" value="<?php $dateAr = explode(' ',$fecha_final);  echo $dateAr[1] . " " .explode('-',$dateAr[0])[2] . '/' . explode('-',$dateAr[0])[1] . '/' . explode('-',$dateAr[0])[0]; ?>" title="Nombre" maxlength="255" readonly>
                             </div>
                           </div>
                         </div>
                       </li>
                     </ul>
                   </div>
                   <div class="buttons-set">
                    <p class="required">* Campos requeridos</p>
                    <p class="back-link"><a href="index.html" class="back-link">« Regresar al inicio</a></p>
                    <!--     <button type="submit" title="Submit" class="button"><span><span>Crear Subasta</span></span></button> -->

                    <input type='button' title="Submit" class="button" onclick='formValidator()' value="Crear Subasta"><span>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @stop