<?php

try{
$body = $_POST["paymentresponse"];
//$body = "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48U2VydmljZVJlc3BvbnNlV1BGIHhtbG5zOnhzZD0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiPjxhcHBsaWNhdGlvbj48bWVyY2hhbnRpZD4wMDAwMDAxMzA0MTY3MEI0NUY0RTwvbWVyY2hhbnRpZD48cmVxdWVzdF9pZD41NzU3ZTNiYTJmOThiPC9yZXF1ZXN0X2lkPjxyZXNwb25zZV9pZD5QMTgxMTAzNjYzNjQ0MTM1MDQ0NTwvcmVzcG9uc2VfaWQ+PHRpbWVzdGFtcD4yMDE2LTA2LTA4VDE3OjEzOjEwLjAwMDAwMCswODowMDwvdGltZXN0YW1wPjxyZWJpbGxfaWQgLz48c2lnbmF0dXJlPjIwMDBjM2JlODcxNzQxY2FkMDMyYTk3YzBlYjQ4NjQyNDhjMmEyZWU4NjFjZTY3MDUxNGNhZjFkMDU5ZjZhYzBmNDY3ZGQ4ZjlhMGNiMGU4MTNjYzdiMTAwZTY3M2M4ZGFjZWU4OTk4ODRiZmQwOGUyMGI5MTBmZjhlNmE5YTJjPC9zaWduYXR1cmU+PHB0eXBlPkNDPC9wdHlwZT48L2FwcGxpY2F0aW9uPjxyZXNwb25zZVN0YXR1cz48cmVzcG9uc2VfY29kZT5HUjAwMTwvcmVzcG9uc2VfY29kZT48cmVzcG9uc2VfbWVzc2FnZT5UcmFuc2FjdGlvbiBTdWNjZXNzZnVsPC9yZXNwb25zZV9tZXNzYWdlPjxyZXNwb25zZV9hZHZpc2U+VHJhbnNhY3Rpb24gaXMgYXBwcm92ZWQ8L3Jlc3BvbnNlX2FkdmlzZT48cHJvY2Vzc29yX3Jlc3BvbnNlX2lkPjIwMDAwMDM3MTY8L3Byb2Nlc3Nvcl9yZXNwb25zZV9pZD48cHJvY2Vzc29yX3Jlc3BvbnNlX2F1dGhjb2RlPjQ0NzkwNzwvcHJvY2Vzc29yX3Jlc3BvbnNlX2F1dGhjb2RlPjwvcmVzcG9uc2VTdGF0dXM+PHN1Yl9kYXRhIC8+PHRyYW5zYWN0aW9uSGlzdG9yeT48dHJhbnNhY3Rpb24gLz48L3RyYW5zYWN0aW9uSGlzdG9yeT48L1NlcnZpY2VSZXNwb25zZVdQRj4=";
$body = str_replace(" ", "+", $body);
$Decodebody = base64_decode($body);
echo "DECODED : " . $Decodebody. "</br></br> ";
$ServiceResponseWPF = new SimpleXMLElement($Decodebody);
$application = $ServiceResponseWPF->application;
$responseStatus = $ServiceResponseWPF->responseStatus;

echo "Response: " . $ServiceResponseWPF->application->signature;
$cert = "EF8F0ACB9EBC9BA83507861419F5D54A"; //merchantkey

$forSign = $application->merchantid . $application->request_id . $application->response_id . $responseStatus->response_code . $responseStatus->response_message . $responseStatus->response_advise . $application->timestamp . $application->rebill_id . $cert;

$_sign = hash("sha512", $forSign);

echo "</br>computed:" . $_sign;

if($_sign == $ServiceResponseWPF->application->signature)
{
	echo "</br>VALID SIGNATURE";
}
else{echo "</br>INVALID SIGNATURE";}


$ourFileName = "testFile2.txt";
$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
fclose($ourFileHandle);
$myFile = "testFile.txt";
$fh = fopen($myFile, 'w') or die("can't open file");

$stringData = $Decodebody;
fwrite($fh, $stringData.$body);
fclose($fh);

}
catch(Exception $ex)
{echo $e->getMessage();}
?>