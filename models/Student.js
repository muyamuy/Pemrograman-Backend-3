// import database
const db = require("../config/database");

// membuat class Model Student
class Student {
  /**
   * Membuat method static all.
   */
  static all() {
    // return Promise sebagai solusi Asynchronous
    return new Promise((resolve, reject) => {
      const sql = "SELECT * FROM students";
      /**
       * Melakukan query menggunakan method query.
       * Menerima 2 params: query dan callback
       */
      db.query(sql, (err, results) => {
        if (err) {
          reject(err);
        } else {
          resolve(results);
        }
      });
    });
  }

  /**
   * TODO 1: Buat fungsi untuk insert data.
   * Method menerima parameter data yang akan diinsert.
   * Method mengembalikan data student yang baru diinsert.
   */

  static async create(data, callback) {
    // Promise 1: melakukan insert data ke database 
    const id = await new Promise((resolve, reject) => { 
      const sql = "INSERT INTO students SET ?"; 
      db.query(sql, data, (err, results) => { 
        resolve(results. insertId);
      });
    });

    // Refactor promise 2: get data by id 
    const student = this.find(id);
    return student;
  }

  static find(id) {
    return new Promise((resolve, reject) => {
      const sql = "SELECT * FROM students WHERE id = ?";
        db.query(sql, id, (err, results) => {
          // destructing array
          const [student] = results;
          resolve(student);
      });
    });
  }

  // mengupdate data student
  static async update(id, data) {
    await new Promise((resolve, reject) => {
      const sql = "UPDATE students SET ? WHERE ID = ?";
      db.query(sql, [data, id], (err, results) => {
        resolve(results);
      });
    });

    // mencari data yang baru diupdate
    const student = await this.find(id);
    return student;
  }

  // menghapus data dari database 
  static delete(id) {
    return new Promise((resolve, reject) => {
      const sql = "DELETE FROM students WHERE id = ?";
      db.query(sql, id, (err, results) => { 
        resolve(results);
      });
    });
  }

  // mencari data berdasarkan id
  static find(id) {
    return new Promise((resolve, reject) => {
      const sql = "SELECT * FROM students WHERE id = ?"; db.query(sql, id, (err, results) => {
      // destructing array
        const [student] = results; 
        resolve(student);
      });
    });
  }

}
// export class Student
module.exports = Student;