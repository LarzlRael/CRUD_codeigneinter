<div class="panel-body">
	<form method="POST" id="guardar_editar_persona" class="form-horizontal" role="form">
		<input type="hidden" name="idpersona" value="<?php echo $obj1->idpersona;?>">
		<div class="form-group">
			<label class="control-label col-sm-3" >Nombre</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="nombre" required value="<?php echo $obj1->nombre ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" >Apellido</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="apellido" required value="<?php echo $obj1->apellido ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" >Telefono</label>
			<div class="col-sm-9">
				<input type="number" class="form-control" name="telefono" value="<?php echo $obj1->telefono ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" >Fecha Nacimiento</label>
			<div class="col-sm-9">
				<input type="date" class="form-control" name="fecha_nac" required value="<?php echo $obj1->fecha_nac ?>">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-9 col-sm-3">
				<button type="submit" class="btn btn-success">Guardar Datos</button>
			</div>
		</div>
	</form>
</div> 

<script type="text/javascript">
	$("#guardar_editar_persona").submit(function(event) {
		    event.preventDefault();
		    $.ajax({
		        url:'<?php echo base_url();?>Controller_crud/guardar_editar_persona',
		        type:'POST',
		        data:$("form").serialize(),
		        success:function(){
		        	window.location='';
			         
		        }
		    });
		});
</script>