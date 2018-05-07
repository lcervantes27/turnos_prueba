<?php 
	$id=$_REQUEST['id'];
	$row = $obj->get_results("select id_subcategoria, subcategoria from subcategoria where id_categoria ={$id}");
	$json_response=json_encode($row);
	//print_r($json_response);exit();
 ?>