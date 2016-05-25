<?php $allCompanies = $_SESSION['CompanyPuller']; ?>

<div class="row text-center">
	<div class='col-xs-3'> <strong>CIF</strong> </div>
	<div class='col-xs-3'> <strong>Nombre</strong> </div>
	<div class='col-xs-3'> <strong>Teléfono</strong> </div>
	<div class='col-xs-3'> <strong>E-Mail</strong> </div>
</div>

<?php for($k=0; $k<count($allCompanies); $k++){ ?>

<div class="row text-center">
	<form method="post" action="../../../Back/RequestManager.php?actors=Company,Company&actions=Puller,Reader&targets=S,S">
		<input type="hidden" name="cif" value="<?php echo $allCompanies[$k]['cif'] ?>"/>
		<button type="submit" class="emptyButton col-xs-6">
			<div class='col-xs-6'> <?php echo $allCompanies[$k]['cif'] ?> </div>
			<div class='col-xs-6'> <?php echo $allCompanies[$k]['name'] ?> </div>
		</button>
	</form>
	<div class='col-xs-3'>
		<a href="tel:<?php echo $allCompanies[$k]['prefix'].$allCompanies[$k]['phone'] ?>"> <span class="glyphicon glyphicon-phone-alt"></span> </a>
	</div>
	<div class='col-xs-3'>
		<a href="mailto:<?php echo $allCompanies[$k]['mail'] ?>"> <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> </a>
	</div>
</div>

<?php }  ?>
