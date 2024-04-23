<?php
class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'aplikasi';
    private $connection;

    // Constructor untuk menginisialisasi koneksi
    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Koneksi database gagal: " . $this->connection->connect_error);
        }
    }

    // Method untuk menjalankan query dan mengembalikan data dalam bentuk array
    public function ambil_data($query) {
        $result = $this->connection->query($query);
        $data = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Method untuk menjalankan query dan mengembalikan data boolean
    public function modifikasi($query) {
        $result = $this->connection->query($query);

        return $result;
    }

    // Method untuk mendapatkan koneksi database
    public function koneksi() {
        return $this->connection;
    }

    // Destructor untuk menutup koneksi database saat objek dihancurkan
    public function __destruct() {
        $this->connection->close();
    }
}

// Contoh penggunaan
$database = new Database();

// Contoh pengambilan data
$query1 = "SELECT * FROM kasir";
$data_array = $database->ambil_data($query1);
print_r($data_array);

// Contoh modifikasi query
$query2 = "INSERT INTO kasir (id_kasir) VALUES ($data_array)";
$status = $database->modifikasi($query2);
if ($status === TRUE) {
    echo "Data berhasil dimasukkan.";
} else {
    echo "Gagal memasukkan data: " . $database->koneksi()->error;
}
?>
