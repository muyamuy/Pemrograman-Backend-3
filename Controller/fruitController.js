const fruits = require("../data/fruits");

//menampilkan buah
const index = () => {
   for (const fruit of fruits) {
       console.log(fruit);
   }
}
//menambahkan buah
const store = (name) => {
   fruits.push(name);
   index();
};
//mengubah buah
const update = (position, name) => {
   fruits[position] = name
   index()
}
//menghapus buah
const destroy = (position) => {
   fruits.splice(position,1)
   index()
}

module.exports = {index, store, update, destroy};