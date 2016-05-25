<script>
	var pocket = [];
	function saveValues(type, actor, action, value)
	{
		if(value==0) value = 1;
		if(value==1) value = 0;
		var toPoker = [type, actor, action, value];
		pocket();
	}
	function pocket()
	{
		<?php $getValue = echo <script>document.write(toPoker)</script>; ?>
		<?php array_push($poker, $getValue); ?>
		window.alert(<?php var_dump($poker) ?>);
	}
</script>

<button onclick='saveValues(
		<?php echo json_encode($actualType)?>,
		<?php echo json_encode($allUsers[$k]['actor'])?>,
		<?php echo json_encode($allUsers[$k]['action'])?>,
		<?php echo $allUsers[$k]['value']?>)
'>
	Change 
</button>
