<?php 

    require_once "../../../config/Database.php";

	if (isset($_GET['id'])) {

		if ($conn->query("DELETE FROM tb_cabang WHERE id_cabang = '{$_GET['id']}'") == 1) {
			alert('./../cabang.php', 'BERHASIL', 'Data Berhasil Dihapus', 'success');
		} else {
			alert('./../cabang.php', 'GAGAL', 'Ada Sesuatu Yang Salah!!', 'error');
		}
		
	} else {
		header('location: ./../cabang.php');
	}