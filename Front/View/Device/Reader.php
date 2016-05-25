<?php $deviceDetail=$_SESSION['DeviceReader'][0];?>

<form method="post" action="../../../Back/RequestManager.php?actors=Device,Device&actions=Puller,Reader&targets=S,A">
	
	<div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>Nº SERIE</label>
	  		<input type="text" disabled name="serialNumber" class="form-control" value="<?php echo $deviceDetail['serialNumber'] ?>">
	  		<input type="hidden" name="serialNumber" class="form-control" value="<?php echo $deviceDetail['serialNumber'] ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>NOMBRE</label>
	  		<input type="text" disabled name="name" class="form-control" value="<?php echo $deviceDetail['name'] ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>MANTENIMIENTO</label>
	  		<input type="text" disabled name="upkeep" class="form-control" value="<?php echo $deviceDetail['upkeep'] ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>FECHA DE INSTALACIÓN</label>
	  		<input type="text" disabled name="date" class="form-control" value="<?php echo $deviceDetail['date'] ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>COSTE</label>
	  		<input type="text" disabled name="cost" class="form-control" value="<?php echo $deviceDetail['cost'] ?>"> 
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>LÍNEA PERTENECIENTE</label>
	  		<input type="text" disabled name="line" class="form-control" value="<?php echo $deviceDetail['line'] ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label>DESCRIPCIÓN</label>
	  		<textarea name="description" disabled class="form-control" rows="5"><?php echo $deviceDetail['description'] ?></textarea>
	  	</div>
	</div>

	<br><div class="row center-block">
	  	<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary">MODIFICAR</button>
	</div>
</form>
