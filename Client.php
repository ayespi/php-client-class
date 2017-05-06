<?php
include('../php/dbconnect.php');
class Client{
  public $db_connection;
  public $id;
  public $email;
  public $firstname;
  public $lastname;
  public $phone;
  public $address;
  public $city;
  public $state;
  public $zip;

  public function __construct($conn, $email, $first, $last, $phone, $address, $city, $state, $zip){
    $this->db_connection  = $conn;
    $this->email          = $email;
    $this->firstname      = $first;
    $this->lastname       = $last;
    $this->phone          = $phone;
    $this->address        = $address;
    $this->city           = $city;
    $this->state          = $state;
    $this->zip            = $zip;

    $this->create_table();
    $this->create_client();
    echo('New CLIENT added successfully...');
  }
  public function perform_query($query){
    $result = mysqli_query($this->db_connection, $query);
    if(!$result){
      exit('Attempt to perform query failed!!!');
    }
  }
  public function create_table(){
    include('../sql/createClientTable.php');
    $this->perform_query($sql_create_client_table);
  }
  public function create_client(){
    include('../sql/addClient.php');
    $this->perform_query($sql_add_client);
  }
}
 ?>
