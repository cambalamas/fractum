<?php
	$upkeepDetail=$_SESSION['UpkeepReader'][0];
	$companies = $_SESSION['CompanyPuller'];
?>

<!-- ME INTERESA MOSTRAR TODAS LAS MÁQUINAS PERTENECIENTES A ESTE SERVICIO -->
<?php
	$unit = "";
	if($upkeepDetail['unit']==0) $unit .= "Semanas";
	elseif($upkeepDetail['unit']==1) $unit .= "Meses";
	elseif($upkeepDetail['unit']==2) $unit .= "Años";

?>

<form method="post" action="../../Back/RequestManager.php?actors=Upkeep,Upkeep&actions=Puller,Updater&targets=S,A">
	
	<div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>NOMBRE</label>
			<input type="text" name="name" class="form-control" value="<?php echo $company['name']; ?>">	
	  	</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>EMPRESA</label>
			<select name="company" class="form-control">
				<option selected hidden value="default">default</option>
				<?php foreach($companies as $company){ ?>
				<option value="<?php echo $company['cif']; ?>"><?php echo $company['name']; ?></option>
				<?php } ?>
			</select>
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>PERIODICIDAD</label>
	  		<input type="text" name="time" class="form-control" value="<?php echo $upkeepDetail['time']; ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>PERIODICIDAD (UD. DE TIEMPO)</label>
	  		<select class="form-control" name="unit">
	  			<option value="<?php echo $upkeepDetail['unit']; ?>" selected><?php echo $unit; ?></option>
	  			<option value="0">Semanas</option>
	  			<option value="1">Meses</option>
	  			<option value="2">Años</option>
	  		</select>
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>FECHA DE ALTA</label>
	  		<input type="text" disabled name="date" class="form-control" value="<?php echo $upkeepDetail['date']; ?>">
	  	</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>COSTE</label>
	  		<input type="text" name="cost" class="form-control" value="<?php echo $upkeepDetail['cost']; ?>"> 
	  	</div>
	</div>

	<br><div class="row center-block">
	  	<input type="hidden" name="id" class="form-control" value="<?php echo $upkeepDetail['id']; ?>">
	  	<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary">GUARDAR</button>
	</div>
</form>

<div class="row center-block">
	<form method="post" action="../../Back/RequestManager.php?actors=Upkeep,Upkeep&actions=Puller,Eraser&targets=S,A">
		<input type="hidden" name="id" class="form-control" value="<?php echo $upkeepDetail['id'] ?>">
		<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-danger">
			ELIMINAR <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		</button>
	</form>
</div>
