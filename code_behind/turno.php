<?php 
	date_default_timezone_set("America/Mexico_City");
	$id=$_REQUEST['id'];
	$sub_id=$_REQUEST['subid'];
	$fecha_anterior = $obj->get_var("select date(fecha) from turno ORDER BY id_turno DESC LIMIT 1");
	$fecha = date("Y-m-d");	
	//NUEVO DÍA
	if($fecha!=$fecha_anterior){		
		$turno_num=1;
	}
	//MISMO DÍA
	else{
		$turno_num = $obj->get_var("select turno from turno ORDER BY id_turno DESC LIMIT 1");
		$turno_num=$turno_num+1;
	}
	if(!empty($_POST)){
		//print_r($_POST);exit();
    	$turnoDB = new dbForm("turno");
		$fields["turno"] = $turno_num;
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

	//exit();
 ?>