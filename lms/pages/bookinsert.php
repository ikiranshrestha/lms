<?php
 if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
    unset($_POST['submit']);
    $obj->Insert("books",$_POST);
    

    echo "<script>alert('data inserted successfully!!')</script>";
 }
?>
<div class="container">
 <div class="row">
  <div class="col-md-5">
  <h2><i class="glyphicon glyphicon-book"></i> Book Insert</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">

<div class="form-group">
<label for="name">Book Name</label>
<input type="text" name="bname" required class="form-control">
</div>
<div class="form-group">
<label for="Author">Author</label>
<input type="text" name="author" required class="form-control">
</div>

<div class="form-group">
<label for=publication>Publication</label>
<input type="text" name="publication" class="form-control" >
</div>
<div class="form-group">
<label for="Author">no_of_books</label>
<input type="number" name="no_of_books" required class="form-control">
</div>

<div class="form-group">
<button type="submit" name="submit" value="submit">submit</button>

</div>
 </div>
</div>
</form>