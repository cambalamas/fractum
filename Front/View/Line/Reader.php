<?php $lineDetail=$_SESSION['LineReader'][0]; ?>

<form method="post" action="../../Back/RequestManager.php?actors=Line,Line&actions=Puller,Reader&targets=S,A">
	
	<div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>NOMBRE</label>
	  		<input type="text" disabled name="name" class="form-control" value="<?php echo $lineDetail['name'] ?>">
	  		<input type="hidden" name="id" class="form-control" value="<?php echo $lineDetail['id'] ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>ESTADO</label>
	  		<input type="text" disabled name="status" class="form-control" value="<?php if($lineDetail['status'] == 0) echo 'Inactiva'; else echo 'Activa'; ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label>DESCRIPCIÓN</label>
	  		<textarea name="description" disabled class="form-control" rows="5"><?php echo $lineDetail['description'] ?></textarea>
	  	</div>
	</div>

	<br><div class="row center-block">
	  	<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary">MODIFICAR</button>
	</div>
	
</form>
