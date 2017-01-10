<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Portal</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>


<div id="container">
	<h1>Welcome to Portal</h1>

	<div id="body">
		<!--<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>-->
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>
insert into shop_transaction( request_id, response_id, timestamp, signature, response_code, response_message, response_advice, processor_response_id, user_id, ptype, transaction_number, transaction_date, currency, client_ip, card_holder) select '5784d139125c0', '19000860842313224397', 'timestamp', 'c4206bf77de1f4eb8f1140dfc4a00fa0643335238e28528217945135c2fb94066e313530759e29934a1e11caa74c0285d8ec3072e63a3a480fd12773f1a4db46', 'GR002', 'Transaction%20Successful%20with%203DS', 'This%20means%20that%20the%20transaction%20was%20successful%20and%20is%20protected%20with%203D%20Secure.', '1100000017', 25, '', dbo.fn_add_leading_zeroes(dbo.fn_generate_document_number('shop'),10), getdate(), 'PHP', '192.168.1.220', '' from shop_transaction where request_id not in (select request_id from shop_transaction)