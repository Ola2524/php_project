<?php

    class ValidationController implements Validation{

        private $email;
        private $password;
        private $name;
        private $credit_card;
        private $credit_card_expiration_date;

        public function __construct($email,$password,$name,$credit_card,$credit_card_expiration_date){
            $this->email = $email;
            $this->password = $password;
            $this->name = $name;
            $this->credit_card = $credit_card;
            $this->credit_card_expiration_date = $credit_card_expiration_date;
        }


        public static function validateEmail($email){

        }
        public static function validatePassword($password){

        }
        public static function validateRepeatPassword($repeatPassword, $password){

        }
        public static function validateCreditCard($creditCard){

        }
        public static function validateExpirationDate($creditCardExpirationDate){

        }
        public static function validatecheckbox($agree){
            
        }

    }