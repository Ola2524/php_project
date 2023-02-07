<?php

    class LoginController extends MysqlHandler implements LoginInterface{

        private $email;
        private $password;
        private $msg;

        public function __construct($email, $password){
            $this->email = $email;
            $this->password = $password;
            return $this->link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        }

        public function checkUser(){
            // select from user
            // check user
            // session start
            $this->set_table("users");
                  
            $row = $this->getData("email",$this->email);
          //  print_r($row);
            $this->checkEmail($row);
           
        }

        public function checkEmail($row){
            // print_r($row);
            echo count($row);
            // if(count($row) > 0){
            //     $this->checkPassword($row);
            // }else{
            //     echo "Wrong Email";
            // }
        }

        public function checkPassword($row){
            echo $row["password"];
        //     if($this->password == $row["password"]){
        //         $_SESSION["id"] = $row["id"];
        //         // header("Location:?view=download");
        //         exit();
        //     }else{
        //         echo "Wrong Password";
        //     }
           }
    }