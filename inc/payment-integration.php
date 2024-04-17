<?php


require_once  get_template_directory() . "/inc/lib/maxiPago.php";

$maxiPago = new maxiPago;

$keys = $maxiPago->setCredentials("28303", "ph0ccqvq2dtv5fh108dezo0y");
$maxiPago->setEnvironment("TEST");
$maxiPago->setLogger(dirname(__FILE__).'/logs','INFO');
$maxiPago->setDebug(true);

$data = array(
    "processorID" => "1",
    "referenceNum" => "ORDER2937283",
    "chargeTotal" => "10.00",
    "number" => "4111111111111111",
    "expMonth" => "07",
    "expYear" => "2026",
    "cvvNumber" => "123"
);

$maxiPago->creditCardSale($data);
ppr($maxiPago->getResult());

/*<?xml version="1.0" encoding="UTF-8"?>
<transaction-request>
 <version>3.1.1.15</version>
 <verification>
<merchantId>store-id</merchantId>
<merchantKey>store-key</merchantKey>
 </verification>
 <order>
<auth>
 <processorID>1</processorID>
 <fraudCheck>N</fraudCheck>
 <referenceNum>123456789</referenceNum>
 <billing>
 <name>Fulano de Tal</name>
 <address>Av. Republica Brasil, 230</address>
 <address2>14 Andar</address2>
 <city>Sao Paulo</city>
 <state>SP</state>
 <postalcode>01031-170</postalcode>
 <country>BR</country>
 <phone>1140099400</phone>
 <email>fulanodetal@email.com</email>
 <companyName>maxiPago</companyName>
 </billing>
 <shipping>
 <name>Fulano de Tal</name>
 <address>Av. Republica Brasil, 230</address>
 <address2>14 Andar</address2>
 <city>Sao Paulo</city>
 <state>SP</state>
 <postalcode>01031-170</postalcode>
 <country>BR</country>
 <phone>1140099400</phone>
 <email>fulanodetal@email.com</email>
 </shipping>
 <transactionDetail>
 <payType>
 <creditCard>
 <number>6062828888666688</number>
 <expMonth>07</expMonth>
8
Este XML de exemplo de retorno em caso de sucesso de uma Autorização:
Este XML de exemplo de retorno em caso de erro de uma Autorização:
 <expYear>2017</expYear>
 <cvvNumber>915</cvvNumber>
</creditCard>
 </payType>
 </transactionDetail>
 <payment>
 <chargeTotal>1.00</chargeTotal>
 </payment>
</auth>
 </order>
</transaction-request>*/