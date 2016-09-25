<!DOCTYPE html>
<html lang="en">
<head>
  <title>Personal BCR</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php require_once 'frm_librerias_head.html';?>

</head>
<body>
<br>
     <center><img src="vistas/Imagenes/Banner_Centro_de_Control.jpg" alt=""/></center>
     <br>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand" href="#">Oriel</a>-->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php?ctl=inicio"><b>Inicio</b></a></li>
        <li><a href="index.php?ctl=personal_listar_publico">Personal</a></li>
        <li><a href="index.php?ctl=puntobcr_listar_publico">Puntos BCR</a></li>
        <!--<li><a href="#">Padrones Fotograficos</a></li>-->
        <li><a href="#">Contáctenos</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?ctl=iniciar_sesion"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-left">
  <div class="row content">
    <div class="col-sm-2 sidenav">
<!--      <p><a href="#">Formulario Claves de Alarma</a></p>
      <p><a href="#">Formulario Acceso Controlado</a></p>
      <p><a href="#">Formulario de Video</a></p>-->
    </div>
     <!--PANTALLA PRINCIPAL DE LA PAGINA-->
    <div class="col-sm-9 text-left">
        <div class="container">
            <br>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="vistas/Imagenes/Foto1.jpg" alt="Chania" width="460" height="345">
                  <div class="carousel-caption">
                  </div>
                </div>

                <div class="item">
                  <img src="vistas/Imagenes/Foto2.jpg" alt="Chania" width="460" height="345">
                  <div class="carousel-caption">
                  </div>
                </div>

                <div class="item">
                  <img src="vistas/Imagenes/Foto3.jpg" alt="Flower" width="460" height="345">
                  <div class="carousel-caption">
                  </div>
                </div>

                <div class="item">
                  <img src="vistas/Imagenes/Foto4.jpg" alt="Flower" width="460" height="345">
                  <div class="carousel-caption">
                  </div>
                </div>
                  
                <div class="item">
                  <img src="vistas/Imagenes/Foto5.jpg" alt="Flower" width="460" height="345">
                  <div class="carousel-caption">
                  </div>
                </div>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>

        
    </div>
<!--    <div class="col-sm-2 sidenav">
      <div class="well">
          <p>Jefatura de Seguridad del Banco de Costa Rica<br>
          </p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>-->
  </div>
</div>

<footer class="container-fluid text-center">
  <hr/>
    Jefatura de Seguridad Banco de Costa Rica - Centro de Control y Monitoreo &copy; <br>
    <?php $hoy = date("F j, Y, g:i a"); 
               //echo  $hoy; 
    
        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
        echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
        echo ", ".date("H:i", time()) . " hrs";
?>
</footer>

</body>
</html>