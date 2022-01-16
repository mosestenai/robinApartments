<?php
//AUTHENTICATING CREDENTIALS
if(isset($_POST['pay'])){
  $phoneNumber = $_POST['phone'];
  $gg= substr($phoneNumber, 0, 4);
  if($gg != '2547'){ echo '<h2 align="middle">Number must begin with 2547</h2>';}
  elseif (strlen($phoneNumber) < 12) {echo '<h2 align="middle">Invalid phone number</h2>';}
  else {
  $amountt = $_POST['amount'];
  $amount = (int)$amountt;

$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
  
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
//$credentials = base64_encode('UrsGc9lFwXGkkhALW6v2mOdJ3pJpAWBD:yLvuma0CU4YOPD0w');
$credentials = base64_encode('IgDURTDRNs8iGMc5VcsmSbsKAqVPzRUE:AWJxgEXAA6XNA7Lg');
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$curl_response = curl_exec($curl);

$responce = json_decode($curl_response)->access_token;
 //dd($responce["access_token"]);
 //dd($responce->access_token);
 $accessToken = $responce; // access token here


//mpesa user credentials
$mpesaOnlineShortcode = "174379";
$BusinessShortCode = $mpesaOnlineShortcode;
$partyA = $phoneNumber;
$partyB = $BusinessShortCode;
$phoneNumber = $partyA;
$mpesaOnlinePasskey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
date_default_timezone_set('Africa/Nairobi');
$timestamp =  date('YmdHis');
$dataToEncode = $BusinessShortCode.$mpesaOnlinePasskey.$timestamp;
//dd($dataToEncode);
$password = base64_encode($dataToEncode);
//dd($password);

//payment request to safaricom

$url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$accessToken)); //setting custom header


$curl_post_data = array(
  //Fill in the request parameters with valid values
  'BusinessShortCode' => $BusinessShortCode,
  'Password' => $password,
  'Timestamp' => $timestamp,
  'TransactionType' => 'CustomerPayBillOnline',
  'Amount' => $amount,
  'PartyA' => $partyA,
  'PartyB' => $partyB,
  'PhoneNumber' => $phoneNumber,
  'CallBackURL' => 'https://robin.herokuapp.com/troj/confirmation.php?token=Mk087308',
  'AccountReference' => 'ROBIN APARTMENTS',
  'TransactionDesc' => 'PAYING BILLS FOR ROBIN APARTMENTS'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
// print_r($curl_response);
//print_r($curl_response);
//return($curl_response);
echo '
<p align="middle"><img src="images/tick.png" width="330" height="400"><br>
  Check your phone to complete the payment</p>';


}
  }
?>