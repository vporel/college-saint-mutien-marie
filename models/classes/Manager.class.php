<?php
	/*
		Gerer les ventes 
	*/
class Manager{
	protected $bd, $table, $class;

	public function __construct($table, $class){
		$this->bd = new PDO("mysql:host=localhost;dbname=stock_appro", "root", "");
		$this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->table = $table;
		$this->class = $class;
	}
	
	public function element_exist(array $fields){
		$condition = [];
		foreach($fields as $name => $value){
			$condition[] = (is_string($value)) ? $name." = ".$this->bd->quote($value) : $name." = ".$value;
		}
		$select = $this->bd->query("SELECT * FROM ".$this->table." WHERE ".implode(' AND ', $condition));
		return ($select->rowCount() > 0);
	}
	public function get_element(array $fields){
		$condition = [];
		foreach($fields as $name => $value){
			$condition[] = (is_string($value)) ? $name." = ".$this->bd->quote($value) : $name." = ".$value;
		}
		$select = $this->bd->query("SELECT * FROM ".$this->table." WHERE ".implode(' AND ', $condition));
		$data = $select->fetch(PDO::FETCH_ASSOC);
		$data['id'] = (int) $data['id'];
		return new $this->class($data);
	}
	public function get_elements($condition = "", $order = "", $limit = ""){
		$elements = array();
		$query = "SELECT * FROM ".$this->table;
		if($condition != "") $query .= " WHERE ".$condition;
		if($order != "") $query .= " ORDER BY ".$order;
		if($limit != "") $query .= " LIMIT ".$limit;
		$select = $this->bd->query($query);
		while($element_data = $select->fetch(PDO::FETCH_ASSOC)){
			$elements[] = new $this->class($element_data);
		}
		return $elements;
	}
	public function add($element){
		$properties = $element->get_properties();
		$question_marks = [];
		foreach($properties["names"] as $name){
			$question_marks[] = '?';
		}
		$query = $this->bd->prepare("INSERT INTO ".$this->table."(".implode(', ', $properties["names"]).") VALUES(".implode(', ', $question_marks).")");
		return $query->execute($properties["values"]);
	}
	public function update($element){
		$properties = $element->get_properties();
		$changements = [];
		$values = [];
		for($i = 0;$i<count($properties["names"]);$i++){
			if($properties["values"][$i] != null AND $properties["names"][$i] != "id"){
				$values[] = $properties["values"][$i];
				$changements[] = $properties["names"][$i]." = ?";	
			}		
		}
		$query = $this->bd->prepare("UPDATE ".$this->table." SET ".implode(', ', $changements)." WHERE id = ".$element->get_id());
		return $query->execute($properties["values"]);
	}
	public function delete($id){
		return $this->bd->query("DELETE FROM ".$this->table." WHERE id = ".$id);
	}

	public function table_is_empty(){
		return count($this->get_elements()) <= 0;
	}

	public function count_lines(){
		$select = $this->bd->query("SELECT * FROM ".$this->table);
		return $select->rowCount();
	}
}

?>