<?php

interface LoginInterface{
    public function checkUser();
    public function checkEmail($email);
    public function checkPassword($password);
    // public function rememberPassword();  //bonus
}