<?php
    class connection{
        protected $host = 'localhost';
        protected $user = 'root';
        protected $pass = '';
        protected $db = 'youtubecrudoperation';

        protected $sql;
        protected $result;
        protected $con;

        protected $fname;
        protected $lname;
        protected $email;
        protected $mobile;
        protected $id;
        protected $user_id;
        //connection method
        public function __construct(){
            if(!isset($this->con)){
                $this->con = new mysqli($this->host,$this->user,$this->pass,$this->db);
                if($this->con){
                    //echo 'connected';
                }else{
                    echo 'not conntected';
                }
            }
            return $this->con;
        }
        public function __destruct(){
            $this->con->close();
        }        
    }
    //$obj = new connection();
    //$obj->db_insert('gdfdgg','rahman','ashanour009@gmail.com','01866936562');





?>