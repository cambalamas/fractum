<?php $allLines = $_SESSION['LinePuller']; ?>

<div class="row text-center">
	<div class='col-xs-2'> </div>
	<div class='col-xs-4'> <strong>Nombre</strong> </div>
	<div class='col-xs-4'> <strong>Estado</strong> </div>
	<div class='col-xs-2'> </div>
</div>

<?php for($k=0; $k<count($allLines); $k++){ ?>

<div class="row text-center">
	<form method="post" action="../../../Back/RequestManager.php?actors=Line,Line&actions=Puller,Reader&targets=S,S">
		<input type="hidden" name="id" value="<?php echo $allLines[$k]['id'] ?>"/>
		<button type="submit" class="emptyButton col-xs-12">
			<div class='col-xs-2'> </div>
			<div class='col-xs-4'> <?php echo $allLines[$k]['name'] ?> </div>
			<div class='col-xs-4'> <?php echo $allLines[$k]['status'] ?> </div>
			<div class='col-xs-2'> </div>
		</button>
	</form>
</div>

<?php }  ?>
