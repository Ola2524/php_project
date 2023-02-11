<?php

    class DownloadController extends MysqlHandler implements DownloadInterface{

        public function __constructor(){}

        public function checkDownload_count()
        {
            $this->set_table("orders");
            $query = "SELECT `download_count` FROM `user_order` INNER JOIN `orders` ON `orders`.id = `user_order`.order_id INNER JOIN `users` ON users.id = user_order.user_id where users.id = {$_SESSION['id']}";
            // $this->getDataFromTwoTables("download_count","orders","user_orders");
            $result = mysqli_query($this->link,  $query);
            $res = array();
            while($row = mysqli_fetch_array($result))
            {
              $res [] = $row;
            }
    
            if ($res[0][0] < MAX_DOWNLOAD){
                // $this->download();
            }else {
                header("Location:?view=error");
            }
        }

        public function download(){
            $this->set_table("products");
            $product = $this->getData("name","XYZ product");

            $filename = __DIR__ . '/../XYZOSAswan/'.$product['name'].".rar";

            if(file_exists($filename)){
                $this->increaseDownload_count();
                header('Content-Type: application/zip');
                header('Content-Disposition: attachment; filename="'.basename($filename).'"');
                header('Content-Length: ' . filesize($filename));
                
                flush();
                readfile($filename);
            }else{
                echo "File";
            }
        }
        public function increaseDownload_count(){

            // $get_order_query = "SELECT * FROM `user_order` INNER JOIN `orders` ON `orders`.id = `user_order`.order_id INNER JOIN `users` ON users.id = user_order.user_id where users.id = {$_SESSION['id']}";
            // $result = mysqli_query($this->link,  $get_order_query);
            // $row = mysqli_fetch_array($result);
            // print_r($row);
//   $this->set_table("user_order");

            $row = $this->getUserOrder();

            $download = $row['download_count'];
            $download++;

            $set_order_query = "UPDATE `orders` INNER JOIN `user_order` ON user_order.order_id = orders.id SET `download_count` = {$download} where user_order.id = {$row['id']}";
            $result = mysqli_query($this->link,  $set_order_query);
        }

        public function logout(){
            $_SESSION["id"] = "";
            $_SESSION["name"] = "";
            session_unset();
            session_destroy();
            header("Location:?view=login");
        }
    }