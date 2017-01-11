<?php
/**
* 
*/
class SendMessage extends Messenger{
	function __construct($userto,$msg){
		$userfrom = $_SESSION['user_id'];
		$ip = $_SERVER['REMOTE_ADDR'];

		//If conversation if new then insert into Conversation Table
		if( $this->CheckConversation($userfrom,$userto) = 0 ){
			$query = "INSERT INTO conversation(user_from,user_to,ip,timestamp) SELECT $userfrom,$userto,'$ip',now()";
			$result = $this->dbconnection->query($query);

			if($result){
				//After insert new conversation, get the ID of conversation
				$conversationID = $this->CheckConversation($userfrom,$userto);

				$query = "INSERT INTO conversation_reply(user_id,reply,ip,timestamp,conversation_id) SELECT $userfrom,'$msg','$ip',now(),$conversationID";
				$resultReply = $this->dbconnection->query($query);
				if(!$resultReply){
					echo "Error encounter while saving your conversation.";
				}
			}			
		}
	}
}