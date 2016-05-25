<?php
function doSQL($db,$data,$who)
{
	if($data==NULL) $sql = mysqli_prepare($db, "SELECT * FROM $who");
	else
	{
		$types = '';
		if(preg_match('/^\d$/',$data[0]['data'])) $types = $types.'i';
		elseif(preg_match('/^\d+,\d+$/',$data[0]['data'])) $types = $types.'d';
		else $types = $types.'s';

		$values = array($data[0]['data']);
		$query = "SELECT * FROM $who WHERE ".$data[0]['field']." = ?";
		unset($data[0]);

		if(count($data)>=1)
		{
			foreach($data as $rule)
			{
				if(preg_match('/^\d$/',$data[0]['data'])) $types = $types.'i';
				elseif(preg_match('/^\d+,\d+$/',$data[0]['data'])) $types = $types.'d';
				else $types = $types.'s';

				$query = $query." OR ".$rule['field']." = ?";
				array_push($values,$rule['data']);
			}
		}
		$ref = array();
		foreach($values as $key => $val){
			$ref[$key] = &$values[$key];
		}

		$sql = mysqli_prepare($db,$query);
		call_user_func_array('mysqli_stmt_bind_param', array_merge(array($sql,$types),$ref));
	}
	
	return $sql;
}


function randomID($who)
{
	$token = "";
	$token .= substr($who,0,1)."-";
	$codeAlphabet = "abcdefghijklmnopqrstuvwxyz0123456789";
	for($i=0; $i<2; $i++) $token .= $codeAlphabet[rand(0,(strlen($codeAlphabet)-1))];
	return $token;
}
function checkID($id,$list)
{
	$data = array();
	while($row = mysqli_fetch_array($list)) array_push($data, $row);

	if(count($data)==0) return true;
	else
	{
		foreach($data as $maybe) if($maybe==$id) return false;
		return true;
	}
}
?>