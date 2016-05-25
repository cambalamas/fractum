<?php $allUpkeeps = $_SESSION['UpkeepPuller']; ?>

<div class="row text-center">
	<div class='col-xs-3'> <strong>Empresa</strong> </div>
	<div class='col-xs-3'> <strong>Periodicidad</strong> </div>
	<div class='col-xs-3'> <strong>Coste</strong> </div>
	<div class='col-xs-3'> <strong>Fecha alta</strong> </div>
</div>

<?php for($k=0; $k<count($allUpkeeps); $k++){ ?>

<?php
	$unit = "";
	$aux = $allUpkeeps[$k]['unit'];
	if($aux==0) $unit .= "Semanas";
	elseif($aux==1) $unit .= "Meses";
	elseif($aux==2) $unit .= "Años";
?>

<div class="row text-center">
	<form method="post" action="../../../Back/RequestManager.php?actors=Upkeep,Upkeep&actions=Puller,Reader&targets=S,S">
		<input type="hidden" name="id" value="<?php echo $allUpkeeps[$k]['id'] ?>"/>
		<button type="submit" class="emptyButton col-xs-12">
			<div class='col-xs-3'> <?php echo $allUpkeeps[$k]['company'] ?> </div>
			<div class='col-xs-3'> <?php echo $allUpkeeps[$k]['time']." ".$unit ?> </div>
			<div class='col-xs-3'> <?php echo $allUpkeeps[$k]['cost'] ?> </div>
			<div class='col-xs-3'> <?php echo substr($allUpkeeps[$k]['date'], 0, 10) ?> </div>
		</button>
	</form>
</div>

<?php }  ?>
