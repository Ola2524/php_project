<?php

    class PaymentController extends MysqlHandler implements PaymentInterface{

        private $email;
        private $password;
        private $repeat_password;
        private $name;
        private $credit_card;
        private $credit_card_expiration_date;
        public $error=array();

        public function __construct($email,$password,$repeat_password,$name,$credit_card,$credit_card_expiration_date){
            $this->email = $email;
            $this->password = $password;
            $this->repeat_password = $repeat_password;
            $this->name = $name;
            $this->credit_card = $credit_card;
            $this->credit_card_expiration_date = $credit_card_expiration_date;
        }


        public function validateEmail(){
           // Trim any whitespace from email
            $val = trim($this->email);

            // Pass error if empty otherwise validate entry
            if (empty($val)) {
                $this->addError('email', 'Email field cannot be empty.');
            } else if(!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'Please enter a valid email address.');
                
            }else{
                $this->validatePassword();
            }
        }
    
        
        public function validatePassword(){
            if (empty($this->password) || strlen($this->password) < MIN_PASSWORD || strlen($this->password) > MAX_PASSWORD){
                $this->addError('password', 'Please enter a valid password.');
            }else {
                $this->validateRepeatPassword();
            }
        }

        public function validateRepeatPassword(){
            if(empty($this->repeat_password) || $this->password != $this->repeat_password){
                $this->addError('repeat_password', 'Please enter the same password.');
            }else {
                $this->validateCreditCard();
            }
        }

        public function validateCreditCard(){

            $cardtype = array(
                "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
                "mastercard" => "/^5[1-5][0-9]{14}$/",
            );
             if(strlen($this->credit_card) === CREDIT_CARD_NUMBERS && !empty($this->credit_card) && is_numeric($this->credit_card))
            {
                $this->validateExpirationDate();
              } else $this->addError('credit_card', 'enter valid card number.');
        
        }
        public function validateExpirationDate(){
            if(!empty($this->credit_card_expiration_date)){
 
                $date_valid=explode("/", $this->credit_card_expiration_date);
                $current_date=explode("/", date("m/y"));  

                if ($date_valid[1] < $current_date[1]) 
                { 
                    header("Location:?view=login");
                    exit();
                }   
                else if(  $date_valid[1] = $current_date[1] )
                {
                    if(($date_valid[0]>= $current_date[0])){
                        $this->addError('credit_card_exp', 'enter valid card expiration date.');
                    }else{
                        header("Location:?view=login");
                        exit();
                    }
                }
            }
        }
     
        private function addError($key, $val)
        {
            $this->error[$key] = $val;
            print_r($this->error);
        }

        public function createUser($email, $password){
            
        }
        public function checkDownload_count(){
            
        }
        public function createOrder(){
            
        }

    }