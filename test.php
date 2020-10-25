<?php

require __DIR__ . "/vendor/autoload.php";

use BitWasp\Bitcoin\Address\AddressCreator;
use BitWasp\Bitcoin\Transaction\TransactionFactory;
use BitWasp\Bitcoin\Transaction\Factory\TxBuilder;

$addrCreator = new AddressCreator();
$transaction = new TxBuilder;
$transaction->input('99fe5212e4e52e2d7b35ec0098ae37881a7adaf889a7d46683d3fbb473234c28', 0);
$transaction->payToAddress(29890000, $addrCreator->fromString('19SokJG7fgk8iTjemJ2obfMj14FM16nqzj'));
$transaction->payToAddress(100000, $addrCreator->fromString('1CzcTWMAgBNdU7K8Bjj6s6ezm2dAQfUU9a'));
$transaction->get();

print_r($transaction->get()->getHash());