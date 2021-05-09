<?php
    class Message{
        protected $status, $message;

        public function get_status(){return $this->status;}
        public function get_message(){return $this->message;}

        public function set_status($status){
            if(is_bool($status))
                $this->status = $status;
            else
                trigger_error("Le statut doit etre un booleen");
        }
        public function set_message($message){
            if(is_string($message))
                $this->message = $message;
            else
                trigger_error("Le message doit être une chaine de caractères");
        }
    }
?>
