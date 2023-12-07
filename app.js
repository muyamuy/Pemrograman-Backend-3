// Import semua method fruitController
const {index, store, update, destroy} = require("./Controller/fruitController")

const main = () => {
  //menampilkan buah
  console.log("Method index - Menampilkan Buah");
  index();
  //menambahkan buah
  console.log("\nMethod store - Menambahkan buah melon");
  store("melon");
  //mengubah buah
  console.log("\nMethod update - Update data 0 menjadi durian");
  update(0, "durian");
  //menghapus buah
  console.log("\nMethod destroy - Menghapus data 0");
  destroy(0);
};

main();
