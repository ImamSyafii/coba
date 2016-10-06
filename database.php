<?php
	class database
	{
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="";
		private $dbname="latihan_persiapan";

		public function connection(){
			mysql_connect($this->dbhost,$this->dbuser,$this->dbpass);
			mysql_select_db($this->dbname) or die ("Database not found");
			// if(mysql_connect()){
			// 	echo "koneksi berhasil";
			// }else{
			// 	echo "koneksi gagal";
			// }
		}
		public function getalldata(){
			$sql = "select * from orang";
			$query = mysql_query($sql);
			$data=null;
			while($row = mysql_fetch_array($query)){
				$data[]=$row;
			}
			return $data;
		}

		public function insertdata($id,$nama=null,$alamat=null,$telp=null,$foto=null){
			$sql = "insert into orang values('$id','$nama','$alamat','$telp','$foto')";
			$hasil = mysql_query($sql);
			if ($hasil){
				return true;
			}else{
				return false;
			}
		}

		public function hapusdata($id){
			$sql = "delete from orang where id='".$id."'";
			$hasil = mysql_query($sql);
			if ($hasil){
				return true;
			}else{
				return false;
			}
		}

		public function editdata($id){
			$sql = "select * from orang where id='".$id."'";
			$query = mysql_query($sql);
			while($row = mysql_fetch_array($query)){
				$data[]=$row;
			}
			return $data[0];	
		}

		public function updatedata($id2,$id,$nama=null,$alamat=null,$telp=null,$foto=null){
			if ($foto==null){
				$sql = "update orang set id='".$id."', nama='".$nama."', alamat='".$alamat."', telp='".$telp."' where id='".$id2."'";
				$hasil = mysql_query($sql);
				if ($hasil){
					return true;
				}else{
					return false;
				}		
			}
		}

	}
?>