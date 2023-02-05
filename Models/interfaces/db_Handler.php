<?php
interface Db_Handler {
    public function connect();
    public function disconnect();
}