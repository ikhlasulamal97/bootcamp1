<?php 
	include 'koneksi.php';

	$id_blog=$_GET['id_blog'];
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
  		width: 100px;
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
		  </div>
		</nav>
		<br><br>
		<?php 
			$queri=mysqli_query($konek, "SELECT * FROM image_blog LEFT JOIN user ON image_blog.user_id = user.id_user WHERE image_blog.id_blog = $id_blog  ");

			$data=mysqli_fetch_array($queri);
		 ?>
		<ul class="list-group text-center">
		  <li class="list-group-item active"><?php echo $data['title'] ?></li>
		  <li class="list-group-item"> <img src="<?php echo $data['file_image'] ?>" class="card-img-top gambar" ></li>
		  <li class="list-group-item"><?php echo $data['content'] ?></li>
		  <li class="list-group-item">By <?php echo $data['name'] ?></li>
		  <li class="list-group-item"><a href="#" class="btn btn-warning btn-sm mr-2" id="ubahblog">Ubah</a> <a href="./hapus.php?id_blog=<?php echo $id_blog ?>" onclick="return confirm('apakah Anda Yakin Akan Menghapus ini ?')" class="btn btn-danger btn-sm">Hapus</a></li>
		</ul>
		 <br><br>
		<a href="./index.php" class="btn btn-info btn-sm">Kembali</a>

	<div class="modal fade ubah_blog" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
				    <input type="text" class="form-control" id="title" name="title" value="<?php echo $data['title'] ?>">
				  </div>
				   <div class="form-group">
				    <label for="content">Content</label>
				    <textarea class="form-control" id="content" rows="3" name="content" ><?php echo $data['content'] ?></textarea>
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
							while ($data1=mysqli_fetch_array($queri)) {
							if ($data["id_user"]==$data1['id_user']) {	
					     ?>
					      <option value="<?php echo $data1['id_user']; ?>" <?php if ($data["id_user"]==$data1['id_user']) { echo "selected";} ?>><?php echo $data['name']; ?></option>
					    <?php 

					    	}else{
?>

  			<option value="<?php echo $data1['id_user']; ?>"><?php echo $data['name']; ?></option>

<?php 

					    	}

							}
					     ?>


				    </select>
				  </div>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-success btn-sm " name="image_blog">Ubah</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

   	<script >

   		$('#ubahblog').click(function(){
			$('.ubah_blog').modal('show');
			$('.modal-title').text('Ubah Image Blog');
   		});


   	</script>

  </body>
</html>