<form method="post" action="../../Back/RequestManager.php?actors=Upkeep,Upkeep&actions=Puller,Creator&targets=S,A">

	<div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>EMPRESA</label>
	  		<input type="text" name="company" class="form-control" value="">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>FECHA DE ALTA</label>
	  		<input type="text" name="date" class="form-control" value="">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>PERIODICIDAD</label>
	  		<input type="text" name="time" class="form-control" value="">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>PERIODICIDAD (UD. DE TIEMPO)</label>
	  		<select class="form-control" name="unit">
	  			<option value="0" selected>Semanas</option>
	  			<option value="1">Meses</option>
	  			<option value="2">Años</option>
	  		</select>
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>COSTE</label>
	  		<input type="text" name="cost" class="form-control" value=""> 
	  	</div>
	</div>

	<br><div class="row center-block">
	  	<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary">GUARDAR</button>
	</div>

</form>
