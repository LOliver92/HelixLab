<?php
    $array = array(
        "users" => array(
            array(
                "id" => 1,
                "name" => 'Peti',
                "lakhely" => 'Pest'
                ),
            array(
                "id" => 2,
                "name" => 'Kitti',
                "lakhely" => 'Pécs'
                ),
            array(
                "id" => 3,
                "name" => 'Attila',
                "lakhely" => 'Miskolc'
                ),
            array(
                "id" => 4,
                "name" => 'Zsolt',
                "lakhely" => 'Tatabánya'
                ),
        )
    );
    
    function array_to_xml($array, $xml_user_info) {
        foreach($array as $key => $value){
            if(is_array($value)){
                if(!is_numeric($key)){
                    $subnode = $xml_user_info->addChild("$key");
                    array_to_xml($value, $subnode);
                }
                else {
                    $subnode = $xml_user_info->addChild("item$key");
                    array_to_xml($value, $subnode);
                }
            }
            else {
                $xml_user_info->addChild("$key", htmlspecialchars("$value"));
            }
        }  
}

$xml_user_info = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"UTF-8\"?>". "<user_info></user_info>");
array_to_xml($array, $xml_user_info);
$xml_file = $xml_user_info->asXML('users.xml');

if($xml_file){
    print 'A fájl sikeresen létre lett hozva';
}
else{
    print 'Sajnos nem sikerült a fájlt létrehozni';
}
?>
