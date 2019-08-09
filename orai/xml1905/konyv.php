<?php 
   //require_once 'konyv.xml';
   $xml = simplexml_load_file('konyv.xml');
   print '<br>';
   print_r($xml->tetel[0]);
   print '<br>';
   print '<br>';
   print_r($xml);
   print '<br>';
   print '<br>';
   
   $add = $xml->tetel[0]->addChild('proba', 'utólag hozzáadva');
   print_r($xml->tetel[0]);
   print '<br>';
   print '<br>';
   
   $ujElem =$xml->addChild('tetel');
   print_r($xml);
   
   $ujElem->addChild('kategoria', 'alma');
   $ujElem->addChild('cim', 'Ez a cím');
   $ujElem->addChild('iro', 'Nincs');
   $ujElem->addChild('megjelenes', '1968');
   $ujElem->addChild('ar', '125');
   
   print '<br>';
   print '<br>';
   print_r($xml);
   print '<br>';
   print '<br>';
   
   foreach($xml->children() as $value){
       print($value->kategoria . ', ');
       print($value->cim . ', ');
       print($value->iro . ', ');
       print($value->megjelenes . ', ');
       print($value->ar . '<br>');
       
   }
   print '<br>';
   print '<br>';
   
   print '<pre>';
   $encode = json_encode($xml);
   $decode = json_decode($encode, TRUE);
   print_r($decode);
   print'</pre>';
   
   
?>

