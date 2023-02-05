<?php
    interface Validation{
    public static function validateEmail($email);
    public static function validatePassword($password);
    public static function validateRepeatPassword($repeatPassword, $password);
    public static function validateCreditCard($creditCard);
    public static function validateExpirationDate($creditCardExpirationDate);
    public static function validatecheckbox($agree);
    }