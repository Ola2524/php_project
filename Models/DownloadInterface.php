<?php

interface DownloadInterface{
    public function download();
    public function increaseDownload_count();
    public function logout();   
}