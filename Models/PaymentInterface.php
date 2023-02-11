<?php

interface PaymentInterface{
    public  function validateEmail();
    public  function validatePassword();
    public  function validateRepeatPassword();
    public  function validateCreditCard();
    public  function validateExpirationDate();
    // public  function validatecheckbox();
    public function createUser();
    public function checkDownload_count(); 
    public function createOrder();
}