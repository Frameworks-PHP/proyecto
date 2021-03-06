@extends('layouts.madre')

@section('titulo', 'Mis Cosas')
@stop

@section('opciones_usuario')

<div id="sns_content" class="wrap layout-m">
	<div class="container">
		<div class="row" style="padding:20px;background:#fff;">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div id="datosValorado"  class="col-md-6 col-xs-12" style="text-align:center;">
					<h5>Usuario Valorado</h5>
					<a href="{{ url('perfil/'.$valorado['id']) }}">
						<img id="fotoSubastador" src="{{ url('images/profiles/'.$valorado['imagen_perfil']) }}"/>
					</a>
					<div>
						<a href="{{ url('perfil/'.$valorado['id']) }}">
							<h1>{{$valorado['username']}}</h1>
						</a>
						<input id="input-id" type="number" data-min="0" data-max="5" class="rating" data-show-caption="false" data-show-clear="false" data-disabled="true" data-size="xs" value="{{$valorado['reputacion']}}"></input>
					</div>
				</div>
				<div id="datosValidante" class="col-md-6 col-xs-12" style="text-align:center;">
					<h5>Usuario Validante</h5>
					<a href="{{ url('perfil/'.$validante['id']) }}">
						<img id="fotoSubastador" src="{{ url('images/profiles/'.$validante['imagen_perfil']) }}"/>
					</a>
					<div>
						<a href="{{ url('perfil/'.$validante['id']) }}">
							<h1>{{$validante['username']}}</h1>
						</a>
						<input id="input-id" type="number" data-min="0" data-max="5" class="rating" data-show-caption="false" data-show-clear="false" data-disabled="true" data-size="xs" value="{{$validante['reputacion']}}"></input>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div id="datosProducto" >
					<h5>Producto</h5>
					<a href="{{ url('subasta/'.$art['id']) }}">
						<img class="col-md-6" style="border:3px solid black;" id="fotoProducto" src="{{ url('images/subastas/'.$foto['imagen']) }}"/>
					</a>
					<div style="padding-right:10px;">
						<a href="{{ url('subasta/'.$art['id']) }}">
							<h4>{{$art['nombre_producto']}}</h4>
							<p>{{$art['descripcion']}}</p>
						</a>
					</div>
				</div>
			</div></br></br></br>
			<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
				<form action="{{ url('update_valoracion') }}" method="post" enctype="multipart/form-data" id="form-validate">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">	
					<div class="fieldset">
						<input type="hidden" name="success_url" value="">
						<input type="hidden" name="error_url" value="">
						<h2 class="legend">Detalles Valoración</h2>
						<ul class="form-list">
							<li class="fields">
								<div class="customer-name">
									<div class="field ">
										<label>Nombre del producto:</label>
										<div class="input-box">
											<input type="text" id="fechafin" name="fechafin" value="{{$art->nombre_producto}}" title="Nombre" maxlength="255" readonly="">
										</div>
									</div></div>
									<div class="field ">
										<label>Modelo:</label>
										<div class="input-box">
											<input type="text" id="fechafin" name="fechafin" value="{{$art->modelo}}" title="Nombre" maxlength="255" readonly="">
										</div>
									</div>
								</li>
							</ul>
							<ul class="form-list">
								<li class="fields">
									<div class="customer-name">
										<div class="field ">
											<label>Nombre del valorado :</label>
											<div class="input-box">
												<input type="text" id="fechafin" name="fechafin" value="{{$valorado->nombre}}" title="Nombre" maxlength="255" readonly="">
											</div>
										</div></div>
										<div class="field ">
											<label for="estado" class="required"><em>*</em>Puntuación</label>
											<div class="input-box">
												<input id="puntuacion" name="puntuacion" type="number" data-min="1" step="1" data-max="5" class="rating" data-show-caption="true" data-show-clear="false" data-disabled="true" data-size="xs" value="{{$val->puntuacion}}"></input>
												<span class="errorJS" id="estado_error">&nbsp;Campo obligatorio</span>
											</div>
										</div>
									</div>
								</li>
							</ul>
							<ul class="form-list">
								<li class="fields">
									<div class="customer-name">
										<div class="field ">
											<label for="descripcion" class="required"><em>*</em>Comentario</label>
											<div class="input-box">
												<textarea id="texto" value="" name="texto" title="Descarticulo" maxlength="255" class="input-text required-entry" rows="4" cols="70" readonly>{{$val->texto}}  </textarea>
												<span class="errorJS" id="descripcion_error">&nbsp;Campo obligatorio</span>
											</div>
										</div>
									</div>
								</li>
							</ul>
							<input type="hidden" name="id" value="{{$val->id}}">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@stop