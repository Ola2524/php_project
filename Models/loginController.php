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
            $passHash = md5($this->password);
            $this->set_table("users");
            $row = $this->getData("email",$this->email);

            // check user
            // print_r($row); echo "<br>";
            // print_r(password_hash("A111111",PASSWORD_BCRYPT));
            if(count($row) > 0){
                if($passHash == $row["password"]){
                    // session start
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["name"] = $row["name"];
                    header("Location:index.php?view=download");
                    exit();
                }else{
                    echo "Wrong Password";
                }
            }else{
                echo "Wrong Email";
            }         
        }
    }