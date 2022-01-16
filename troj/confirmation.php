<?php
header("Content-Type:application/json");
if(!isset($_GET["token"])){
echo "Technical error";
exit();
}
if ($_GET["token"]!='Mk087308'){
echo "invalid authorisation";
exit();
}
if (!$request=file_get_contents('php://input')){
echo "invalid input";
exit();}
require 'config.php';
$json= file_get_contents('php://input');
$array = json_decode($json);

$transid = $array->TransID;
$transactiontype = $array->TransactionType;
$transtime = $array->TransTime;
$transamount = $array->TransAmount;
$businessshortcode = $array->BusinessShortCode;
$billrefno = $array->BillRefNumber;
$invoiceno = $array->InvoiceNumber;
$msisdn = $array->MSISDN;
$orgaccountbalance = $array->OrgAccountBalance;
$firstname = $array->FirstName;
$middlename = $array->MiddleName;
$lastname = $array->LastName;

$sql="INSERT INTO mpesa_payments
( TransactionType,TransID,TransTime,TransAmount,BusinessShortCode,BillRefNumber,InvoiceNumber,MSISDN,
FirstName,MiddleName,LastName,OrgAccountBalance)  VALUES  ( '$transactiontype', '$transid', '$transtime', '$transamount', '$businessshortcode', 
'$billrefno', '$invoiceno', '$msisdn','$firstname', '$middlename', '$lastname', '$orgaccountbalance' )";

$db->query($sql) or die($db->error);
echo 
  '{"ResultCode":0,"ResultDesc":"Confirmation received successfully"}';
exit();
?>