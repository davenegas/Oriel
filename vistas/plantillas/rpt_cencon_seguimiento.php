<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Type" content="text/html; utf-8"/>
        <title>Histórico de Seguimientos</title>
        <?php require_once 'frm_librerias_head.html'; ?>
        <script src="vistas/js/highstock.js"></script>
        <script src="vistas/js/exporting.js"></script>
        
        <script type="text/javascript">
            $(function () {
		$('#container').highcharts({
                    chart: {
                        type: 'bar'
                    },
                    title: {
			text: (function() { var data = [];  data.push(['<?php echo $titulo?>']); return data; })()
                    },
                    subtitle: {
			text: ''
                    },
                    xAxis: {
                        categories: (function() { var data = [];
                            <?php   for($i = 0 ;$i<count($params);$i++){ ?>
                                data.push(['<?php echo $params[$i]['Apellido_Nombre'];?>']);
                            <?php } ?>
                        return data;
                        })()
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Cantidad de correos',
                            align: 'high'
			},
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    plotOptions: {
			bar: {
                            dataLabels: {
                                enabled: true
                            }
			}
                    },
                    credits: {
			enabled: false
                    },
                    series: [{
                        name: 'Correos enviados',
			data: (function() { var data = [];
                            <?php   for($i = 0 ;$i<count($params);$i++){     ?>
                            data.push([<?php echo $params[$i]['Cantidad'];?>]);
                            <?php } ?>
                            return data;
                        })()
                    }]
                });
            });
            
            $(function () {
		$('#container2').highcharts({
                    chart: {
                        type: 'bar'
                    },
                    title: {
			text: (function() { var data = [];  data.push(['<?php echo $titulo2?>']); return data; })()
                    },
                    subtitle: {
			text: ''
                    },
                    xAxis: {
                        categories: (function() { var data = [];
                            <?php   for($i = 0 ;$i<count($params_especial);$i++){ ?>
                                data.push(['<?php echo $params_especial[$i]['Nombre'].' # '.$params_especial[$i]['Codigo'];?>']);
                            <?php } ?>
                        return data;
                        })()
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Cantidad',
                            align: 'high'
			},
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    plotOptions: {
			bar: {
                            dataLabels: {
                                enabled: true
                            }
			}
                    },
                    credits: {
			enabled: false
                    },
                    series: [{
                        name: 'Cantidad en Arqueo y/o Mantenimiento',
			data: (function() { var data = [];
                            <?php   for($i = 0 ;$i<count($params_especial);$i++){     ?>
                            data.push([<?php echo $params_especial[$i]['Cantidad'];?>]);
                            <?php } ?>
                            return data;
                        })()
                    }]
                });
            });
	</script>
    </head>
    <body>
        <?php require_once 'encabezado.php';?>
        <div class="col-sm-2 sidenav" style="margin-top: 40px;">
            <b><p class="espacio-arriba">Seleccionar parámetros del filtro:</p></b>
            <form class="form-horizontal" role="form" method="POST" action="index.php?ctl=reporte_seguimiento_cencon">
                <div class="col-sm-12 espacio-abajo-5">
                    <label for="fecha_inicial">Fecha Inicial:</label>
                    <input type="date" required=”required” class="form-control text-center" id="fecha_inicial" name="fecha_inicial" value="<?php echo $fecha_inicio;?>">
                </div> 
                <div class="col-sm-12">
                    <label for="fecha_final">Fecha Final:</label>
                    <input type="date" required=”required” class="form-control text-center" id="fecha_final" name="fecha_final" value="<?php echo $fecha_fin;?>">
                </div>
                <button type="submit" class="btn btn-default" style="margin-top: 25px; margin: 27px;">Generar Reporte</button>
            </form> 
        </div>
        <div class="col-sm-10 container espacio-abajo">
            <section class='col-sm-12'>
                <div id="container" style="min-width: 310px; max-width: 1000px; height: 700px; margin: 20 auto; margin-top: 50px;"></div>
            </section>
            <section class='col-sm-12'>
                <div id="container2" style="min-width: 310px; max-width: 1000px; height: 700px; margin: 20 auto; margin-top: 50px;"></div>
            </section>
        </div>
        <?php require_once 'pie_de_pagina.php' ?>
    </body>
</html>