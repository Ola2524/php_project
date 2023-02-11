<?php

class LoginController extends MysqlHandler implements LoginInterface
{

    private $email;
    private $password;
    public $error = array();

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
        return $this->link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    }

    private function addError($val)
    {
        $this->error = $val;
        echo ($this->error);
    }

    public function checkUser()
    {
        $passHash = md5($this->password);
        $this->set_table("users");
        $row = $this->getData("email", $this->email);
        if (count($row) > 0) {
            if ($passHash == $row["password"]) {
                // session start
                $_SESSION["id"] = $row["id"];
                $_SESSION["name"] = $row["name"];
                header("Location:index.php?view=download");
                exit();
            } else {
                $this->addError('Wrong Password');
            }
        } else {
            $this->addError('Wrong Email');

        }
    }
    
    
}
