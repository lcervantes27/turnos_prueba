<?php include "includes/includes.php";
/*date_default_timezone_set("America/Mexico_City");

$show_error = true;
$cat = $_GET["cat"];
$sub = $_GET["sub"];

if(!empty($cat) && !empty($sub)){
     $obj = new dbForm("turno");
   
     
     $turno = $obj->get_var("select turno from turno where id_categoria = {$cat} order by id_turno desc limit 1");
     if(empty($turno)){
        $turno = 1;
     }else{
        $turno = $turno +1;
     }
     
     if(!empty($_POST)){
        //print_r($_POST);exit();
        $turnoDB = new dbForm("turno");
        $fields["turno"] = $turno;
        $fields["id_categoria"] = $cat;
        $fields["id_subcategoria"] = $sub;
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $fecha = $fecha . " " . $hora;
        $fields["fecha"] = $fecha;
        $fields["id_categoria"]=$id;
        $fields["id_subcategoria"]=$sub_id;
        $turnoDB->add($fields);
        header("location:index.php");
    }
     
     echo $turno;
     
     */
}