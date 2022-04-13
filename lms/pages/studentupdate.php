<?php
$Result=$obj->Select('students','*','sid',array($_GET['sid']));
// echo "<pre>";
// print_r($Result);


if(isset($_POST['update']) && $_POST['update'] == 'update'){
unset($_POST['update']);
$obj->update('students',$_POST,'sid',array($_GET['sid']));
header('Location:studentdisplay.php');
}
?>



<div class="container">
 <div class="row">
  <div class="col-md-5">
  <h2><i class="glyphicon glyphicon-user"></i>Student Insert</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">

<div class="form-group">
<label for="name">Fname</label>
<input type="text" name="fname" class="form-control" value="<?=$Result[0]->fname;?>">
</div>
<div class="form-group">
<label for="name">Mname</label>
<input type="text" name="mname" class="form-control" value="<?=$Result[0]->mname;?>">
</div>
<div class="form-group">
<label for="name">Lname</label>
<input type="text" name="lname" class="form-control" value="<?=$Result[0]->lname;?>">
</div>
<div class="form-group">
<label for=email>Email</label>
<input type="email" name="email" class="form-control" value="<?=$Result[0]->email;?>">
</div>
<div class="form-group">
<label for="phone">Contact</label>
<input type="phone" name="contact" class="form-control" value="<?=$Result[0]->contact;?>">
</div>

<div class="form-group">
<label for=address>Address</label>
<input type="address" name="address" class="form-control" value="<?=$Result[0]->address;?>">
</div>


<div class="form-group">
<label for="gender">Gender</label><br>
<input type="radio" name="gender" value="male" <?php if($Result[0]->gender == 'male'){echo "checked";} ?>>
<label for="male">Male</label>
<input type="radio" name="gender" value="female" <?php if($Result[0]->gender == 'female'){echo "checked";} ?>>
<label for="female">Female</label>
<input type="radio" name="gender" value="others" <?php if($Result[0]->gender == 'others'){echo "checked";} ?>>
<label for="others">others</label>
</div>


<div class="form-group">
<button type="submit" name="update" value="update">Update</button>

</div>
 </div>
</div>
</form>