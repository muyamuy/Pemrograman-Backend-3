<?php

# membuat class Animal
class Animal
{
    # property animals
    public $animals = [];

    # method constructor - mengisi data awal
    # parameter: data hewan (array)
    public function __construct($animal)
    {
        $this->animals = ['=', 'Semut', 'Tikus'];
    }

    # method index - menampilkan data animals
    public function index()
    {
        echo "<ul";
        # gunakan foreach untuk menampilkan data animals (array)
        foreach ($this->animals as $animal) {
            echo "<li>" . $animal . "</li>";
        }
        echo "</ul>";
    }

    # method store - menambahkan hewan baru
    # parameter: hewan baru
    public function store($animal)
    {
        # gunakan method array_push untuk menambahkan data baru
        array_push($this->animals, $animal);
    }

    # method update - mengupdate hewan
    # parameter: index dan hewan baru
    public function update(String $oldAnimal, String $newAnimal)
    {
        $old_animal_index = array_search($oldAnimal, $this->animals);
        $this->animals[$old_animal_index] = $newAnimal;
    }

    # method delete - menghapus hewan
    # parameter: index
    public function destroy($index)
    {
        if (isset($this->animals[$index])) {
            unset($this->animals[$index]);
        }
    }
}

# membuat object
# kirimkan data hewan (array) ke constructor
$animal = new Animal([]);

echo "Index - Menampilkan seluruh hewan <br>";
$animal->index();
echo "<br>";

echo "Store - Menambahkan hewan baru <br>";
$animal->store('Kutu');
$animal->index();
echo "<br>";

echo "Update - Mengupdate hewan <br>";
$animal->update("Kutu", 'Jangkrik');
$animal->index();
echo "<br>";

echo "Destroy - Menghapus hewan <br>";
$animal->destroy(1);
$animal->index();
echo "<br>";
