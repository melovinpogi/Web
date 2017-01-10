<?php
$code = $_GET['usercode'];
?>
<?php if($code == ''){ ?>
	 <h1>Invalid URL</h1>
<?php } else{ ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript">
	$( document ).ready(function(){ 
		var $ipaddress = '';

		$.getJSON("http://jsonip.com?callback=?", function (data) {
		   if(data.ip == '122.2.48.48'){
		    $ipaddress = 'http://192.168.1.157:8080';
		  }
		  else{
		    $ipaddress = 'http://122.2.48.48:8080';
		  }
		  //console.log($ipaddress);
		   $(location).attr("href",$ipaddress +'/shopsonline/verifycode/<?php echo $code; ?>');
		});

		// $.getJSON('http://ipinfo.io', function(data){
		//   if(data.ip == '122.2.48.48'){
		//     ipaddress = 'http://192.168.1.157:8080';
		//   }
		//   else{
		//     ipaddress = 'http://122.2.48.48:8080';
		//   }
		
		 
		  
	});
	</script>

<?php } ?>