<?php $deviceDetail=$_SESSION['DeviceReader'][0];?>

<form method="post" action="../../Back/RequestManager.php?actors=Device,Device&actions=Puller,Updater&targets=S,A">
	
	<div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>Nº SERIE</label>
	  		<input type="text" disabled name="serialNumber" class="form-control" value="<?php echo $deviceDetail['serialNumber'] ?>">
	  		<input type="hidden" name="serialNumber" class="form-control" value="<?php echo $deviceDetail['serialNumber'] ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>NOMBRE</label>
	  		<input type="text" name="name" class="form-control" value="<?php echo $deviceDetail['name'] ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>MANTENIMIENTO</label>
	  		<input type="text" name="upkeep" class="form-control" value="<?php echo $deviceDetail['upkeep'] ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>FECHA DE INSTALACIÓN</label>
	  		<input type="text" name="date" class="form-control" value="<?php echo $deviceDetail['date'] ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>COSTE</label>
	  		<input type="text" name="cost" class="form-control" value="<?php echo $deviceDetail['cost'] ?>"> 
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>LÍNEA PERTENECIENTE</label>
	  		<input type="text" name="line" class="form-control" value="<?php echo $deviceDetail['line'] ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label>DESCRIPCIÓN</label>
	  		<textarea name="description" class="form-control" rows="5"><?php echo $deviceDetail['description'] ?></textarea>
	  		</textarea>
	  	</div>
	</div>

	<br><div class="row center-block">
	  	<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary">GUARDAR</button>
	</div>
</form>

<div class="row center-block">
	<form method="post" action="../../Back/RequestManager.php?actors=Device,Device&actions=Puller,Eraser&targets=S,A">
		<input type="hidden" name="serialNumber" class="form-control" value="<?php echo $deviceDetail['serialNumber'] ?>">
		<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-danger">
			ELIMINAR <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		</button>
	</form>
</div>
