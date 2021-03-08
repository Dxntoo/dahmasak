<?php
class Rating{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "dahmasak";    
	private $itemUsersTable = 'user';
	private $itemTable = 'recipe';	
    private $itemRatingTable = 'feedback';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}	
	public function userLogin($username, $password){
		$sqlQuery = "
			SELECT * 
			FROM ".$this->itemUsersTable." 
			WHERE User_Name='".$username."' AND Password='".$password."'";
        return  $this->getData($sqlQuery);
	}		
	public function getItemList(){
		$sqlQuery = "
			SELECT * FROM ".$this->itemTable;
		return  $this->getData($sqlQuery);	
	}
	public function getItem($itemId){
		$sqlQuery = "
			SELECT * FROM ".$this->itemTable."
			WHERE Recipe_ID='".$itemId."'";
		return  $this->getData($sqlQuery);	
	}
	public function getItemRating($itemId){
		$sqlQuery = "
			SELECT r.ratingId, r.Recipe_ID, r.User_ID, u.User_Name, u.Profile_Picture, r.ratingNumber, r.title, r.comments, r.created, r.modified
			FROM ".$this->itemRatingTable." as r
			LEFT JOIN ".$this->itemUsersTable." as u ON (r.User_ID = u.User_ID)
			WHERE r.Recipe_ID = '".$itemId."'";
		return  $this->getData($sqlQuery);		
	}
	public function getRatingAverage($itemId){
		$itemRating = $this->getItemRating($itemId);
		$ratingNumber = 0;
		$count = 0;		
		foreach($itemRating as $itemRatingDetails){
			$ratingNumber+= $itemRatingDetails['ratingNumber'];
			$count += 1;			
		}
		$average = 0;
		if($ratingNumber && $count) {
			$average = $ratingNumber/$count;
		}
		return $average;	
	}
	public function saveRating($POST, $userID){		
		$insertRating = "INSERT INTO ".$this->itemRatingTable." (Recipe_ID, User_ID, ratingNumber, title, comments, created, modified) VALUES ('".$POST['itemId']."', '".$userID."', '".$POST['rating']."', '".$POST['title']."', '".$POST["comment"]."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
		mysqli_query($this->dbConnect, $insertRating);	
	}
}
?>