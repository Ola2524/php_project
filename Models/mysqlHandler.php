<?php

    class mysqlHandler implements db_Handler
    {
        private $link;
        private $table;

        public function __construct($table) {
            $this->connect();
            $this->table = $table;
        }

        public function connect(){
            try {
                $this->link = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
            } catch (Exception $ex) {
                echo $ex->getMessage();
                exit();
            }
        }
        
        public function disconnect(){
            mysqli_close($this->link);
        }
    }
    
    