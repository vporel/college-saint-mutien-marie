<?php
class Sale extends AppObject{
	protected 
		$id = null, $bill = null, $article = null, $sale_mode = null, 
		$buying_price = null, $quantity = null, $sale_price = null, $discount = null;
	public function __construct(array $datas){
		$this->hydrate($datas);
	}
	
	// Getters
	public function get_id(){ return $this->id;}
	public function get_bill(){ return $this->bill;}
	public function get_id_bill(){ return $this->bill->get_id();}
	public function get_id_article(){ return $this->article->get_id();}
	public function get_article(){ return $this->article;}
	public function get_sale_mode(){ return $this->sale_mode;}
	public function get_quantity(){return $this->quantity;}
	public function get_sale_price(){return $this->sale_price;}
	public function get_buying_price(){return $this->buying_price;}
	public function get_discount(){return $this->discount;}
	// SETTERS
	public function set_id($id){
		if((int)$id > 0){
			$this->id = (int) $id;
		}else{
			trigger_error("L'id doit etre un entier strictement positif", E_USER_WARNING);
		}
	}
	public function set_bill($bill){
		if(get_class($bill) == 'Bill'){
			$this->bill = $bill;
		}else{
			trigger_error("La facture doit etre une instance de la classe Bill", E_USER_WARNING);
		}
	}
	public function set_article($article){
		if(get_class($article) == 'Article'){
			$this->article = $article;
		}else{
			trigger_error("L'article doit etre une instance de la classe Article", E_USER_WARNING);
		}
	}

	public function set_id_article($id){$this->article = new Article(["id"=>$id]);}
	public function set_id_bill($id){$this->bill = new Bill(["id"=>$id]);}
	
	public function set_sale_mode($value){
		if((int)$value > 0){
			$this->sale_mode = (int) $value;
		}else{
			trigger_error("Le modde de vente doit etre un entier strictement positif", E_USER_WARNING);
		}
	}
	
	public function set_quantity($qte){
		if((int)$qte > 0){
			$this->quantity = (int) $qte;
		}else{
			trigger_error("la qte doit etre un entier strictement positif", E_USER_WARNING);
		}
	}
	public function set_buying_price($val){
		if((int)$val > 0){
			$this->buying_price = (int) $val;
		}else{
			trigger_error("le prix d'achat doit etre un entier strictement positif", E_USER_WARNING);
		}
	}
	public function set_sale_price($val){
		if((int)$val > 0){
			$this->sale_price = (int) $val;
		}else{
			trigger_error("le prix de vente doit etre un entier strictement positif", E_USER_WARNING);
		}
	}
	public function set_discount($val){
		if((int)$val >= 0){
			$this->discount = (int) $val;
		}else{
			trigger_error("la réduction doit etre un entier positif", E_USER_WARNING);
		}
	}

	public function get_total(){ 
		return $this->quantity * ($this->sale_price - (($this->sale_price*$this->discount)/100));
	}

	public function get_benefit(){
		return $this->get_total() - ($this->quantity * $this->buying_price);
	}
}
?>