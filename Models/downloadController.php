<?php

    class DownloadController extends MysqlHandler implements DownloadInterface{

        public function __constructor(){}

        public function download(){
            $this->set_table("products");
            $product = $this->getData("name","XYZ product");

            $filename = __DIR__ . '/../XYZOSAswan/'.$product['name'].".rar";

            if(file_exists($filename)){
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

        }
        public function logout(){
            $_SESSION["id"] = "";
            session_unset();
            session_destroy();
            header("Location:?view=payment");
        }
    }