<?php $types = $_SESSION['PermissionsPuller']; ?>

<form method="post" action="../../Back/RequestManager.php?actors=User,User&actions=Puller,Creator&targets=S,A">

	<div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>DNI</label>
	  		<input type="text" name="dni" class="form-control" value="">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>CONTRASEÑA</label>
	  		<input type="password" name="pass" class="form-control" value="">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>NOMBRE</label>
	  		<input type="text" name="name" class="form-control" value="">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>APELLIDOS</label>
	  		<input type="text" name="surname" class="form-control" value="">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>CORREO</label>
	  		<input type="email" name="mail" class="form-control" value=""> 
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>TELÉFONO</label>
	  		<input type="text" name="prephone" placeholder="+XX.YYYYYYYYY" class="form-control" value="">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>TIPO</label>
			<select class="form-control" name="type">
			<?php foreach($types as $type){ ?>
				<option value="<?php echo $type['type']; ?>"><?php echo $type['type']; ?></option>
			<?php } ?>
			</select>
	  	</div>
	</div>


	<br><div class="row center-block">
	  	<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary">GUARDAR</button>
	</div>

</form>
