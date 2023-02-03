<?php

interface payment{
    public function validate($email, $password, $confirm_password, $credit_card, $expiration_date);
    public function createUser($email, $password);
    public function checkDownload_count();
    public function createOrder($order_id , $order_date, $download_count,$product_id = 1);
}