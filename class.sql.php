<?php
    include "class.connection.php";

    class sql extends connection{
        public function db_insert($firstname,$lastname,$email,$mobile)
        {
            $this->fname = $firstname;
            $this->lname = $lastname;
            $this->email = $email;
            $this->mobile = $mobile;

            $this->sql = "INSERT INTO `crudtable`(`firstname`, `lastname`, `email`, `mobile`) VALUES ('$this->fname','$this->lname','$this->email','$this->mobile')";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        public function viewdata(){
            $this->sql = "SELECT * FROM  `crudtable`";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                echo 'error'; 
            }
        }
        public function delete($id)
        {
            $this->id = $id;
            $this->sql = "DELETE FROM `crudtable` WHERE id ='$this->id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){                
                return true;
            }else{
                return false;
            }
        }
        public function view($user_id){
            $this->user_id = $user_id;
            $this->sql = "SELECT * FROM  `crudtable` WHERE id = '$this->user_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                echo 'error'; 
            }
        }
        public function update($id,$name,$lastname,$email,$mobile){
            $this->fname = $name;
            $this->lname = $lastname;
            $this->email = $email;
            $this->mobile = $mobile;
            $this->id = $id;

            $this->sql = "UPDATE `crudtable` SET `firstname`='$this->fname',`lastname`='$this->lname',`email`='$this->email',`mobile`='$this->mobile' WHERE id = '$this->id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                echo 'error'; 
            }

        }

    }
    //$obj = new sql();
    //$obj->update('10','asaassadasdasd','rahmangsdrfgdf','ashanour009@gmail.comdgdsfg','dvd01866936562');
    



?>