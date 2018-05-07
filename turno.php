<?php include "includes/includes.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,500,700" rel="stylesheet">
        <link type="text/css" href="css/estilo.css" rel="stylesheet"/>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <title>Mapfre</title>        
        <script>
            function getUrlVars()
            {
                var vars = [], hash;
                var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
                for(var i = 0; i < hashes.length; i++)
                {
                    hash = hashes[i].split('=');
                    vars.push(hash[0]);
                    vars[hash[0]] = hash[1];
                }
                return vars;
            }
            $(document).ready(function(){
                var tipo = parseInt(getUrlVars()["id"]);
                var subc = parseInt(getUrlVars()["subid"]);
                var num = Number(tipo) - 1;
               
               //console.log("http://hyperion.init-code.com/mapfre/pantalla_turnos/cargar_turno.php?cat=" + tipo + "&sub=" + subc);
                $("#turno").load("http://hyperion.init-code.com/mapfre/pantalla_turnos/cargar_turno.php?cat=" + tipo + "&sub=" + subc);
                
                var texto = ["SIENIESTROS AUTOMÓVILES","SINIESTROS ACCIDENTES Y ENFERMEDADES","SINIESTROS VIDA","SINIESTROS DAÑO"];
                $("#texto_titulo").text(texto[num]);
                $("#imagen_titulo").attr("src","img/tipo_" + tipo + ".png");
                
                
            })
        </script>
    </head>
    <body>
        
        <header class="header_principal">
            <img src="img/mafre_logo.png" alt="logo" class="imagen_logo" style="opacity:0"/>
        </header>
        
        <div class="contenido_principal_nohead">
            <div class="siderbar_secundario">
                 <div class="contenido_tipo">
                    <img src="" class="icono_table" id="imagen_titulo" style="margin-right: 30px;"/>
                    <p class="texto_table_tipo" id="texto_titulo">SIENIESTROS AUTOMÓVILES</p>
                </div>
            </div>
            <div class="subcontenido_secundario">
                <h1 class="titulo_turno">FUE UN PLACER ATENDERLO</h1>
                
                <table class="table_index align_left wdth_ocho">
                    <tr>
                         <!--<td>
                            <p class="texto_espera">TIEMPO ESTIMADO DE ESPERA:</p>
                            <p class="texto_tiempo">5 MINUTOS</p>
                         </td>-->
                         <td>
                            <p class="texto_espera">HORARIO DE ATENCIÓN:</p>
                            <p class="texto_tiempo">9 HRS. A 17 HRS.</p>
                         </td>
                    </tr>
                </table>
                
                <hr class="linea_gris">
                
                 <table class="table_index wdth_ocho">
                    <tr>
                         <td id="turno_id">
                            <p class="texto_turno">SU TURNO ES EL NÚMERO:</p>
                            <p class="texto_turno_num" id="turno"><?php echo $turno_num; ?></p>
                         </td>
                         <td>
                            <p class="tome_turno">IMPRIMA SU TURNO</p>
                            <img src="img/flecha_down.png" class="img_down" alt="flecha_down"/>
                         </td>
                    </tr>
                </table>                
            </div>
        </div>
        <form id="fom_print" method="post">
        	<input type="hidden" id="algo" name="algo" value="0">
        </form>        
    </body>
    <script type="text/javascript">
        $( ".img_down" ).click(function() {
            $(".img_down").off('click');
        	$("#algo").val(1);
            $("#fom_print").submit();
            var mywindow = window.open('', 'PRINT', 'left=50000,top=50000,width=2,height=2');

		    mywindow.document.write('<html><head><title></title>');
            mywindow.document.write('<style type="text/css">#turno{font-weight: bolder;font-size: 10vh;}</style>');            
		    mywindow.document.write('</head><body style="width:100%;height:100%;overflow:hidden;text-align:center;margin-left: -14%;">');
		    mywindow.document.write('<h1>MAPFRE</h1>');
		    mywindow.document.write(document.getElementById("turno_id").innerHTML);
            mywindow.document.write('<p style="font-size:12px">Nombre de red: CAMSedeMAPFRE</p>');
            mywindow.document.write('<p style="font-size:12px">Contraseña:     MapfreCAM507</p>');
		    mywindow.document.write('</body></html>');		    
		    mywindow.document.close();mywindow.focus();
            mywindow.print();
            mywindow.close();

            //window.location.href = "index.php";

        });
    </script>
</html>