<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#authors").change(function(){
				var aid = $("#authors").val();
				$.ajax({
					url: 'data.php',
					method: 'post',
					data: 'aid=' + aid
				}).done(function(books){
					console.log(books);
					books = JSON.parse(books);
					$('#books').empty();
					books.forEach(function(book){
						$('#books').append('<option>' + book.name + '</option>')
					})
				})
			})
		})
	</script>
</head>
<body>
	<div class="container">
		<h1 class="text-center">Dependent Drop Down list In PHP/MySQL using jQuery & Ajax </h1>
		<hr>
		<div class="row">
		    <div class="col-md-6 col-md-offset-3">
				<form role="form" method="post" action="">
		        	<div class="row">
		                <div class="form-group">
		                    <label for="authors">Authors</label>
		                    <select class="form-control" id="authors" name="authors">
		                    	<option selected="" disabled="">Select Author</option>
		                    	<?php 
		                    		require 'data.php';
		                    		$authors = loadAuthors();
		                    		foreach ($authors as $author) {
		                    			echo "<option id='".$author['id']."' value='".$author['id']."'>".$author['name']."</option>";
		                    		}
		                    	 ?>
		                    </select>
		                </div>
		            </div>
		            <div class="row">
		                <div class="form-group">
		                    <label for="books">Books</label>
		                    <select class="form-control" id="books" name="books">
		                    	
		                    </select>
		                </div>
		            </div>
		        </form>
		    </div>
		</div>
	</div>
</body>
</html>