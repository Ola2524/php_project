<?php

interface Download{
    public function download();
    public function increaseDownload_count();
    public function logout();   
}