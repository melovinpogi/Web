<?php
					$_mid = ""; //<-- your merchant id
		      $_requestid = substr(uniqid(), 0, 13);
		      $_ipaddress = "192.168.10.1";
		      $_noturl = ""; // url where response is posted
		      $_resurl = ""; //url of merchant landing page
			  $_cancelurl = ""; //url of merchant landing page
		      $_fname = "Juan";
		      $_mname = "dela";
		      $_lname = "Cruz";
		      $_addr1 = "Dela Costa St.";
		      $_addr2 = "Salecedo Village";
		      $_city = "makati";
		      $_state = "MM";
		      $_country = "PH";
		      $_zip = "1200";
		      $_sec3d = "try3d";
		      $_email = "dummyemail@gmail.com";
		      $_phone = "3308772";
		      $_mobile = "09171111111";
		      $_clientip = $_SERVER['REMOTE_ADDR'];
		      $_amount = "1.00";
		      $_currency = "PHP";
		      $forSign = $_mid . $_requestid . $_ipaddress . $_noturl . $_resurl .  $_fname . $_lname . $_mname . $_addr1 . $_addr2 . $_city . $_state . $_country . $_zip . $_email . $_phone . $_clientip . $_amount . $_currency . $_sec3d;
					$cert = ""; //<-- your merchant key
		
					echo $_mid . "<hr />";
					echo $cert . "<hr />";
					echo $forSign . "<hr />";
		
		      $_sign = hash("sha512", $forSign.$cert);
		      $xmlstr = "";
		      
			  $strxml = "";
		     
		      $strxml = $strxml . "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
		      $strxml = $strxml . "<Request>";
		      $strxml = $strxml . "<orders>";
		      $strxml = $strxml . "<items>";
		      $strxml = $strxml . "<Items>";
		      $strxml = $strxml . "<itemname>item 1</itemname><quantity>1</quantity><amount>1.00</amount>";
		      $strxml = $strxml . "</Items>";
		      $strxml = $strxml . "</items>";
		      $strxml = $strxml . "</orders>";
		      $strxml = $strxml . "<mid>" . $_mid . "</mid>";
		      $strxml = $strxml . "<request_id>" . $_requestid . "</request_id>";
		      $strxml = $strxml . "<ip_address>" . $_ipaddress . "</ip_address>";
		      $strxml = $strxml . "<notification_url>" . $_noturl . "</notification_url>";
		      $strxml = $strxml . "<response_url>" . $_resurl . "</response_url>";
		      $strxml = $strxml . "<cancel_url>" . $_cancelurl . "</cancel_url>";
		      $strxml = $strxml . "<mtac_url>http://www.paynamics.com/index.html</mtac_url>";
		      $strxml = $strxml . "<descriptor_note>'My Descriptor .18008008008'</descriptor_note>";
		      $strxml = $strxml . "<fname>" . $_fname . "</fname>";
		      $strxml = $strxml . "<lname>" . $_lname . "</lname>";
		      $strxml = $strxml . "<mname>" . $_mname . "</mname>";
		      $strxml = $strxml . "<address1>" . $_addr1 . "</address1>";
		      $strxml = $strxml . "<address2>" . $_addr2 . "</address2>";
		      $strxml = $strxml . "<city>" . $_city . "</city>";
		      $strxml = $strxml . "<state>" . $_state . "</state>";
		      $strxml = $strxml . "<country>" . $_country . "</country>";
		      $strxml = $strxml . "<zip>" . $_zip . "</zip>";
		      $strxml = $strxml . "<secure3d>" . $_sec3d . "</secure3d>";
		      $strxml = $strxml . "<trxtype>sale</trxtype>";
		      $strxml = $strxml . "<email>" . $_email . "</email>";
		      $strxml = $strxml . "<phone>" . $_phone . "</phone>";
		      $strxml = $strxml . "<mobile>" . $_mobile . "</mobile>";
		      $strxml = $strxml . "<client_ip>" . $_clientip . "</client_ip>";
		      $strxml = $strxml . "<amount>" . $_amount . "</amount>";
		      $strxml = $strxml . "<currency>" . $_currency . "</currency>";
		      $strxml = $strxml . "<mlogo_url>http://domain.net/images/paytravel_logo.png</mlogo_url>";
		      $strxml = $strxml . "<pmethod></pmethod>";//CC, GC, PP, DP
		      $strxml = $strxml . "<signature>" . $_sign . "</signature>";
		      $strxml = $strxml . "</Request>";
		      $b64string =  base64_encode($strxml);
					echo "<pre>" . $strxml . "</pre><hr />";
					echo $b64string . "<hr />";
 
			echo '<form name="form1" method="post" action="https://test.ecommpay.net/webpaymentv2/default.aspx">
   								<input type="text" name="paymentrequest" id="paymentrequest" value="'.$b64string.'" style="width:800px; padding: 10px;">
							    <input type="submit">
						</form>';

?>
