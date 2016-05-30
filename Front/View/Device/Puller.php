<?php $allDevices = $_SESSION['DevicePuller']; ?>

<div class="row text-center">
	<div class='col-xs-3'> <strong>Nombre</strong> </div>
	<div class='col-xs-3'> <strong>Mantenimiento</strong> </div>
	<div class='col-xs-3'> <strong>Coste</strong> </div>
	<div class='col-xs-3'> <strong>Línea</strong> </div>
</div>

<?php for($k=0; $k<count($allDevices); $k++){ ?>

<div class="row text-center">
	<form method="post" action="../../Back/RequestManager.php?actors=Device,Device&actions=Puller,Reader&targets=S,S">
		<input type="hidden" name="serialNumber" value="<?php echo $allDevices[$k]['serialNumber'] ?>"/>
		<button type="submit" class="emptyButton col-xs-12">
			<div class='col-xs-3'> <?php echo $allDevices[$k]['name'] ?> </div>
			<div class='col-xs-3'> <?php echo $allDevices[$k]['upkeep'] ?> </div>
			<div class='col-xs-3'> <?php echo $allDevices[$k]['cost'] ?> </div>
			<div class='col-xs-3'> <?php echo $allDevices[$k]['line'] ?> </div>
		</button>
	</form>
</div>

<?php }  ?>
