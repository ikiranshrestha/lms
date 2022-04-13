<?php
$Result=$obj->Select('books','*','bid',array($_GET['bid']));


if(isset($_POST['update']) && $_POST['update'] == 'update'){
unset($_POST['update']);
$obj->update('books',$_POST,'bid',array($_GET['bid']));
header('Location:bookdisplay.php');
}
?>



<div class="container">
 <div class="row">
  <div class="col-md-5">
  <h2><i class="glyphicon glyphicon-book"></i>Book Insert</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">

<div class="form-group">
<label for="name">bname</label>
<input type="text" name="bname"  required class="form-control" value="<?=$Result[0]->bname;?>">
</div>

<div class="form-group">
<label for=name>author</label>
<input type="text" name="author" required class="form-control" value="<?=$Result[0]->author;?>">
</div>
<div class="form-group">
<label for="phone">publication</label>
<input type="name" name="publication" required class="form-control" value="<?=$Result[0]->publication;?>">
</div>
<div class="form-group">
<label for="phone">number of books</label>
<input type="name" name="no_of_books" required class="form-control" value="<?=$Result[0]->no_of_books;?>">
</div>



<div class="form-group">
<button type="submit" name="update" value="update">Update</button>

</div>
 </div>
</div>
</form>