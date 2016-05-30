<?php $userDetail=$_SESSION['UserReader'][0];?>

<form method="post" action="../../Back/RequestManager.php?actors=User,User&actions=Puller,Reader&targets=S,A">
	
	<div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>DNI</label>
	  		<input type="text" disabled name="dni" class="form-control" value="<?php echo $userDetail['dni'] ?>">
	  		<input type="hidden" name="dni" class="form-control" value="<?php echo $userDetail['dni'] ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>CONTRASEÑA</label>
	  		<input type="password" disabled name="pass" class="form-control" value="<?php echo $userDetail['pass'] ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>NOMBRE</label>
	  		<input type="text" disabled name="name" class="form-control" value="<?php echo $userDetail['name'] ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>APELLIDOS</label>
	  		<input type="text" disabled name="surname" class="form-control" value="<?php echo $userDetail['surname'] ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>CORREO</label>
	  		<input type="email" disabled name="email" class="form-control" value="<?php echo $userDetail['mail'] ?>"> 
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>TELÉFONO</label>
	  		<input type="text" disabled name="prephone" placeholder="+XX.YYYYYYYYY" class="form-control" value="<?php echo $userDetail['prefix'].'.'.$userDetail['phone'] ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>TIPO</label>
	  		<input type="text" disabled name="type" class="form-control" value="<?php echo $userDetail['type'] ?>">
	  	</div>
	</div>


	<br><div class="row center-block">
	  	<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary">MODIFICAR</button>
	</div>
</form>

<div class="row center-block">
	<form method="post" action="../../Back/RequestManager.php?actors=User,User&actions=Puller,Perms&targets=S,S">
		<input type="hidden" name="dni" class="form-control" value="<?php echo $userDetail['dni'] ?>">
		<button type="submit"class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-danger"> EDITAR REGLAS </button>
	</form>
</div>
