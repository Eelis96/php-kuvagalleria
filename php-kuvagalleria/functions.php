<?php

function saveToXML($kuvanNimi, $ottajaNimi, $kuva){
    $xml = simplexml_load_file('kuvat.xml');
    
    $uusi_kuva = $xml->addChild('kuvantiedot');
    $uusi_kuva->addChild('nimi', $kuvanNimi);
    $uusi_kuva->addChild('ottaja', $ottajaNimi);
    $uusi_kuva->addChild('kuva', $kuva);

    // Muotoilu ja tallennus
    $dom = new DOMDocument("1.0");
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());
    $dom->save('kuvat.xml');

}