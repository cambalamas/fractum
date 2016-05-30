<form method="post" action="../../Back/RequestManager.php?actors=Issue,Issue&actions=Puller,Creator&targets=S,A">

	<div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>TÍTULO</label>
	  		<input type="text" name="title" class="form-control" value="">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>USUARIO APERTURA</label>
	  		<input type="text" name="owner" class="form-control" value="">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>MÁQUINA</label>
	  		<input type="text" name="device" class="form-control" value="">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>EMPRESA</label>
	  		<input type="text" name="company" class="form-control" value="">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>FECHA DE APERTURA</label>
	  		<input type="text" name="openDate" class="form-control" value=""> 
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>FECHA DE CIERRE</label>
	  		<input type="text" name="closeDate" class="form-control" value="">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>ESTADO</label>
	  		<input type="text" name="status" class="form-control" value="">
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
