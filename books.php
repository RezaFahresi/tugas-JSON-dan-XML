<?php
header('Content-Type: application/xml');

$xml = new SimpleXMLElement('<books/>');

// Menambahkan buku-buku ke XML
$book1 = $xml->addChild('book');
$book1->addChild('id', 1);
$book1->addChild('judul', 'Pemrograman PHP');
$book1->addChild('penulis', 'John Doe');
$book1->addChild('tahun', 2020);

$book2 = $xml->addChild('book');
$book2->addChild('id', 2);
$book2->addChild('judul', 'Belajar JavaScript');
$book2->addChild('penulis', 'Jane Doe');
$book2->addChild('tahun', 2019);

$book3 = $xml->addChild(qualifiedName:'book');
$book3->addChild('id', 2);
$book3->addChild('judul', 'Belajar Python');
$book3->addChild('penulis', 'Alice Smith');
$book3->addChild('tahun', 2021);

echo $xml->asXML();

