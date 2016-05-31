<form method="post" action="../../Back/RequestManager.php?actors=Line,Line&actions=Puller,Creator&targets=S,A" onsubmit="return line();">

	<div class="row center-block text-center">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="hide" id="alertName" style="background: #ff6666">
				<center><i id="errorName"></i></center>
			</div>

			<div class="hide" id="alertDescription" style="background: #ff6666">
				<center><i id="errorDescription"></i></center>
			</div>
		</div>
	</div>

	<div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>NOMBRE</label>
	  		<input type="text" name="name" id="name" class="form-control" value="">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>ESTADO</label>
			<select class="form-control" name="status">
				<option value="0">Inactiva</option>
				<option selected value="1">Activa</option>
			</select>
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label>DESCRIPCIÓN</label>
	  		<textarea name="description" id="description" class="form-control" rows="5"></textarea>
	  	</div>
	</div>

	<br><div class="row center-block">
	  	<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary">GUARDAR</button>
	</div>

</form>
