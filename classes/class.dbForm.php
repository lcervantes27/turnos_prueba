<?php
class dbForm extends db {
	var $fields;
	var $table;
	
	function dbForm($table = null){
		$this->db();
		
		if(!empty($table))
			$this->setFields($table);
	}
	
	function setFields($table){
		$this->table = $table;
		$this->fields = array();
		
		$query = "show fields from {$this->table}";	
		$_fields = $this->get_results($query, ARRAY_A);
		
		foreach($_fields as $_field){
			$this->fields[$_field["Field"]] = $_field["Type"];
		}
	}

	function add($fields){
		$keys = "";
		$values = "";

		while(list($key, $value) = each($fields)){
			$keys .= $key.",";
			$value = str_replace("'","&#039;",$value);
			$values .= $this->formatField($key, $value).",";			
		}		
		
		$keys = substr($keys, 0, strlen($keys) - 1);
		$values = substr($values, 0, strlen($values) - 1);
		$sql = "insert into $this->table($keys) values($values)";

		if(strlen($values) > 0)
			$this->query($sql);
	}
	
	function update($id, $fields, $id_field = null){
		if(!is_numeric($id))
			return false;
		
		$table = $this->table;
		$values = "";
		
		if(empty($id_field))
			$id_field = "id_{$table}";
		
		while(list($key, $value) = each($fields)){
			$value = str_replace("'","&#039;",$value);
			$tmpValue = $this->formatField($key, $value, true);
			if(!is_numeric($tmpValue) && empty($tmpValue))
				continue;
			
			$values .= "$key = $tmpValue, ";
		}
		
		$values = substr($values, 0, strlen($values) - 2);
		$sql = "update $table set $values where $id_field = $id";
		
		if(strlen($values)>0)
			$this->query($sql);
	}		
	
	function postArray($ignoreFields = array(), $i = -1){
		$result = array();					
		reset($this->fields);

		if($i == -1){
			while(list($key, $value) = each($this->fields)){
				if(isset($_POST[$key]))
					$result[$key] = $_POST[$key];
			}			
		} else {
			while(list($key, $value) = each($this->fields)){
				if(isset($_POST[$key]))
					$result[$key] = $_POST[$key][$i];  
			}			
		}
		
		return $result;
	}
	
	function formatField($key, $value, $update = false) {
		$result = null;

		if(!(strpos($this->fields[$key],"int") === false)){
			if(is_numeric($value))
				$result = $value;
			else  {
				$result = "0";
				if($update)
					$result = null;
			}
		} else {
			if(empty($value) && !($value === "0")){
				$result = "''";
				if($update)
					$result = null;
			}
			else 
				$result = "'$value'";
		}

		return $result;
	}	
	
	function getddl($table, $where = ""){		
		return $this->get_results("select id_{$table}, {$table} from {$table} $where order by {$table} asc");
	}
}