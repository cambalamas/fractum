<?php $lineDetail=$_SESSION['LineReader'][0];?>

<form method="post" action="../../Back/RequestManager.php?actors=Line,Line&actions=Puller,Updater&targets=S,A" onsubmit="return line();">

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
	  		<input type="text" name="name" id="name" class="form-control" value="<?php echo $lineDetail['name'] ?>">
	  		<input type="hidden" name="id" class="form-control" value="<?php echo $lineDetail['id'] ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>ESTADO</label>
			<select class="form-control" name="status">
				<option hidden selected value="<?php echo $lineDetail['status']; ?>"><?php if($lineDetail['status'] == 1) echo 'Activa'; else echo 'Inactiva' ?></option>
				<option value="1"><?php echo 'Activa'; ?></option>
				<option value="0"><?php echo 'Inactiva'; ?></option>
			</select>
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label>DESCRIPCIÓN</label>
	  		<textarea name="description" id="description" class="form-control" rows="5"><?php echo $lineDetail['description'] ?></textarea>
	  	</div>
	</div>

	<br><div class="row center-block">
	  	<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary">GUARDAR</button>
	</div>
</form>

<div class="row center-block">
	<form method="post" action="../../Back/RequestManager.php?actors=Line,Line&actions=Puller,Eraser&targets=S,A">
		<input type="hidden" name="id" class="form-control" value="<?php echo $lineDetail['id'] ?>">
		<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-danger">
			ELIMINAR <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		</button>
	</form>
</div>
