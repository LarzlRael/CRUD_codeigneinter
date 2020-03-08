<!DOCTYPE html>
<html>
<head>
	<title>Listar </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- core CSS Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- jQuery (necesarios para Bootstrap JavaScript plugins) -->

    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
   
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
			<h2 align="center">CRUD CON PHP-CODEIGNITER</h2>
				<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Nueva Persona</button>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Nº</th>
								<th>Nombres</th>
								<th>Apellidos </th>
								<th>Telefono</th>
								<th>Fecha nacimiento</th>
								<th>Accion</th>
							</tr>
						</thead>
						<tbody>

						<?php $con=1; foreach ($listar_p as $obj) {?> 
						
							<tr>
								<td><?php echo $con++; ?></td>
								<td><?php echo $obj->nombre; ?></td>
								<td><?php echo $obj->apellido; ?></td>
								<td><?php echo $obj->telefono; ?></td>
								<td><?php echo $obj->fecha_nac; ?></td>
								
								<td>
									<button class="btn btn-warning" onclick="editar_persona('<?php echo $obj->idpersona; ?>')">Editar</button>
									<button class="btn btn-danger" onclick="eliminar_persona('<?php echo $obj->idpersona; ?>')">Eliminar</button>

								</td>
							</tr>
						<?php } ?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div id="myModal" class="modal fade" role="dialog">
		  	<div class="modal-dialog">
		    	<!-- Modal contenido-->
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal">&times;</button>
		        		<h4 class="modal-title">Nueva Persona</h4>
		      		</div>
		      		<div class="modal-body">
		        		<div class="panel-body">
							<!-- inicio del formulario -->
							
						<form method="POST" id="guardar_nueva_persona" class="form-horizontal" role="form">
							<div class="form-group">
								<label class="control-label col-sm-3" >Nombre</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="nombre" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" >Apellido</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="apellido" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" >Telefono</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" name="telefono">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" >Fecha Nacimiento</label>
								<div class="col-sm-9">
									<input type="date" class="form-control" name="fecha_nac" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-9 col-sm-3">
									<button type="submit" class="btn btn-success">Guardar Datos</button>
								</div>
							</div>
						</form>
					</div> 
		      		</div>
		      		
		    	</div>
		  </div>
	</div>


	<div id="editar_p" class="modal fade" role="dialog">
		  	<div class="modal-dialog">
		    	<!-- Modal contenido-->
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal">&times;</button>
		        		<h4 class="modal-title">Modificar Persona</h4>
		      		</div>
		      		<div class="modal-body" id="ver_contenido">
		        		
					</div> 
		      		</div>
		      		
		    	</div>
		  </div>
	</div>


	<script type="text/javascript">
		$("#guardar_nueva_persona").submit(function(event) {
		    event.preventDefault();
		    $.ajax({
		        url:'<?php echo base_url();?>Controller_crud/guardar_nueva_persona',
		        type:'POST',
		        data:$("form").serialize(),
		        success:function(){
		        	window.location='';
			         
		        }
		    });
		});
		function eliminar_persona(idpersona){
			$.post('<?php echo base_url(); ?>Controller_crud/eliminar_persona',{idpersona:idpersona}, function(){
				window.location='';
			});
		}
		function editar_persona(idpersona){
			$("#editar_p").modal('show');
			$.post('<?php echo base_url(); ?>Controller_crud/editar_persona',{idpersona:idpersona}, function(dato){
				$("#ver_contenido").html(dato);
			});
		}
	</script>
</body>
</html>

