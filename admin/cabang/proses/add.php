<?php 

	require_once "../../../config/Database.php";

	if (isset($_POST['btn-submit'])) {

		$nama_cabang = mysqli_real_escape_string($conn, $_POST['nama_cabang']);
		$telp = mysqli_real_escape_string($conn, $_POST['telp']);
        $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

		if (!empty($nama_cabang) && !empty($telp) && !empty($alamat)) {

            if ($conn->query("INSERT INTO tb_cabang VALUES('', '$nama_cabang', '$telp', '$alamat')") == 1) {
                alert('./../cabang.php', 'BERHASIL', 'Data Berhasil Tersimpan', 'success');
            } else {
                alert('./../cabang.php', 'GAGAL', 'Ada sesuatu yang salah', 'error');
            }
			
		} else {
			alert('./../cabang.php', 'Pemberitahuan!!', 'Data Inputan tidak boleh kosong!!!', 'info');
		}

	} else {
		header('location: ./../cabang.php');
	}