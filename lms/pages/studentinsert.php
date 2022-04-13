<?php


if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
    unset($_POST['submit']);
    $obj->Insert("students",$_POST);
    echo "<script>alert('data inserted successfully!!')</script>";


    
}

?>
<div class="container">
 <div class="row">
  <div class="col-md-5">
  <h2><i class="glyphicon glyphicon-user"></i> Student Insert</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">

<div class="form-group">
<label for="name">Fname </label>
<input type="text" name="fname" required class="form-control">
</div>
<div class="form-group">
<label for="name">Mname</label>
<input type="text" name="mname" class="form-control">
</div>
<div class="form-group">
<label for="name">Lname</label>
<input type="text" name="lname" required class="form-control">
</div>
<div class="form-group">
<label for=email>Email</label>
<input type="email" name="email" required class="form-control">
</div>
<div class="form-group">
<label for="phone">Contact</label>
<input type="phone" name="contact" class="form-control">
</div>

<div class="form-group">
<label for=address>Address</label>
<input type="address" name="address" required class="form-control" >
</div>


<div class="form-group">
<label for="gender">Gender</label><br>
<input type="radio" name="gender" value="male">
<label for="male">Male</label>
<input type="radio" name="gender" value="female">
<label for="female">Female</label>
<input type="radio" name="gender" value="others">
<label for="others">others</label>
</div>


<div class="form-group">
<button type="submit" name="submit" value="submit">submit</button>

</div>
 </div>
</div>
</form>
