<?php
session_start();
include('config/koneksi.php');
// terima data dari form login
$level = $_POST['level'];
$pass = $_POST['pass'];
$username = $_POST['username'];
$password = md5($pass);
if($level=="admin")
{
		$query = mysql_query("SELECT * FROM admin WHERE username='$username'");
		if(mysql_num_rows($query)==1)
		{
			$data = mysql_fetch_array($query);
			if(password_verify($pass, $data['password'])){
				$_SESSION["login"] = 'admin';
				$_SESSION['username'] = $data['username'];
				$_SESSION['nama_adm'] = $data['nama_lengkap'];
				$_SESSION['foto_adm'] = $data['foto'];
				$_SESSION['level'] = $data['level'];
				$_SESSION['password'] = $data['password'];
				header("location:administrator/homepage.php");
			}
			else {
				echo"<script>alert('Password tidak sesuai!')</script>";
				echo "<script>document.location='index.php'</script>";
			}
		}
		else
		{
			echo"<script>alert('Username,Password, atau Level Akses tidak sesuai.....! Mohon Cek Kembali')</script>";
			echo "<script>document.location='index.php'</script>";
		}
}
else if($level=="mahasiswa")
{
		$query = mysql_query("SELECT * FROM mahasiswa WHERE nim='$username'");
		if(mysql_num_rows($query)==1)
		{
			$data = mysql_fetch_array($query);
			if(password_verify($pass, $data['password']) == true) {
				$_SESSION["login"] = 'mahasiswa';
				$_SESSION['username'] = $data['nim'];
				$_SESSION['nim'] = $data['nim'];
				$_SESSION['nama_mhs'] = $data['nama_lengkap'];
				$_SESSION['foto_mhs'] = $data['foto'];
				$_SESSION['level'] = $data['level'];
				$_SESSION['password'] = $data['password'];
				header("location:mahasiswa/homepage.php");
			}
			else {
				echo"<script>alert('Password tidak sesuai!')</script>";
				echo "<script>document.location='index.php'</script>";
			}
		}
		else
		{
			echo"<script>alert('Username,Password, atau Level Akses tidak sesuai.....! Mohon Cek Kembali')</script>";
			echo "<script>document.location='index.php'</script>";
		}
}
else if($level=="dosen")
{
		$query = mysql_query("SELECT * FROM dosen WHERE nidn='$username'");
		if(mysql_num_rows($query)==1)
		{
			$data = mysql_fetch_array($query);
			if(password_verify($pass, $data['password']) == true){
				$_SESSION["login"] = 'dosen';
				$_SESSION['username'] = $data['nidn'];
				$_SESSION['nidn_do'] = $data['nidn'];
				$_SESSION['nama_do'] = $data['nama_lengkap'];
				$_SESSION['foto_do'] = $data['foto'];
				$_SESSION['level'] = $data['level'];
				$_SESSION['password'] = $data['password'];
				header("location:dosen/homepage.php");
			}
			else {
				echo"<script>alert('Password tidak sesuai!')</script>";
				echo "<script>document.location='index.php'</script>";
			}	
		}
		else
		{
			echo"<script>alert('Username, Password, atau Level Akses tidak sesuai.....! Mohon Cek Kembali')</script>";
			echo "<script>document.location='index.php'</script>";
		}
}
else if($level=="kaprodi")
{
		$query = mysql_query("SELECT * FROM kaprodi WHERE nidn='$username'");
		if(mysql_num_rows($query)==1)
		{
			$data = mysql_fetch_array($query);
			if(password_verify($pass, $data['password']) == true){
				$_SESSION["login"] = 'kaprodi';
				$_SESSION['username'] = $data['nidn'];
				$_SESSION['nidn'] = $data['nidn'];
				$_SESSION['nama_kpd'] = $data['nama_lengkap'];
				$_SESSION['foto_kpd'] = $data['foto'];
				$_SESSION['program_studi'] = $data['program_studi'];
				$_SESSION['level'] = $data['level'];
				header("location:kaprodi/homepage.php");
			}
			else {
				echo"<script>alert('Password tidak sesuai!')</script>";
				echo "<script>document.location='index.php'</script>";
			}
			
		}
		else
		{
			echo"<script>alert('Username, Password, atau Level Akses tidak sesuai.....! Mohon Cek Kembali')</script>";
			echo "<script>document.location='index.php'</script>";
		}
}
else if($level=="dekan")
{
		$query = mysql_query("SELECT * FROM dekan WHERE nidn='$username'");
		if(mysql_num_rows($query)==1)
		{
			$data = mysql_fetch_array($query);
			if(password_verify($pass, $data['password']) == true){
				$_SESSION["login"] = 'dekan';
				$_SESSION['username'] = $data['nidn'];
				$_SESSION['nidn'] = $data['nidn'];
				$_SESSION['nama_dkn'] = $data['nama_lengkap'];
				$_SESSION['foto_dkn'] = $data['foto'];
				$_SESSION['level'] = $data['level'];
				header("location:dekan/homepage.php");
			}
			else {
				echo"<script>alert('Password tidak sesuai!')</script>";
				echo "<script>document.location='index.php'</script>";
			}
		}
		else
		{
			echo"<script>alert('Username, Password, atau Level Akses tidak sesuai.....! Mohon Cek Kembali')</script>";
			echo "<script>document.location='index.php'</script>";
		}
} else {
	echo"<script>alert('Gagal Login')</script>";
	echo "<script>document.location='index.php'</script>";
}
