<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#NavCollapse">
                <span class="sr-only">Menú</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../index.php">FRACTUM</a>
        </div>
        <div class="collapse navbar-collapse" id="NavCollapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="../../Back/RequestManager.php?actors=User,User&actions=Puller,Creator&targets=S,S&deps=Permissions">USUARIOS</a>
                </li>
                <li>
                    <a href="../../Back/RequestManager.php?actors=Line,Line&actions=Puller,Creator&targets=S,S">LINEAS</a>
                </li>
                <li>
                    <a href="../../Back/RequestManager.php?actors=Device,Device&actions=Puller,Creator&targets=S,S&deps=Upkeep,Line">DISPOSITIVOS</a>
                </li>
                <li>
                    <a href="../../Back/RequestManager.php?actors=Issue,Issue&actions=Puller,Creator&targets=S,S&deps=Device,Company">INCIDENCIAS</a>
                </li>
                <li>
                    <a href="../../Back/RequestManager.php?actors=Company,Company&actions=Puller,Creator&targets=S,S">EMPRESAS</a>
                </li>
                <li>
                    <a href="../../Back/RequestManager.php?actors=Upkeep,Upkeep&actions=Puller,Creator&targets=S,S&deps=Company">MANTENIMIENTO</a>
                </li>
                <li>
                    <a href="../../Back/RequestManager.php?actors=Permissions&actions=Puller&targets=S"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></a>
                </li>
                <li>
                    <a href="../../Back/RequestManager.php?actors=User&actions=Logout&targets=S"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
