<?php $issueDetail=$_SESSION['IssueReader'][0];?>

<form method="post" action="../../../Back/RequestManager.php?actors=Issue,Issue&actions=Puller,Updater&targets=S,A">
	
	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>TÍTULO</label>
	  		<input type="text" name="title" class="form-control" value="<?php echo $issueDetail['title']; ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>MÁQUINA</label>
	  		<input type="text" disabled name="device" class="form-control" value="<?php echo $issueDetail['device']; ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>EMPRESA</label>
	  		<input type="text" name="company" class="form-control" value="<?php echo $issueDetail['company']; ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>ESTADO</label>
	  		<input type="text" name="status" class="form-control" value="<?php echo $issueDetail['status']; ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label>DESCRIPCIÓN</label>
	  		<textarea name="description" class="form-control" rows="5"><?php echo $issueDetail['description']; ?></textarea>
	  	</div>
	</div>

	<br><div class="row center-block">
		<input type="hidden" name="id" value="<?php echo $issueDetail['id'] ?>"/>
	  	<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary">GUARDAR</button>
	</div>
</form>

<div class="row center-block">
	<form method="post" action="../../../Back/RequestManager.php?actors=Issue,Issue&actions=Puller,Eraser&targets=S,A">
		<input type="hidden" name="id" class="form-control" value="<?php echo $issueDetail['id'] ?>">
		<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-danger">
			ELIMINAR <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		</button>
	</form>
</div>
