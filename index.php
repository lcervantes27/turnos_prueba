<?php include "includes/includes.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,500,700" rel="stylesheet">
        <link type="text/css" href="css/estilo.css" rel="stylesheet"/>
        <title>Mapfre</title>
    </head>
    <body>
        
        <!--<header class="header_principal">
            <img src="img/logo_mapfre.png" alt="logo"/>
        </header>-->
        
        <div class="contenido_principal">
            <img src="img/fondo_1.png" alt="imagen_fondo" class="imagen_fondo"/>
            <img src="img/mafre_logo.png" alt="img_logo" class="imagen_logo" style="opacity:0"/>
            <h2 class="bienvenido_h2">BIENVENIDO</h2>
            <p class="porfavor_selecione">POR FAVOR, SELECCIONE EL TIPO DE TRÁMITE QUE DESEA REALIZAR</p>
            
            <table class="table_index">
               <tr>
                    <td>
                        <a href="tipo.php?id=1"><div>
                            <img src="img/tipo_1_rojo.png" class="icono_table"/>
                            <p class="texto_table">SINIESTROS AUTOMÓVILES</p>
                        </div></a>
                    </td>
                    <td>
                        <a href="tipo.php?id=2"><div>
                            <img src="img/tipo_2_rojo.png" class="icono_table"/>
                            <p class="texto_table">SINIESTROS A y E</p>
                        </div></a>
                    </td>
               </tr>
               <tr>
                    <td>
                        <a href="tipo.php?id=3"><div>
                            <img src="img/tipo_3_rojo.png" class="icono_table"/>
                            <p class="texto_table">SINIESTROS VIDA</p>
                        </div></a>
                    </td>
                    <td>
                        <a href="tipo.php?id=4"><div>
                            <img src="img/tipo_4_rojo.png" class="icono_table"/>
                            <p class="texto_table">SINIESTROS HOGAR BIEN SEGURO</p>
                        </div></a>
                    </td>
               </tr> 
            </table>
            <p class="texto_fecha" id="fecha_p"></p>
        </div>        
    </body>
    <script type="text/javascript">
        //Weekdays
        var weekdays = new Array(7);
        weekdays[0] = "Domingo";
        weekdays[1] = "Lunes";
        weekdays[2] = "Martes";
        weekdays[3] = "Miércoles";
        weekdays[4] = "Jueves";
        weekdays[5] = "Viernes";
        weekdays[6] = "Sábado";
        //meses
        var meses = new Array(12);
        meses[0] = "enero";
        meses[1] = "febrero";
        meses[2] = "marzo";
        meses[3] = "abril";
        meses[4] = "mayo";
        meses[5] = "junio";
        meses[6] = "julio";
        meses[7] = "agosto";
        meses[8] = "septiembre";
        meses[9] = "octubre";
        meses[10] = "noviembre";
        meses[11] = "diciembre";        
        setInterval(function() {
            var currentTime = new Date ( );
            var currentHours = currentTime.getHours ( );   
            var currentMinutes = currentTime.getMinutes ( );  
            var currentDay=currentTime.getDay();
            var currentMonth=currentTime.getMonth();
            var day = currentTime.getUTCDate();
            document.getElementById('fecha_p').innerHTML = weekdays[currentDay]+", "+day+" "+meses[currentMonth]+" | "+currentHours+":"+currentMinutes;
        }, 1000);
    </script>
</html>