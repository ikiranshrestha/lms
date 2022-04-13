<?php
$Result=$obj->Select('book_issue','*','i_id',array($_GET['i_id']));
// print_r($Result);
$student=$obj->Select("students","*","sid",array($Result[0]->sid));
$book=$obj->Select("books","*","bid",array($Result[0]->bid));
$books=$obj->Select("books","*");
// print_r($books);

if(isset($_POST['update']) && $_POST['update'] == 'update'){
unset($_POST['update']);
$obj->update('book_issue',$_POST,'i_id',array($_GET['i_id']));
header('Location:issued_bookdisplay.php');
}
?>



<div class="container">
 <div class="row">
  <div class="col-md-5">
  <h2><i class="glyphicon glyphicon-user"></i>Book Issue of <?=$student[0]->fname?></h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">

<div class="form-group">
<label for="name">bname</label>
<select name="bid" id="" class="form-control">
  <?php
  // print_r($books);
  foreach($books as $b):
  ?>
  <option value="<?=$b->bid?>" <?=$b->bid==$book[0]->bid?"Selected":"";?>><?=$b->bname?></option>
  <?php endforeach; ?>
</select>
<!-- <input type="text" class="form-control" value="<?=$book[0]->bname;?>" readonly> -->
</div>

<div class="form-group">
<label for="name">date_of_issue</label>
<input type="date" name="date_of_issue" class="form-control" value="<?=$Result[0]->date_of_issue;?>">
</div>

<div class="form-group">
<label for=name>max_return_date</label>
<input type="text" name="max_return_date" class="form-control" value="<?=$Result[0]->max_return_date;?>">
</div>




<div class="form-group">
<button type="submit" name="update" value="update">Update</button>

</div>
 </div>
</div>
</form>
</form>