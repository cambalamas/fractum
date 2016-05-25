<?php $upkeepDetail=$_SESSION['UpkeepReader'][0]; ?>

<?php
	$unit = "";
	if($upkeepDetail['unit']==0) $unit .= "Semanas";
	elseif($upkeepDetail['unit']==1) $unit .= "Meses";
	elseif($upkeepDetail['unit']==2) $unit .= "Años";

?>

<form method="post" action="../../../Back/RequestManager.php?actors=Upkeep,Upkeep&actions=Puller,Reader&targets=S,A">
	
	<div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>EMPRESA</label>
	  		<input type="text" name="company" disabled class="form-control" value="<?php echo $upkeepDetail['company']; ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>FECHA DE ALTA</label>
	  		<input type="text" name="date" disabled class="form-control" value="<?php echo $upkeepDetail['date']; ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>PERIODICIDAD</label>
	  		<input type="text" name="time" disabled class="form-control" value="<?php echo $upkeepDetail['time']; ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>PERIODICIDAD (UD. DE TIEMPO)</label>
	  		<select class="form-control" name="unit" disabled>
	  			<option value="<?php echo $upkeepDetail['unit']; ?>" selected><?php echo $unit; ?></option>
	  			<option value="0">Semanas</option>
	  			<option value="1">Meses</option>
	  			<option value="2">Años</option>
	  		</select>
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>COSTE</label>
	  		<input type="text" name="cost" disabled class="form-control" value="<?php echo $upkeepDetail['cost']; ?>"> 
	  	</div>
	</div>

	<br><div class="row center-block">
	  	<input type="hidden" name="id" class="form-control" value="<?php echo $upkeepDetail['id']; ?>">
	  	<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary">MODIFICAR</button>
	</div>
</form>
