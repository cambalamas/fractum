<?php $companyDetail=$_SESSION['CompanyReader'][0];?>

<form method="post" action="../../Back/RequestManager.php?actors=Company,Company&actions=Puller,Updater&targets=S,A">
	
	<div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>CIF</label>
	  		<input type="text" disabled name="cif" class="form-control" value="<?php echo $companyDetail['cif']; ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>NOMBRE</label>
	  		<input type="text" disabled name="name" class="form-control" value="<?php echo $companyDetail['name']; ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>TELÉFONO</label>
	  		<input type="text" name="prephone" class="form-control" value="<?php echo $companyDetail['prefix'].".".$companyDetail['phone']; ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>CORREO</label>
	  		<input type="email" name="mail" class="form-control" value="<?php echo $companyDetail['mail']; ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>DIRECCIÓN</label>
	  		<input type="text" name="address" class="form-control" value="<?php echo $companyDetail['address']; ?>"> 
	  	</div>
	</div>

	<br><div class="row center-block">
	  	<input type="hidden" name="cif" class="form-control" value="<?php echo $companyDetail['cif']; ?>">
	  	<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary">GUARDAR</button>
	</div>
</form>

<div class="row center-block">
	<form method="post" action="../../Back/RequestManager.php?actors=Company,Company&actions=Puller,Eraser&targets=S,A">
		<input type="hidden" name="cif" class="form-control" value="<?php echo $companyDetail['cif'] ?>">
		<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-danger">
			ELIMINAR <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		</button>
	</form>
</div>
