<?php

namespace App\Support;

use BitWasp\Bitcoin\Address\AddressCreator;
use BitWasp\Bitcoin\Bitcoin;
use BitWasp\Bitcoin\Key\Factory\HierarchicalKeyFactory;
use BitWasp\Bitcoin\Mnemonic\Bip39\Bip39SeedGenerator;
use BitWasp\Bitcoin\Serializer\Key\HierarchicalKey\Base58ExtendedKeySerializer;
use BitWasp\Bitcoin\Serializer\Key\HierarchicalKey\ExtendedKeySerializer; 
use App\Support\FcoinNetwork;

class FcoinGenerator {

	private $address = '';
	private $addresskey = '';
	private $rootkey = '';
	
	public  function __construct($getdatastring='') {
	
		$adapter = Bitcoin::getEcAdapter();
		$addrCreator = new AddressCreator();
		
		$btc = new FcoinNetwork;
		
		$serializer = new Base58ExtendedKeySerializer(new ExtendedKeySerializer($adapter));
		
		$bip39 = new Bip39SeedGenerator();
		$seed = $bip39->getSeed($getdatastring);
		
		$hdFactory = new HierarchicalKeyFactory($adapter);
		$p2shP2wshP2pkhKey = $hdFactory->fromEntropy($seed);
		$serialized = $serializer->serialize($btc, $p2shP2wshP2pkhKey);
		
		$parsedKey = $serializer->parse($btc, $serialized);
		$accountKey = $parsedKey->derivePath("0");
		$serAccKey = $serializer->serialize($btc, $accountKey);
		
		$addrKey = $accountKey->derivePath("0");
		$serAddrKey = $serializer->serialize($btc, $addrKey);
		
		$this->address = $addrKey->getAddress($addrCreator)->getAddress($btc);
		$this->addresskey = $addrKey->getPrivateKey()->toWif($btc);
		$this->rootkey = $serialized;
	}
	
	public function getaddress(){
		return $this->address;
	}
	
	public function getprivkey(){
		return $this->addresskey;
	}
	
	public function getrootkey(){
		return $this->rootkey;
	}

}