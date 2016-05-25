<?php $allIssues = $_SESSION['IssuePuller']; ?>

<div class="row text-center">
	<div class='col-xs-3'> <strong>Título</strong> </div>
	<div class='col-xs-2'> <strong>Estado</strong> </div>
	<div class='col-xs-2'> <strong>Máquina</strong> </div>
	<div class='col-xs-2'> <strong>Empresa</strong> </div>
	<div class='col-xs-3'> <strong>Últ. it</strong> </div>
</div>

<?php for($k=0; $k<count($allIssues); $k++){ ?>

<?php
	$lastCommit = "";
	if(isset($allIssues[$k]['lastCommit'])) $lastCommit .= $allIssues[$k]['lastCommit'];
	else $lastCommit .= "-";
?>

<div class="row text-center">
	<form method="post" action="../../../Back/RequestManager.php?actors=Issue,Issue&actions=Puller,Reader&targets=S,S">
		<input type="hidden" name="id" value="<?php echo $allIssues[$k]['id'] ?>"/>
		<button type="submit" class="emptyButton col-xs-12">
			<div class='col-xs-3'> <?php echo $allIssues[$k]['title'] ?> </div>
			<div class='col-xs-2'> <?php echo $allIssues[$k]['status'] ?> </div>
			<div class='col-xs-2'> <?php echo $allIssues[$k]['device'] ?> </div>
			<div class='col-xs-2'> <?php echo $allIssues[$k]['company'] ?> </div>
			<div class='col-xs-3'> <?php echo $lastCommit ?> </div>
		</button>
	</form>
</div>

<?php }  ?>
