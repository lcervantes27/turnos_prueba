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
                var num = Number(tipo) - 1;
               
                
                var texto = ["SIENIESTROS AUTOMÓVILES","SINIESTROS A Y E","SINIESTROS VIDA","SINIESTROS HOGAR BIEN SEGURO"];
                $("#texto_titulo").text(texto[num]);
                $("#imagen_titulo").attr("src","img/tipo_" + tipo + ".png");
                //console.log(opciones);
                /*if (tipo == 1) {
                    var opciones = ["ROBO TOTAL","PÉRDIDA TOTAL","REEMBOLSOS","DEDUCIBLE","ENTREGA / CAMBIOS VOLANTE DE ADMISIÓN A TALLER"];
                }else if (tipo == 2) {
                    var opciones = ["CIRUGÍA PROGRAMADA","REEMBOLSO","ESTADOS DE CUENTA","REPORTES DE SINIESTRIDAD","PAGO A PROVEEDORES","ESTATUS DE SINIESTRO"];
                }else if (tipo == 3) {
                    var opciones = ["RECEPCIÓN DE INDEMNIZACIONES","RESCATES / VENCIMIENTOS","ESTATUS DE SINIESTRO"];
                }else if (tipo == 4) {
                    var opciones = ["RECEPCIÓN DE REEMBOLSO","ESTATUS DE SINIESTRO"];
                }
                
                text = '<ul  class="lista_opciones">';
                for(i = 0; i < opciones.length; i++){
                    text += '<a href="turno.php?id=' + tipo + '&subid=' + (i + 1) + '"><li><p>' + opciones[i] + '</p><div class="contenido_flecha"><img src="img/flecha.png" alt="flecha"/></div><div class="clear"></div></li></a>';
                }
                text += '</ul>';*/
                text="";
                text = '<ul  class="lista_opciones">';
                var algo=<?php echo $json_response; ?>;
                for(i = 0; i < algo.length; i++){
                    text += '<a  class="to_turno" onclick="clickAndDisable();" href="turno.php?id=' + tipo + '&subid=' +algo[i].id_subcategoria + '"><li><p>' + algo[i].subcategoria + '</p><div class="contenido_flecha"><img src="img/flecha.png" alt="flecha"/></div><div class="clear"></div></li></a>';
                }
                text += '</ul>';
                $("#lista_opciones").html(text);
            });
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
                <a href="index.php"><button class="bottom_btn">Regresar</button></a>
            </div>
            <div class="subcontenido_secundario">
                <h3 class="titulo_secundario">SELECCIONE UNA OPCIÓN PARA IMPRIMIR</h3>
                
                <div id="lista_opciones"></div>
            </div>
        </div>
        <script type="text/javascript">
            function clickAndDisable() {
                $('a.to_turno').click(function() { return false; });
           }
        </script>
    </body>
</html>