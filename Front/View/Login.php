<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>FRACTUM - Login</title>
    <link href="../min.css" rel="stylesheet">
    <link href="../custom.css" rel="stylesheet">
</head>

<div class="container login">
	<div class="row">
    	<div class='col-lg-12 col-md-12 col-sm-12'>
    		<div class="panel panel-danger">
            	<div class="panel-heading">
                	<h3 class="panel-title">LOGIN - Fractum :D</h3>
                </div>
                <div class="panel-body">
                	<form method="post" action="../../Back/RequestManager.php?actors=User&actions=Login&targets=S">
	                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label>User:</label>
							<input type="text" name="name" class="form-control" value="" > <br>
							<label>Pass:</label>
							<input type="text" name="pass" class="form-control" value="" > <br>
						</div>
	  					<button type="submit" class="col-lg-6 col-md-6 col-sm-6 col-xs-6 btn btn-danger">RECORDAR</button>
	  					<button type="submit" class="col-lg-6 col-md-6 col-sm-6 col-xs-6 btn btn-primary">ENTRAR</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
