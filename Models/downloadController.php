<?php

    class DownloadController implements DownloadInterface{
        public function download(){

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