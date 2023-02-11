<?php

class PaymentController extends MysqlHandler implements PaymentInterface
{

    private $email;
    private $password;
    private $repeat_password;
    private $name;
    private $credit_card;
    private $credit_card_expiration_date;
    public $error = array();
    private $order_date;
    private $download_count;
    private $product_id;
    private $user_id;

    public function __construct($email, $password, $repeat_password, $name, $credit_card, $credit_card_expiration_date)
    {
        $this->email = $email;
        $this->password = $password;
        $this->repeat_password = $repeat_password;
        $this->name = $name;
        $this->credit_card = $credit_card;
        $this->credit_card_expiration_date = $credit_card_expiration_date;
        $this->download_count = 0;
        $this->product_id = 1;
        $this->link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    }

    private function addError($val)
    {
        $this->error = $val;
        echo ($this->error);
    }


    public function validateEmail()
    {
        // Trim any whitespace from email
        $val = trim($this->email);
        $this->set_table("users");
        $row = $this->getData("email",$this->email);
        // Pass error if empty otherwise validate entry
        if (empty($val)) {
            $this->addError('Email field cannot be empty.');
        } else if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
            $this->addError('Please enter a valid email address.');
        } else if (count($row) > 0) {
            $this->addError('This Email already exists.');
        } else {
            $this->validatePassword();
        }
    }

    public function validatePassword()
    {
        // $this->password;
        if( !preg_match("#([a-z]*([0-9]+)[a-z]*[A-Z]+[a-z]*)|[a-z]*([A-Z]+)[a-z]*[0-9]+[a-z]*#", $this->password ) ) {
            $this->addError('Password must include at least one digit and One Upper case letter.');
            }
       else if (empty($this->password) || strlen($this->password) < MIN_PASSWORD || strlen($this->password) > MAX_PASSWORD) {
            $this->addError( 'Please enter a valid password.');
        } else {
            $this->validateRepeatPassword();
        }
    }

    public function validateRepeatPassword()
    {
        if (empty($this->repeat_password) || $this->password != $this->repeat_password) {
            $this->addError( 'Please enter the same password.');
        } else {
            $this->validateCreditCard();
        }
    }

    public function validateCreditCard()
    {

        if (strlen($this->credit_card) === CREDIT_CARD_NUMBERS && !empty($this->credit_card) && is_numeric($this->credit_card)) {
            $this->validateExpirationDate();
        } else $this->addError( 'enter valid card number.');
    }
    
    public function validateExpirationDate(){
        if(!empty($this->credit_card_expiration_date)){

            $date_valid=explode("/", $this->credit_card_expiration_date);
            $current_date=explode("/", date("m/y"));  

            if ($date_valid[1] < $current_date[1]) 
            { 
                $this->createUser();
                header("Location:?view=login");
                exit();
            }   
            else if(  $date_valid[1] = $current_date[1] )
            {
                if(($date_valid[0]>= $current_date[0])){
                    $this->addError( 'enter valid card expiration date.');
                }else{
                    $this->createUser();
                    header("Location:?view=login");
                    exit();
                }
            }
        }
    }


    public function createUser(){
        $passHash = md5($this->password);
        $query =  mysqli_query($this->link,"insert into users(name,email,Password) VALUES('$this->name','$this->email','$passHash')");     
        
        $this->user_id = mysqli_insert_id($this->link);
        $this->createOrder();
        return $query;
    }

    public function createOrder()
    {
        $queryOrder =  mysqli_query($this->link,"insert into orders(order_date,download_count,product_id) VALUES(now(),'$this->download_count','$this->product_id')");
        $order_id = mysqli_insert_id($this->link);
        echo $this->user_id;
        $user_order_query = "INSERT INTO `user_order`(`user_id`, `order_id`) VALUES ({$this->user_id},{$order_id})";
        $result = mysqli_query($this->link,  $user_order_query);
        return $result;
    }
}
