<?php
interface DBHandlerInterface {
    public function set_table($table);
    public function select_record_by_id($id);
    public function select_records($start);
    public function getData($columns,$where);
}