<?php $types = $_SESSION['PermissionsPuller']; ?>

<form method="post" action="../../Back/RequestManager.php?actors=User,User&actions=Puller,Creator&targets=S,A" onsubmit="return user();">

	<div class="row center-block text-center">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="hide" id="alertDni" style="background: #ff6666">
				<center><i id="errorDni"></i></center>
			</div>

			<div class="hide" id="alertPass" style="background: #ff6666">
				<center><i id="errorPass"></i></center>
			</div>

			<div class="hide" id="alertName" style="background: #ff6666">
				<center><i id="errorName"></i></center>
			</div>

			<div class="hide" id="alertSurname" style="background: #ff6666">
				<center><i id="errorSurname"></i></center>
			</div>

			<div class="hide" id="alertMail" style="background: #ff6666">
				<center><i id="errorMail"></i></center>
			</div>

			<div class="hide" id="alertPrephone" style="background: #ff6666">
				<center><i id="errorPrephone"></i></center>
			</div>

			<div class="hide" id="alertType" style="background: #ff6666">
				<center><i id="errorType"></i></center>
			</div>

			<div class="hide" id="alertContact" style="background: #ff6666">
				<center><i id="errorContact"></i></center>
			</div>
		</div>
	</div>

	<div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>DNI</label>
	  		<input type="text" name="dni" id="dni" class="form-control" value="">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>CONTRASEÑA</label>
	  		<input type="password" name="pass" id="pass" class="form-control" value="">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>NOMBRE</label>
	  		<input type="text" name="name" id="name" class="form-control" value="">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>APELLIDOS</label>
	  		<input type="text" name="surname" id="surname" class="form-control" value="">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>CORREO</label>
	  		<input type="text" name="mail" id="mail" class="form-control" value=""> 
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>TELÉFONO</label>
	  		<input type="text" name="prephone" id="prephone" placeholder="+XX.YYYYYYYYY" class="form-control" value="">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>TIPO</label>
			<select class="form-control" name="type" id="type">
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
