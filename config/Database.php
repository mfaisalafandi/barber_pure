<?php 

	// class Database
	// {
	// 	public $conn;

	// 	public function __construct() 
	// 	{
	// 		$this->conn = mysqli_connect("localhost", "root", "", "pwb_barber");
	// 	}

	// 	public function query($sql)
	// 	{
	// 		return mysqli_query($this->conn, $sql);
	// 	}

	// 	public function fetch($query)
	// 	{
	// 		return mysqli_fetch_assoc($query);
	// 	}

	// 	public function numRows($query)
	// 	{
	// 		return mysqli_num_rows($query);
	// 	}

	// 	public function getValue($sql)
	// 	{
	// 		return $this->fetch($this->query($sql));
	// 	}

	// 	public function getTotal($sql)
	// 	{
	// 		return $this->numRows($this->query($sql));
	// 	}
	// }

	// $database = new Database;

	// $conn = $database->conn;

	// date_default_timezone_set('Asia/Makassar');


    $host = "localhost"; 
    $user = "root";
    $pass = "";
    $nama_db = "pwb_barber"; //nama database
    $conn = new mysqli($host, $user, $pass, $nama_db);
  
    if(!$conn){ //jika tidak terkoneksi maka akan tampil error
      die ("Koneksi database gagal: ".mysql_connect_error());
    }

	function alert($location, $title, $message, $icon) {
		echo "
			<script>
				alert('$message');
				location.href = '$location';
			</script>
		";
	}
  
?>