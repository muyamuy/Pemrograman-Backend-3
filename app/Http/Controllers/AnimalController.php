<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // Property Animals
    public $animals = ["Kucing", "Ayam", "Ikan"];

    // Method untuk menampilkan semua hewan
    public function index(){
        echo "Menampilkan Data Animals <br>";

        // Loop Property Animals
        foreach($this->animals as $animal){
            echo "- $animal <br>";
        };
    }

    // Method untuk menambahkan data hewan
    public function store(Request $request)
    {
        echo "Menambahkan Hewan Baru <br>";

        // Menambahkan data ke property animals
        array_push($this->animals, $request->animal);

        // Memanggil method index
        $this->index();
    }

    // Method untuk mengupdate data hewan
    public function update($id, Request $request)
    {
        echo "Mengupdate Data Hewan id $id. <br>";

        // Update data di property animals
        $this->animals[$id] = $request->animal;

        // Memanggil method index
        $this->index();
    }

    // Method untuk menghapus data hewan
    public function destroy($id)
    {
        echo "Menghapus Data Hewan id $id <br>";

        unset($this->animals[$id]);

        // Memanggil method index
        $this->index();
    }
}