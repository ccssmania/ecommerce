<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Perfil</div>
                <div class="panel-body">
                    {!!Form::open(['url' => $url, 'method' => $method , 'files' => true ]) !!}

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                {{Form::email('email', $contact->email,['class' => 'form-control', 'placeholder' => 'email'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Facebook nota: poner la url</label>

                            <div class="col-md-6">
                                {{Form::text('facebook', $contact->facebook,['class' => 'form-control', 'placeholder' => 'facebook'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Direccion</label>

                            <div class="col-md-6">
                                {{Form::text('direccion', $contact->direccion,['class' => 'form-control', 'placeholder' => 'direccion'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Banco</label>

                            <div class="col-md-6">
                                {{Form::text('banco', $contact->banco,['class' => 'form-control', 'placeholder' => 'banco'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label"> Numero De Cuenta</label>

                            <div class="col-md-6">
                                {{Form::text('no_cuenta', $contact->no_cuenta,['class' => 'form-control', 'placeholder' => 'Numero de cuenta'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                {{Form::text('tel', $contact->tel,['class' => 'form-control', 'placeholder' => 'telefono'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Celular</label>

                            <div class="col-md-6">
                                {{Form::text('cel', $contact->cel,['class' => 'form-control', 'placeholder' => 'celular'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Descripción</label>

                            <div class="col-md-6">
                                {{Form::textarea('description', $contact->description,['class' => 'form-control textarea', 'placeholder' => 'Descripcion'])}}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            
                        	<label for="" class="col-md-4 control-label">Banners Del Home</label>
                            <div class="col-md-6">
                            	<h6>Importante, las imagenes deben tener el mismo taño, recomendacion 800*300</h6>
                            	<div class="form-group">
									{{Form::file('cover')}}
								</div>
								<div class="form-group">
									{{Form::file('cover1')}}
								</div>
								<div class="form-group">
									{{Form::file('cover2')}}
								</div>
								
                            </div>
                        </div>
                        
                        <div class="form-group">


                            
                        	<label for="" class="col-md-4 control-label">Banners De Las Categorias De Los Productos</label>
                            <div class="col-md-6">
                            	<h6>Importante, las imagenes deben tener el mismo taño</h6>
                            	<div class="form-group ">
                            		<label class="col-md-8">Insumos Médicos</label>
									{{Form::file('img')}}
								</div>
								<div class="form-group ">
									<label class="col-md-8">Instrumental Quirúrgico</label>
									{{Form::file('img1')}}
								</div>
								<div class="form-group ">
									<label class="col-md-8">Ayudas Ortopédicas</label>
									{{Form::file('img2')}}
								</div>
								<div class="form-group ">
									<label class="col-md-8">Terapias Respiratorias</label>
									{{Form::file('img3')}}
								</div>
								<div class="form-group ">
									<label class="col-md-8">Salud Y Belleza</label>
									{{Form::file('img4')}}
								</div>
								
                            </div>
                        </div>

                        <div class="form-group">


                            
                            <label for="" class="col-md-4 control-label">Imagen Del Perfil "Sobre Nosotros"</label>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="col-md-8">Imagen</label>
                                    {{Form::file('img_about')}}
                                </div>
                                
                                
                            </div>
                        </div>
                    
                        
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    update
                                </button>

                                
                            </div>
                        </div>
                    </div>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>





