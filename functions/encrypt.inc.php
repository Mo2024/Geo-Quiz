<?php 
function encryptArray($data, $privateKey)
{
    $serializedData = serialize($data);
    $encryptionKey = hash('sha256', $privateKey);
    $iv = openssl_random_pseudo_bytes(16);
    $encryptedData = openssl_encrypt($serializedData, 'AES-256-CBC', $encryptionKey, OPENSSL_RAW_DATA, $iv);
    $encryptedArray = base64_encode($iv . $encryptedData);

    return $encryptedArray;
}



?>