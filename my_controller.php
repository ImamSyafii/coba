<?php 
include('database.php');
$db = new database();
$db->connection();	
		if(isset($_GET['aksi'])){
			if ($_GET['aksi']=="TAMBAH"){
				$cek = $db->insertdata($_POST['ID'],$_POST['NAMA'],$_POST['ALAMAT'],$_POST['TELP']);
				if ($cek==true){
					header("Location: index.php?sts=berhasilsimpan");
				}else{
					header("Location: index.php?sts=gagalsimpan");
				}
			}elseif ($_GET['aksi']=="HAPUS"){
				$cek = $db->hapusdata($_GET['id']);
				if ($cek==true){
					header("Location: index.php?sts=berhasilhapus");
				}else{
					header("Location: index.php?sts=gagalhapus");
				}
			}elseif ($_GET['aksi']=="UPDATE"){
				$cek = $db->updatedata($_POST['IDREAD'],$_POST['ID'],$_POST['NAMA'],$_POST['ALAMAT'],$_POST['TELP']);
				if ($cek==true){
					header("Location: index.php?sts=berhasilupdate");
				}else{
					header("Location: index.php?sts=gagalupdate");
				}
			}			
		}else{
			echo "aaaa";
		};
		

?>