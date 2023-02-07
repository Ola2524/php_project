<?php

interface PaymentInterface{
    public function createUser($email, $password);
    public function checkDownload_count(); 
    public function createOrder();
}