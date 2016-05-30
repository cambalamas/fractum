<?php $issueDetail=$_SESSION['IssueReader'][0];?>

<form method="post" action="../../Back/RequestManager.php?actors=Issue,Issue&actions=Puller,Reader&targets=S,A&deps=Device,Line">

	<div class="row center-block" style="background: #DDFFDD">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<center><i>
			<?php echo "Incidencia abierta por: <strong>".$issueDetail['owner']."</strong>"; ?>
		</i></center>
		</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>TÍTULO</label>
	  		<input type="text" disabled name="title" class="form-control" value="<?php echo $issueDetail['title']; ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>MÁQUINA</label>
	  		<input type="text" disabled name="device" class="form-control" value="<?php echo $issueDetail['device']; ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>EMPRESA</label>
	  		<input type="text" disabled name="company" class="form-control" value="<?php echo $issueDetail['company']; ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>ESTADO</label>
	  		<input type="text" disabled name="status" class="form-control" value="<?php echo $issueDetail['status']; ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label>DESCRIPCIÓN</label>
	  		<textarea disabled name="description" class="form-control" rows="5"><?php echo $issueDetail['description']; ?></textarea>
	  	</div>
	</div>

	<br><div class="row center-block">
		<input type="hidden" name="id" value="<?php echo $issueDetail['id'] ?>"/>
	  	<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary">MODIFICAR</button>
	</div>
</form>
