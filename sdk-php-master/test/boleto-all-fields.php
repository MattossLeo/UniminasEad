<?php
require_once "../lib/maxipago/Autoload.php"; // Remove if using a globa autoloader
require_once "../lib/maxiPago.php";

try {

    $maxiPago = new maxiPago;

    // Before calling any other methods you must first set your credentials
    // Define Logger parameters if preferred
    // Do *NOT* use 'DEBUG' for Production environment as Credit Card details WILL BE LOGGED
    // Severities INFO and up are safe to use in Production as Credi Card info are NOT logged
    $maxiPago->setLogger(dirname(__FILE__).'/logs','INFO');
    
    // Set your credentials before any other transaction methods
    $maxiPago->setCredentials("12345", "123456789");
    
    $maxiPago->setDebug(true);
    $maxiPago->setEnvironment("TEST");
    $data = array(
        	"processorID" => "12", // REQUIRED - Use 12 for testing. For production values contact our team //
        	"referenceNum" => "TestBoleto123", // REQUIRED - Merchant's internal order number //
    		"ipAddress" => "123.123.123.123", // Optional //
    		"customerIdExt" => "111.111.111-11", //CPF,
    		"billingName" => "Fulano de Tal", // REQUIRED - Customer name //
    		"billingAddress" => "Av. Republica do Chile, 230", // Optional - Customer address //
    		"billingAddress2" => "16 Andar", // Optional - Customer address //
    		"billingCity" => "Rio de Janeiro", // Optional - Customer city //
    		"billingState" => "RJ", // Optional - Customer state with 2 characters //
    		"billingPostalCode" => "20031-170",  // Optional - Customer zip code //
    		"billingCountry" => "BR", // Optional - Customer country under ISO 3166-2 //
    		"billingPhone" => "2140099400", // Optional - Customer phone number //
    		"billingEmail" => "fulanodetal@email.com", // Optional - Customer email address //
    		"billingCompanyName" => "Nome_Empresa",
    		"shippingName" => "Ciclano de Tal", // Optional - Shipping address //
    		"shippingAddress" => "Av. Prestes Maia, 737", // Optional - Shipping address //
    		"shippingAddress2" => "20 Andar", // Optional - Shipping address //
    		"shippingCity" => "Sao Paulo", // Optional - Shipping city //
    		"shippingState" => "SP", // Optional - Shipping state with 2 characters //
    		"shippingPostalCode" => "01031-001", // Optional - Shipping zip code //
    		"shippingCountry" => "BR", // Optional - Shipping country under ISO 3166-2 //
    		"shippingPhone" => "1121737900", // Optional - Shipping phone number
    		"shippingEmail" => "ciclanodetal@email.com", // Optional - Shipping email address //
    		"expirationDate" => "2020-12-25", // REQUIRED - Boleto expiration date, YYYY-MM-DD format //
    		"number" => time(), // REQUIRED AND UNIQUE - Boleto ID number, max of 8 numbers //
    		"chargeTotal" => "10.00", // REQUIRED - US format: 10.00 or 1234.56 //
        	"instructions" => "Sr. Caixa, nao receber apos vencimento.;Nao receber pagamento com cheque.", // Optional - Instructions to be printed with the boleto. Use ";" to break lines //   		
        
    );
    $maxiPago->boletoSale($data);

    if ($maxiPago->isErrorResponse()) {
        echo "There was an error creating the boleto<br>Error message: ".$maxiPago->getMessage();
    }

    elseif ($maxiPago->isTransactionResponse()) {
        if ($maxiPago->getResponseCode() == "0") { 
        	echo "Boleto has been created<br>Visit ".$maxiPago->getBoletoURL()." to view boleto."; 
        }
        else { 
        	echo "There was an error creating the boleto<br>Error message: ".$maxiPago->getMessage(); 
        }    
    }

}

catch (Exception $e) { 
	echo $e->getMessage()." in ".$e->getFile()." on line ".$e->getLine(); 
}
?>
