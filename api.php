<?php
header('Content-Type: application/json');

// Data dummy untuk daftar buku
$books = [
    [
        "id" => 1,
        "judul" => "Pemrograman PHP",
        "penulis" => "John Doe",
        "tahun" => 2020
    ],
    [
        "id" => 2,
        "judul" => "Belajar JavaScript",
        "penulis" => "Jane Doe",
        "tahun" => 2019
    ],
    [
        "id"=> 3,
        "judul"=> "Belajar Python",
        "penulis"=> "Alice Smith",
        "tahun"=> 2021
    ]
];

// Mendapatkan metode HTTP yang digunakan (GET atau POST)
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Mengembalikan semua data buku
        echo json_encode($books);
        break;

    case 'POST':
        // Menambahkan buku baru
        $input = json_decode(file_get_contents('php://input'), true);
        $input['id'] = end($books)['id'] + 1; // Menambahkan ID baru
        $books[] = $input; // Menambahkan data buku baru
        echo json_encode($input);
        break;

    default:
        http_response_code(405);
        echo json_encode(["message" => "Metode HTTP tidak didukung"]);
        break;
}

