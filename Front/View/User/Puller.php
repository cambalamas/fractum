<?php $allUsers = $_SESSION['UserPuller']; ?>

<div class="row text-center">
	<div class='col-xs-3'> <strong>Nombre</strong> </div>
	<div class='col-xs-3'> <strong>Apellidos</strong> </div>
	<div class='col-xs-3'> <strong>Teléfono</strong> </div>
	<div class='col-xs-3'> <strong>E-Mail</strong> </div>
</div>

<?php for($k=0; $k<count($allUsers); $k++){ ?>

<div class="row text-center">
	<form method="post" action="../../../Back/RequestManager.php?actors=User,User&actions=Puller,Reader&targets=S,S">
		<input type="hidden" name="dni" value="<?php echo $allUsers[$k]['dni'] ?>"/>
		<button type="submit" class="emptyButton col-xs-6">
			<div class='col-xs-6'> <?php echo $allUsers[$k]['name'] ?> </div>
			<div class='col-xs-6'> <?php echo $allUsers[$k]['surname'] ?> </div>
		</button>
	</form>
	<div class='col-xs-3'>
		<a href="tel:<?php echo $allUsers[$k]['prefix'].$allUsers[$k]['phone'] ?>"> <span class="glyphicon glyphicon-phone-alt"></span> </a>
	</div>
	<div class='col-xs-3'>
		<a href="mailto:<?php echo $allUsers[$k]['email'] ?>"> <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> </a>
	</div>
</div>

<?php }  ?>
