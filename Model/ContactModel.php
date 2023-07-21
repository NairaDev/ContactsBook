<?php
class ContactModel{
	public $conn;

	public function __construct(){
		$this->conn = mysqli_connect('localhost','root','','contactbook');

		if(!$this->conn){
			die("Ошибка подключения: " . mysqli_connect_error($this->conn));
		}
	}
    public function checkContact($contactPhone){
        $query = "SELECT * FROM `contacts` WHERE `ContactNumber` = '$contactPhone'";

		$res = mysqli_query($this->conn, $query);
        $result = mysqli_num_rows($res);
		return $result;
	}

	public function addContact($contactName,$contactPhone){
		$query = "INSERT INTO `contacts` VALUES (NULL,'$contactName','$contactPhone')";

		$res = mysqli_query($this->conn, $query);

		return $res;
	}


	public function showAllContacts(){
		$query = "Select * from `contacts`";
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);
        return $result;
	}

	public function update_cat($catId,$catName){
		$query = "Update categories SET vCatName = '$catName' where iCatId = $catId";
		$res = mysqli_query($this->conn, $query);
		return $res;
	}

	
    public function deleteContact($contactId) {
        $query = "DELETE FROM `contacts` WHERE contactId = '$contactId'";
        $res = mysqli_query($this->conn, $query);
        return $res;
    }
}

$contacModel = new ContactModel();