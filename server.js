const express = require('express');
const { Builder } = require('xml2js'); // Import xml2js untuk konversi JSON ke XML
const app = express();
const port = 3000;

// Middleware untuk parsing JSON
app.use(express.json());

// Data contoh untuk daftar buku
const books = [
    { id: 1, judul: "Pemrograman PHP", penulis: "John Doe", tahun: 2020 },
    { id: 2, judul: "Belajar JavaScript", penulis: "Jane Doe", tahun: 2019 },
    { id: 3, judul: "Belajar Python", penulis: "Alice Smith", tahun: 2021 }
];

// Endpoint GET untuk mengambil semua buku dalam format JSON
app.get('/books', (req, res) => {
    res.json(books);
});

// Endpoint POST untuk menambahkan buku baru
app.post('/books', (req, res) => {
    const newBook = req.body;
    newBook.id = books.length + 1; // Generate ID baru berdasarkan panjang array
    books.push(newBook); // Tambahkan buku baru ke dalam array
    res.status(201).json(newBook); // Kembalikan buku baru dengan status 201 (Created)
});

// Endpoint GET untuk mengambil semua buku dalam format XML
app.get('/books/xml', (req, res) => {
    const builder = new Builder({ rootName: 'books', xmldec: { version: '1.0', encoding: 'UTF-8' } });
    const xml = builder.buildObject({ book: books }); // Konversi objek JSON ke XML
    res.set('Content-Type', 'application/xml'); // Set header Content-Type ke XML
    res.send(xml); // Kirim data XML sebagai respons
});

// Jalankan server
app.listen(port, () => {
    console.log(`Server berjalan di http://localhost:${port}`);
});
