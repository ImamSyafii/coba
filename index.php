<?php
include('database.php');
$db = new database();
$db->connection();
$tampildata = $db->getalldata();
if (isset($_GET['aksi'])){
	if ($_GET['aksi']=="EDIT"){
		$data = $db->editdata($_GET['id']);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
<!-- sadsa -->
<form method="POST" enctype="multipart/form-data">
	<tr>
		<td><label>ID </label></td>
		<td>:</td>
		<td><input type="text" name="ID" value="<?php echo isset($data)?$data['ID']:"";?>">
			<input type="hidden" name="IDREAD" value="<?php echo isset($data)?$data['ID']:""; ?>">
		</td>
	</tr>
	<tr>
		<td><label>NAMA </label></td>
		<td>:</td>
		<td><input type="text" name="NAMA" value="<?php echo isset($data)?$data['Nama']:"";?>"></td>
	</tr>
	<tr>
		<td><label>ALAMAT </label></td>
		<td>:</td>
		<td><input type="text" name="ALAMAT" value="<?php echo isset($data)?$data['Alamat']:"";?>"></td>
	</tr>
	<tr>
		<td><label>TELP </label></td>
		<td>:</td>
		<td><input type="text" name="TELP" value="<?php echo isset($data)?$data['Telp']:"";?>"></td>
	</tr>
	<tr>
		<td><label>Foto </label></td>
		<td>:</td>
		<td><img src="">
			<input type="file" name="file">
		</td>
	</tr>
	<tr align="center">
		<td colspan="3"><input type="submit" name="submittambah" formaction="my_controller.php?aksi=TAMBAH" value="SIMPAN">
		<input type="submit" name="submitupdate" formaction="my_controller.php?aksi=UPDATE" value="UPDATE">
		<a href="index.php"><input type="button" name="btncancel" value="CANCEL"></a>
		</td>
	<tr>
</form>
</table>
<br>
<table border="1">
	<thead>
		<tr><th>ID</th><th>NAMA</th><th>ALAMAT</th><th>TELP</th><th>FOTO</th><th>AKSI</th></tr>
	</thead>
	<tbody>
		<?php 
			if (count($tampildata)>0){
				foreach ($tampildata as $lisdata) {
				echo "<tr>";
				echo "<td>".$lisdata['ID']."</td>";
				echo "<td>".$lisdata['Nama']."</td>";
				echo "<td>".$lisdata['Alamat']."</td>";
				echo "<td>".$lisdata['Telp']."</td>";
				echo "<td>".$lisdata['Foto']."</td>";
				echo "<td>"."<a onclick=\"return confirm('Are you sure?')\"; href='my_controller.php?aksi=HAPUS&id=".$lisdata['ID']."'>HAPUS</a> || "
						   ."<a href='index.php?aksi=EDIT&id=".$lisdata['ID']."'>EDIT </a>" 
						   ."</td>";
				echo "<tr>";
				}	
			}
			
		?>
	</tbody>
</table>
</body>
</html>