<!Realizar comentarios de una línea en HTML>

<!-- El siguiente código crea el pie de página standard
del sitio web, mediante etiquetas HTML muestra la información
requerida
 --> 


<html>
    <center><img src="vistas/Imagenes/Oriel.jpg" alt=""/></center>
<footer class="col-lg-12" align="center">
            <hr/>
            Jefatura de Seguridad Banco de Costa Rica -Centro de Control y Monitoreo-  Prueba de Sincronizacion &copy; <br>
               <?php 
               $hoy = date("F j, Y, g:i a"); 
               echo  $hoy; 
               ?>
           
        </footer>
</html> 