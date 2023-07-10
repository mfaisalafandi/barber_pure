<?php 

    require_once "../../../config/Database.php";

	if (isset($_POST['btn-submit'])) {

        $id_cabang = $_POST['id_cabang'];
		$nama_cabang = mysqli_real_escape_string($conn, $_POST['nama_cabang']);
		$telp = mysqli_real_escape_string($conn, $_POST['telp']);
        $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

		if (!empty($id_cabang) && !empty($nama_cabang) && !empty($telp) && !empty($alamat)) {

			if ($conn->query("SELECT id_cabang FROM tb_cabang WHERE id_cabang = '$id_cabang'")->num_rows > 0) {

				if ($conn->query("UPDATE tb_cabang SET nama_cabang = '$nama_cabang', telp = '$telp', alamat = '$alamat' WHERE id_cabang = '$id_cabang'") == 1) {
					alert('./../cabang.php', 'BERHASIL', 'Data Berhasil Diupdate', 'success');
				} else {
					alert('./../cabang.php', 'GAGAL', 'Ada sesuatu yang salah!', 'error');
				}
			} else {
				alert('./../cabang.php', 'Pemberitahuan!!', 'Cabang tidak ditemukan!!!', 'warning');
			}
			
		} else {
			alert('./../cabang.php', 'Pemberitahuan!!!', 'Data Inputan tidak boleh kosong!!!', 'info');
		}

	} else {
		header('location: ./../cabang.php');
	}