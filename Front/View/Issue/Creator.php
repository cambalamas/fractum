<?php
	$devices = $_SESSION['DevicePuller'];
	$companies = $_SESSION['CompanyPuller'];
?>

<form method="post" action="../../Back/RequestManager.php?actors=Issue,Issue&actions=Puller,Creator&targets=S,A">

	<div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>TÍTULO</label>
	  		<input type="text" name="title" class="form-control" value="">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>USUARIO APERTURA</label>
	  		<input type="text" name="owner" class="form-control" value="<?php echo $_COOKIE['nick']; ?>" readonly>
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>MÁQUINA</label>
			<select name="device" class="form-control">
				<?php foreach($devices as $device){ ?>
				<option value="<?php echo $device['serialNumber']; ?>"><?php echo $device['name']; ?></option>
				<?php } ?>
			</select>
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>EMPRESA</label>
			<select name="company" class="form-control">
				<?php foreach($companies as $company){ ?>
				<option value="<?php echo $company['cif']; ?>"><?php echo $company['name']; ?></option>
				<?php } ?>
			</select>
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>ESTADO</label>
			<select name="status" class="form-control">
				<option value=0>Cerrada</option>
				<option selected value=1>Abierta</option>
				<option value=2>En curso</option>
				<option value=3>Por verificar</option>
				<option value=4>Por derivar</option>
				<option value=5>Derivada</option>
			</select>
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label>DESCRIPCIÓN</label>
	  		<textarea name="description" class="form-control" rows="5"> </textarea>
	  	</div>
	</div>

	<br><div class="row center-block">
	  	<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary">GUARDAR</button>
	</div>

</form>
