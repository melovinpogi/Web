<?php
/**
* 
*/
class Messenger{

	private $dbconnection;
	private $dbserver = 'localhost';
	private $dbusername = 'root';
	private $dbpassword = '';
	private $dbname ='messenger';

	
	
	public function __construct(){
		 $this->dbconnection = new mysqli($this->dbserver, $this->dbusername, $this->dbpassword, $this->dbname);

	    if ($this->dbconnection->connect_error) {
	      die('Connection error.');
	    }
	   
	}

	public function AllUsers($userfrom){

		$users = array();
		$query = "SELECT * FROM users where user_id <> $userfrom"; //. $_SESSION['user_id'];

		// Execute the query
	    $result = $this->dbconnection->query($query);
	    // Fetch all the rows at once.
	    while ($row = $result->fetch_assoc()) {
	      $users[] = $row;
	    }
	    
	    return $users;

	}

	public function UpdateStatus($user,$activity){
		//Update user status
		$update = "UPDATE users set loggedin = '$activity' where user_id = $user";
		$resultupdate = $this->dbconnection->query($update);
		if(!$resultupdate){
			return $activity;
		}
	}

	/*
		Checking of users
		returns int
	*/
	public function Login($username,$password){
		@session_start();
		$query = "SELECT * FROM users where userid = '$username' and password = '$password'";
	    $result = $this->dbconnection->query($query);	
	     if ($result->num_rows > 0) {
		    while ($row = $result->fetch_assoc()) {
			    $_SESSION['user_id'] = $row['user_id'];
			    $_SESSION['username']= $row['username'];

			    //Update user status
			    $update = "UPDATE users set loggedin = 'y' where user_id = " . $row['user_id'];
			    $resultupdate = $this->dbconnection->query($update);

			    if(!$resultupdate){
			    	//echo "Updating user status error";
			    	return 0;
			    }
		    }
		    return $_SESSION['user_id'];
		}
		else{
			return 0;
		}
	}

	/*
		Validating Login
	*/
	public function LoginErr(){
		echo "<script>alert('Username/Password incorrect.')</script>";
	}

	/*  
		Check if user already logged in
		returns boolean
	*/
	public function CheckLogin(){
		if( isset( $_SESSION['username'] ) ){
			return true;
		}
		else{
			return false;
		}
	}

	public function Logout($userid){
		//Update user status
	    $update = "UPDATE users set loggedin = 'n',last_login = now()  WHERE user_id = $userid";
	    $resultupdate = $this->dbconnection->query($update);
	     if (!$resultupdate) {
		    echo "Updating user status error";
		}
	}

	/*
		Checking of conversation
		returns int
	*/
	public function CheckConversation($userfrom){
		//Check if conversation is already exists
		$query = "SELECT conversation_id 
				FROM conversation 
				WHERE user_from = $userfrom or user_to = $userfrom
				ORDER BY conversation_id DESC LIMIT 1";

		$result = $this->dbconnection->query($query);

		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {
				$conversationID = $row['conversation_id'];
			}
		}
		return $conversationID > 0 ? $conversationID : 0;
	}


	/* 
		Conversation 
		returns string

	*/

	public function Conversation($userfrom,$userto){
		//Check if conversation is already exists
		$return = '';
		$pos = '';
		$query = "SELECT conversation_id 
				FROM conversation 
				WHERE (user_from=$userfrom and user_to=$userto) 
						or (user_from=$userto and user_to=$userfrom)";

		$result = $this->dbconnection->query($query);

		//If conversation already exists then get top 20 of previous conversation
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {
				$conversationID = $row['conversation_id'];
				$return = $this->ResultConversation($conversationID,$userfrom);
			}
		}
		elseif($userto > 0){
			$return = "Start a new conversation.";
		}
		// Else Display message
		else{
			$return = "Select user to Start Conversation.";
		}
		return $return;
	}


	/*
		Display of messages/conversation
		returns string
	*/

	public function ResultConversation($conversationID,$from){
		$return = '';
		$previousConvo = "SELECT r.cr_id,
									r.timestamp,
									r.reply,
									u.user_id,
									u.username,
									u.userid
							FROM	users u, 
									conversation_reply r 
							WHERE	r.user_id = u.user_id 
									and r.conversation_id = $conversationID
							ORDER BY r.cr_id ";

		//Display top 20 msgs 
		$resultConvo = $this->dbconnection->query($previousConvo);
		if($resultConvo->num_rows > 0){
			while ($rowConvo = $resultConvo->fetch_assoc()) {
				//$pos = $_SESSION['user_id'] <> $rowConvo['user_id'] ? 'left' : 'right';
				$date = date_create($rowConvo['timestamp']);
				$sent = date_format($date, 'F d, Y H:i:s a ');

				if($from == $rowConvo['user_id']){
					$return .= "<h6 class='bg-info' style='padding: 10px;border-radius: 5px;'><b><small> " . $rowConvo['timestamp'] . "</small> ". $rowConvo['username'] . ':</b> ' . $rowConvo['reply'] . "</h6>";
				}else{
					$return .= "<h6 class='bg-default' style='padding: 10px;border-radius: 5px;'><b><small> " . $rowConvo['timestamp'] . "</small> ". $rowConvo['username'] . ':</b> ' . $rowConvo['reply'] . "</h6>";
				}
				/*$return .= '<div class="answer '.$pos.'" data-toggle="tooltip" data-placement="top" title="' . $sent  . '">
				                <div class="avatar">
				                  <img src="http://bootdey.com/img/Content/avatar/avatar' . $rowConvo['user_id'] . '.png" alt="User name">
				                </div>
				                <div class="text">
				                  '. htmlentities($rowConvo['reply']) .'
				                </div>
				            </div>';*/					
			}
		}
		return $return;
	}

	/*
		Sending of Messages

	*/

	public function SendMessage($userfrom,$userto,$msg){	
		 $ip = $_SERVER['REMOTE_ADDR'];

		//If conversation if new then insert into Conversation Table
		if( $this->CheckConversation($userfrom) == 0 ){
			$query = "INSERT INTO conversation(user_from,user_to,ip,timestamp) SELECT $userfrom,$userto,'$ip',now() ";
			$result = $this->dbconnection->query($query);
		}

		$conversationID = $this->CheckConversation($userfrom);
		$query = "INSERT INTO conversation_reply(user_id,reply,ip,timestamp,conversation_id) SELECT $userfrom,'$msg','$ip',now(),$conversationID";
		$resultReply = $this->dbconnection->query($query);

		if(!$resultReply){
			echo "<script>alert('Error encounter while saving your conversation.');</script>";
		}
	}

}