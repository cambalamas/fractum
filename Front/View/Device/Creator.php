<?php
	$upkeeps = $_SESSION['UpkeepPuller'];
	$lines = $_SESSION['LinePuller'];
?>

<form method="post" action="../../Back/RequestManager.php?actors=Device,Device&actions=Puller,Creator&targets=S,A" onsubmit="return device();">

	<div class="row center-block text-center">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="hide" id="alertSerialNumber" style="background: #ff6666">
				<center><i id="errorSerialNumber"></i></center>
			</div>

			<div class="hide" id="alertName" style="background: #ff6666">
				<center><i id="errorName"></i></center>
			</div>

			<div class="hide" id="alertCost" style="background: #ff6666">
				<center><i id="errorCost"></i></center>
			</div>

			<div class="hide" id="alertDescription" style="background: #ff6666">
				<center><i id="errorDescription"></i></center>
			</div>
		</div>
	</div>

	<div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>Nº SERIE</label>
	  		<input type="text" name="serialNumber" id="serialNumber" class="form-control" value="">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>NOMBRE</label>
	  		<input type="text" name="name" id="name" class="form-control" value="">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>MANTENIMIENTO</label>
			<select name="upkeep" class="form-control">
				<?php foreach($upkeeps as $upkeep){ ?>
				<option value="<?php echo $upkeep['id']; ?>"><?php echo $upkeep['name']; ?></option>
				<?php } ?>
			</select>
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>FECHA DE INSTALACIÓN</label>
	  		<input type="text" name="date" id="date" class="form-control" value="<?php echo date('Y/m/d H:i:s'); ?>" readonly>
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>COSTE</label>
	  		<input type="text" name="cost" id="cost" class="form-control" value=""> 
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>LÍNEA PERTENECIENTE</label>
			<select name="line" class="form-control">
				<?php foreach($lines as $line){ ?>
				<option value="<?php echo $line['id']; ?>"><?php echo $line['name']; ?></option>
				<?php } ?>
			</select>
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label>DESCRIPCIÓN</label>
	  		<textarea name="description" id="description" class="form-control" rows="5" value=""></textarea>
	  	</div>
	</div>

	<br><div class="row center-block">
	  	<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary">GUARDAR</button>
	</div>

</form>
