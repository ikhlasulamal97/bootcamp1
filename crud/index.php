<?php 
	include 'koneksi.php';
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  	<style>
  	.gambar{
  		width: 200px;
  		margin: 0 auto;
  	}
  	</style>

  	<div class="container">
	    <nav class="navbar navbar-expand-lg navbar-light px-0">
		  <a class="navbar-brand" href="#">Dumb Gram</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav ml-auto ">
		    	<li class="nav-item">
		        	<a class="nav-link badge badge-info text-white" href="#" id="blog">Add Image Blog</a>
		     	</li>
		      	<li class="nav-item ml-3">
		        	<a class="nav-link badge badge-info text-white" href="#" id="user">Add User</a>
		      	</li>
		    </ul>
		  </div>
		</nav>
		<br><br>
		<div class="row">
			<?php 
				$queri=mysqli_query($konek, "SELECT * FROM image_blog LEFT JOIN user ON image_blog.user_id = user.id_user ");
				while ($data=mysqli_fetch_array($queri)) {
			 ?>
			<div class="col-lg-3">
				<div class="card ">
				  <img src="<?php echo $data['file_image'] ?>" class="card-img-top gambar" >
				  <div class="card-body text-center">
				    <h5 class="card-title text-left"><?php echo $data['title'] ?></h5>
				    <p class="card-text text-left text-info"><?php echo $data['name'] ?></p>
				    <a href="detail.php?id_blog=<?php echo  $data['id_blog'] ?>" class="btn btn-info btn-sm" style="width: 100%" >View Detail</a>
				  </div>
				</div>
			</div>
			<?php 
				}
			 ?>
		</div>
	</div>

	<!-- Modal User-->
	<div class="modal fade modal_user" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	    	<form action="" method="POST">
		      <div class="modal-header">
		        <h5 class="modal-title" id="staticBackdropLabel">Tambah User</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		       
				  <div class="form-group">
				    <label for="nama">Nama</label>
				    <input type="text" class="form-control" id="nama" name="nama">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				  </div>
				
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-success btn-sm " name="user">Simpan</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>

	<!-- Modal Image Blog-->
	<div class="modal fade blog" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	    	<form action="" method="POST" enctype="multipart/form-data">
		      <div class="modal-header">
		        <h5 class="modal-title" id="staticBackdropLabel"></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		       
				  <div class="form-group">
				    <label for="title">Title</label>
				    <input type="text" class="form-control" id="title" name="title">
				  </div>
				   <div class="form-group">
				    <label for="content">Content</label>
				    <textarea class="form-control" id="content" rows="3" name="content"></textarea>
				  </div>
				<div class="form-group">
				    <label for="gambar">Gambar</label>
				    <input type="file" class="form-control-file" id="gambar" name="foto">
			  	</div>
				   <div class="form-group">
				    <label for="user">User</label>
				    <select class="form-control" id="user" name="user_id">
				    	<option value="" selected disabled>Pilih User</option>
					    <?php 
					    	$queri=mysqli_query($konek, 'SELECT * FROM USER');
							while ($data=mysqli_fetch_array($queri)) {
					     ?>
					      <option value="<?php echo $data['id_user']; ?>"><?php echo $data['name']; ?></option>
					    <?php 
							}
					     ?>
				    </select>
				  </div>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-success btn-sm " name="image_blog">Simpan</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>

	<?php 
		// Tambah User
		if (isset($_POST['user'])) {
			$nama=$_POST['nama'];
			$email=$_POST['email'];
			if ($nama=="" || $email=="" ) {
				echo "<script>
					window.location.href='index.php';
					alert('Data Tidak Boleh Kosong');
				</script>";
			}else{
				$queri=mysqli_query($konek, "INSERT INTO user VALUES ('','$nama','$email') ");
				if ($queri) {
					echo "<script>
						window.location.href='index.php';
						alert('Data User Berhasil Ditambahkan');
					</script>";
				}else{
					echo "<script>
						window.location.href='index.php';
						alert('Data User Gagal Ditambahkan');
					</script>";
				}
			}
			

		}

		// Tambah Image Blog
		if (isset($_POST['image_blog'])) {
			$title=$_POST['title'];
			$content=$_POST['content'];
			$user_id=$_POST['user_id'];

			$gambar=$_FILES['foto']['name'];
			$simpan_sementara=$_FILES['foto']['tmp_name'];
			$pecah=explode(".", $gambar);
			$extensi=strtolower(end($pecah));

			// Membuat Nama Baru Untuk Gambar
			$angka_rand=rand(1,100);
			$nama_baru=$pecah[0];
			$nama_baru .="_";
			$nama_baru .= $angka_rand;
			$nama_baru .=".";
			$nama_baru .= $extensi;

			if ($title=="" || $content=="" || $gambar==""|| $user_id=="" ) {
				echo "<script>
					window.location.href='index.php';
					alert('Data Tidak Boleh Kosong');
				</script>";
			}else{
				$queri=mysqli_query($konek, "INSERT INTO image_blog VALUES ('','$title','$content','$nama_baru','$user_id') ");
				if ($queri) {
					move_uploaded_file($simpan_sementara, "$nama_baru");
					echo "<script>
						window.location.href='index.php';
						alert('Data image_blog Berhasil Ditambahkan');
					</script>";
				}else{
					echo "<script>
						window.location.href='index.php';
						alert('Data image_blog Gagal Ditambahkan');
					</script>";
				}
			}
			

		}


		






	 ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

   	<script >
   		$('#user').click(function(){
			$('.modal_user').modal('show');
   		});


   		$('#blog').click(function(){
			$('.blog').modal('show');
			$('.modal-title').text('Tambah Image Blog');
   		});


   	</script>

  </body>
</html>