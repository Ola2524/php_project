<?php

Class MysqlHandler implements DBHandlerInterface
{
  public $table;
  public $link;

  public function __construct()
  {
     return $this->link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    // $this->set_table($table_name);
  }

  public function set_table($table)
  {
    $this->table = $table;
  }

  public function select_record_by_id($id)
  {
    $query = "SELECT * FROM `{$this->table}` WHERE `id` = {$id}";
    return $this->query($query);
  }

  public function select_records($start)
  {
    $query = "SELECT * FROM `{$this->table}` LIMIT " . $start . "," . REC_PER_PAGE;
    return $this->query($query);
  }

  public function getData($columns,$where){
    $query = "SELECT * FROM `{$this->table}` WHERE `$columns` = '{$where}'";
    return $this->query($query);
  }

  public function getUserOrder(){
    $get_order_query = "SELECT user_order.id as id,download_count,user_id,order_id FROM `user_order` INNER JOIN `orders` ON `orders`.id = `user_order`.order_id INNER JOIN `users` ON users.id = user_order.user_id where users.id = {$_SESSION['id']}";
    return $this->query($get_order_query);
  }

  // public function getDataFromTwoTables($columns,$table1,$table2){
  //   $query = "SELECT `{$columns}` FROM `{$table1}` INNER JOIN `{$table2}` ON `{$table1}.id` = `{$table2}`.id";
  //   return $this->query($query);
  //   // $row = mysqli_fetch_array($result);
  //   // return $row;
  // }

  private function query($sql) 
  {
    $result = mysqli_query($this->link, $sql);
    $res = array();
    while($row = mysqli_fetch_array($result))
    {
      $res [] = $row;
    }
    if (count($res) === 1) return $res[0];
    else return $res;
  }
}