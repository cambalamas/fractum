<?php 

/*To-Do...*/
    //CAMBIAR LOS DIVS POR ETIQUETAS SEMÁNTICAS DE HTML5.
    //DEFINIR ANTES EL CORTE DE MOVIL PARA [BS].
    //DEFINIR QUE LOS PANELS SE BAJEN EN LA VERSIÓN MOVIL.


session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>FRACTUM</title>
    <script src="../jquery.js"></script>
    <script src="../min.js"></script>
    <link href="../min.css" rel="stylesheet">
    <link href="../custom.css" rel="stylesheet">
    <script src="../check.js"></script>
</head>

<div class="container">
    <div class="row">
        <?php
        require_once("Nav.php");
        if(isset($_GET['actors']) && isset($_GET['actions']))
        {
            $actors = explode(",",$_GET['actors']);
            $actions = explode(",",$_GET['actions']);
            for($i=0;$i<count($actors);$i++)
            {
                if(count($actors)>1)
                {
        ?>
            <div class='col-lg-6 col-md-6 col-sm-6'>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $actions[$i].'&nbsp'.$actors[$i]; ?></h3>
                    </div>
                    <div class="panel-body">
                        <?php include($actors[$i].'/'.$actions[$i].'.php'); ?>
                    </div>
                </div>
            </div>
        <?php }
        else
        { ?>
            <div class='col-lg-3 col-md-3 col-sm-3'></div>
            <div class='col-lg-6 col-md-6 col-sm-6'>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $actions[$i].'&nbsp'.$actors[$i]; ?></h3>
                    </div>
                    <div class="panel-body">
                        <?php include($actors[$i].'/'.$actions[$i].'.php'); ?>
                    </div>
                </div>
            </div>
            <div class='col-lg-3 col-md-3 col-sm-3'></div>
         <?php } 
        }
    } session_write_close();?>
    </div>
</div>
</html>