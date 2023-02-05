<?php

interface Login{
    public function checkUser($email, $password);
    // public function rememberPassword();  //bonus
}