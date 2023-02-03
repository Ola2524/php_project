<?php
interface db_Handler {
    public function connect();
    public function disconnect();
}