<?php

    abstract class AppObject{
        public function hydrate($data){
			foreach ($data as $key => $value) {
				$method = 'set_'.$key;
				if(method_exists($this, $method)){
					$this->$method($value);
				}else{
					trigger_error("Hydrate : La méthode $method n'a pas été trouvée", E_USER_WARNING);
				}
			}
        }
        /*
			Create an array from other arraay which contains morre than the class' properties
        */
        public static function parse_prop($array){
        	$reflect = new ReflectionClass(get_called_class());
        	$properties = [];
        	foreach($reflect->getProperties() as $property) {
				$property->setAccessible(true);
				$properties[] = $property->getName();
			}
        	$data = [];
        	foreach ($properties as $property) {
        		if(isset($array[$property]))
        			$data[$property] = $array[$property];
        	}
        	return $data;
        }
        public function get(...$keys){
			$attributes = array();
			foreach ($keys as $key) {
				$method = 'get_'.$key;
				if(method_exists($this, $method)){
					$attributes[$key] = $this->$method();
				}else{
					trigger_error("getByArray : La méthode $method n'a pas été trouvée", E_USER_WARNING);
				}
			}
			return $attributes;
		}
		public function get_properties(){
			$reflect = new ReflectionClass($this);
			$properties = array("names" => [], "values" => []);
			foreach($reflect->getProperties() as $property) {
				$property->setAccessible(true);
				if($property->getName() != "id"){
					$properties["names"][] = $property->getName();
					$properties["values"][] = $property->getValue($this);
				}
			}
			return $properties;
		}
    }
?>