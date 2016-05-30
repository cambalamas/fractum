<?php $allUsers = $_SESSION['PermissionsPuller'];?>

<script>
	var pocket = [];
	var flag = [];
	function data(type, actor, action, value, cont)
	{
		if(typeof flag[cont] == 'undefined')
		{
			if(value==0) value = 1;
			else value = 0;
			var temp = [value,type,actor,action];
			pocket.push(temp);
		}
		flag[cont]=1;
	}
	function save()
	{
		document.getElementById("saveVar").value=pocket;
	}
</script>

<div class="row text-center">
	<form method="post" action="../../Back/RequestManager.php?actors=Permissions&actions=Creator&targets=A">
		<strong>Nuevo tipo: &nbsp; &nbsp;</strong> <input value="" name="type"/> &nbsp; 
		<button type="submit" class="emptyButton">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
		</button>
	</form>
</div>


<?php
	$actualType = "";
	for($k=0; $k<count($allUsers); $k++)
	{
		if(!($allUsers[$k]['type']==$actualType))
		{
			$actualType = $allUsers[$k]['type'];
?>
			<br><div class="row text-center"> <!-- CUTRADA -->
				<div class="panel-heading" style="background: #F5F5F5;">
					<h3 class="panel-title">
							<form method="post" action="../../Back/RequestManager.php?actors=Permissions&actions=Eraser&targets=A">
	  							<button type="submit" class="emptyButton">
	  								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
	  								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  							</button>
	   							<?php echo $actualType;?> 
	   							<input type="hidden" value="<?php echo $allUsers[$k]['type']?>" name="type"/>
	  							<button type="submit" class="emptyButton">
	  								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
	  							</button>
							</form>
					</h3>
					<div class="row text-center" style="background: #DDD;"> 
						<div class='col-xs-4'> <strong>Actor</strong> </div>
						<div class='col-xs-4'> <strong>Acción</strong> </div>
						<div class='col-xs-4'> <strong>Estado</strong> </div>
					</div>
				</div>
			</div> <br>
<?php
		}
		
		if($allUsers[$k]['type']==$actualType)
		{
?>
			<div class="row text-center">
				<div class='col-xs-4'>
					<?php echo $allUsers[$k]['actor']?>
				</div>
				<div class='col-xs-4'>
					<?php echo $allUsers[$k]['action']?>
				</div>
				<div class='col-xs-4'> 
					<?php echo $allUsers[$k]['value']?>
					<button class="btn btn-warning" onclick='data(
							<?php echo json_encode($allUsers[$k]['type'])?>,
							<?php echo json_encode($allUsers[$k]['actor'])?>,
							<?php echo json_encode($allUsers[$k]['action'])?>,
							<?php echo $allUsers[$k]['value']?>,<?php echo $k ?>);
					'>
						Change 
					</button>
				</div>
			</div>

<?php
		}
	}
?>


<div class="row center-block"> <br>
	<form method="post" action="../../Back/RequestManager.php?actors=Permissions&actions=Updater&targets=A" onsubmit="save()">
	    <input type="hidden" id="saveVar" value="" name="changes" type="hidden"/>
	  	<button type="submit" class="col-xs-12 btn btn-primary"> GUARDAR CAMBIOS </button>
	</form>
</div>
