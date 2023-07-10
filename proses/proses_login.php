<?php 

	require_once "../config/Database.php";

	if (isset($_POST['btn-submit'])) {

		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		if (!empty($username) && !empty($password)) {
			
			if (trim($username) && trim($password)) {

				$query = $conn->query("SELECT * FROM tb_akun WHERE username = '$username'");

				if ($query->num_rows == 1) {

					$rows = $query->fetch_assoc();

					if (password_verify($password, $rows['password'])) {

						session_start();
						$_SESSION['username'] = $username;
						$_SESSION['level'] = $rows['level'];

						// if (isset($_POST['remember'])) {
						// 	setcookie('no', $rows["id_user"], time() + (60 * 60 * 24), '/');
						// 	setcookie('unik', hash('whirlpool', $rows['username']), time() + (60 * 60 * 24), '/');
						// }

						if ($rows['level'] == 1) {
							// pelanggan
							alert('../admin/indexPelanggan.php', 'BERHASIL', 'Selamat Datang '.$username, 'success');
						} elseif ($rows['level'] == 2) {
							// tukang cukur
							alert('../admin/indexTukang.php', 'BERHASIL', 'Selamat Datang '.$username, 'success');
						} elseif ($rows['level'] == 3) {
							// kasir
							alert('../admin/indexKasir.php', 'BERHASIL', 'Selamat Datang '.$username, 'success');
						} elseif ($rows['level'] == 4) {
							// admin
							alert('../admin/index.php', 'BERHASIL', 'Selamat Datang '.$username, 'success');
						}
						
					} else {
						alert('../login.php', 'GAGAL', 'Password salah!!', 'error');
					}
					
				} else {
					alert('../login.php', 'GAGAL', 'Maaf, Anda tidak terdaftar!', 'error');
				}

			} else {
				alert('../login.php', 'GAGAL', 'Data tidak boleh kosong!!!', 'warning');
			}
			
		} else {
			alert('../login.php', 'GAGAL', 'Data tidak boleh kosong!!!', 'warning');
		}

	} else {
		header('location: ../login.php');
	}