<?php
$Result=$obj->Select('book_return','*','r_id',array($_GET['r_id']));
// print_r($Result);
$issue=$obj->Select('book_issue','*','i_id',array($Result[0]->i_id));
$student=$obj->Select("students","*","sid",array($issue[0]->sid));

$book=$obj->Select("books","*","bid",array($issue[0]->bid));

if(isset($_POST['update']) && $_POST['update'] == 'update'){
unset($_POST['update']);
$obj->update('book_return',$_POST,'r_id',array($_GET['r_id']));
header('Location:returned_bookdisplay.php');
}
?>



<div class="container">
 <div class="row">
  <div class="col-md-5">
  <h2><i class="glyphicon glyphicon-user"></i>Book Return of <?=$student[0]->fname?> </h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">

<div class="form-group">
<label for="name">bname</label>
<select id="" class="form-control" readonly>
  <?php
  $books=$obj->Select("books","*");
 // print_r($book);
  foreach($books as $b): ?>
  <option value="<?=$b->bid?>" <?=$b->bid==$book[0]->bid?"Selected":"";?>><?=$b->bname;?></option>
  <?php endforeach; ?>
</select>
<!-- <input type="text" name="bname" class="form-control" value="<?=$book[0]->bname;?>"> -->
</div>

<div class="form-group">
<label for="name">date_of_return</label>
<input type="date" name="date_of_return" class="form-control" value="<?=$Result[0]->date_of_return;?>">
</div>

<div class="form-group">
<label for=name>fine</label>
<input type="text" name="fine" class="form-control" value="<?=$Result[0]->fine;?>">
</div>




<div class="form-group">
<button type="submit" name="update" value="update">Update</button>

</div>
 </div>
</div>
</form>
