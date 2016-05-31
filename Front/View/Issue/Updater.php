<?php
	$issueDetail=$_SESSION['IssueReader'][0];
	$devices = $_SESSION['DevicePuller'];
	$companies = $_SESSION['CompanyPuller'];
?>

<form method="post" action="../../Back/RequestManager.php?actors=Issue,Issue&actions=Puller,Updater&targets=S,A" onsubmit="return issue();">

	<div class="row center-block text-center">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="hide" id="alertTitle" style="background: #ff6666">
				<center><i id="errorTitle"></i></center>
			</div>

			<div class="hide" id="alertDescription" style="background: #ff6666">
				<center><i id="errorDescription"></i></center>
			</div>
		</div>
	</div>
	
	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>TÍTULO</label>
	  		<input type="text" name="title" id="title" class="form-control" value="<?php echo $issueDetail['title']; ?>">
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>MÁQUINA</label>
	  		<input type="text" disabled name="device" class="form-control" value="<?php echo $issueDetail['device']; ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>EMPRESA</label>
			<select name="company" class="form-control">
<?php 		foreach($companies as $company){
				if($company['cif'] == $issueDetail['company']){
?>
				<option hidden selected value="<?php echo $issueDetail['company'] ?>"><?php echo $company['name'] ?></option>
<?php 
				}
			}
			foreach($companies as $company){
?>
				<option value="<?php echo $company['cif']; ?>"><?php echo $company['name']; ?></option>
<?php 	 	} ?>
			</select>
	  	</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<label>ESTADO</label>
	  		<input type="text" name="status" class="form-control" value="<?php echo $issueDetail['status']; ?>">
	  	</div>
	</div>

	<br><div class="row center-block">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label>DESCRIPCIÓN</label>
	  		<textarea name="description" id="description" class="form-control" rows="5"><?php echo $issueDetail['description']; ?></textarea>
	  	</div>
	</div>

	<br><div class="row center-block">
		<input type="hidden" name="id" value="<?php echo $issueDetail['id'] ?>"/>
	  	<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary">GUARDAR</button>
	</div>
</form>

<div class="row center-block">
	<form method="post" action="../../Back/RequestManager.php?actors=Issue,Issue&actions=Puller,Eraser&targets=S,A">
		<input type="hidden" name="id" class="form-control" value="<?php echo $issueDetail['id'] ?>">
		<button type="submit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-danger">
			ELIMINAR <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		</button>
	</form>
</div>
