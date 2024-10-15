<?php
header('Content-Type: application/xml');

// Mengambil data dari API JSON
$json_data = file_get_contents('http://localhost/api.php');
$data = json_decode($json_data, true);

// Membuat elemen XML utama
$xml = new SimpleXMLElement('<books/>');

// Mengonversi data JSON menjadi XML
foreach ($data as $item) {
    $book = $xml->addChild('book');
    $book->addChild('id', $item['id']);
    $book->addChild('judul', $item['judul']);
    $book->addChild('penulis', $item['penulis']);
    $book->addChild('tahun', $item['tahun']);
}

// Menampilkan output XML
echo $xml->asXML();

