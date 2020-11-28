<?php 
	include 'koneksi.php';
	$id_blog=$_GET['id_blog'];
	$sql=mysqli_query($konek, "DELETE FROM image_blog WHERE id_blog='$id_blog'");
	if ($sql) {
		echo "
			<script>
				alert('Data Berhasil Di hapus');
				window.location.href='index.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('Data Gagal Dihapus');
			</script>
		";
	}
 ?>