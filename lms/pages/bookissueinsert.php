<?php
// $Result=$obj->Selectall("book_issue join students on students.sid=book_issue.sid join books on books.bid=book_issue.bid" ,"*");
$student= $obj->Selectall("students","*");
$books = $obj->Selectall("books","*");
$copies = $obj->Selectall("book_copies","*");
 if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
    unset($_POST['submit']);
    
    $_THIS_ISSUE = array("bid" => $_POST['bid'], "bcid_no" => $_POST['bcid_no'], "sid" => $_POST['sid'], "date_of_issue" =>$_POST['date_of_issue'], "max_return_date" => $_POST['max_return_date']);
    
   //  print_r($_POST);
   //  print_r($_THIS_ISSUE);die();
    $book=$obj->Select("books","*","bid",array($_POST['bid']));
    $noOfBook['no_of_books']=($book[0]->no_of_books)-1;
    $isIssued['is_issued'] = 1;
    //echo $noOfBook;
    //print_r($book);
    //die();
    $bid_check = $obj->select("book_issue","*","bid",array($_POST['bid'])," AND sid=".$_POST['sid']);
    if($bid_check){
       header("Location:bookissueinsert.php?error=this book is already issued for this student");
    }
   //  echo $obj->Update("book_copies", $isIssued, "bcid_no", array($_POST['bcid_no']));
   //  die();
    $obj->Insert("book_issue",$_THIS_ISSUE);
    $obj->Update("books",$noOfBook,"bid",array($_POST['bid']));
    $obj->Update("book_copies", $isIssued, "bcid_no", array($_POST['bcid_no']));
    header("Location:bookissueinsert.php");

 }
?>
<div class="container">
 <div class="row">
  <div class="col-md-5">
  <h2><i class="glyphicon glyphicon-book"></i> Issue Book</h2>
 <?php if(isset($_GET['error'])) { ?> <p style="color:red"><?=$_GET['error'];?></p> <?php } ?>
<form action="" method="post" class="form-group" enctype="multipart/form-data">
<div class="form-group">
<label for="name">Selelct Student</label>
<select name="sid" class="form-control">
<option selected disabled >CHOOSE</option>
<?php foreach($student as $student):?>
<option value="<?=$student['sid'];?>"><?=$student['fname'];?> <?=$student['mname'];?> <?=$student['lname'];?> (SID: <?=$student['sid'];?>)</option>
<?php endforeach; ?>
</select>
</div>
<!-- <div class="form-group">
<label for="name">Email</label>
<input type="email" name="email" required class="form-control">
</div> -->

<!-- author section  -->
<label for="">Select Author (Optional)</label>
<select  class="form-control" onchange="checkBook(this.value)">
   <option selected disabled> Choose an author</option>
   <?php  $author = $obj->select("books","*");
   foreach($author as $author) { ?>
<option value="<?=$author->author;?>"><?=$author->author;?></option>

  <?php  }
   ?>
</select>
<!-- end author section  -->
<div class="form-group" id="book">
<label for="name">SELECT BOOK</label>
<select name="bid" class="form-control"  onchange="checkCopy(this.value)">
<option selected disabled >CHOOSE</option>
<?php foreach($books as $books):?>
<option value="<?=$books['bid'];?>" <?php if ($books['no_of_books']==0){ ?> disabled <?php }?>

} ><?=$books['bname'];?></option>
<?php endforeach; ?>
</select>
</div>

<div class="form-group" id="copy">
<label for="name">SELECT AVAILABLE COPY</label>
<select name="bcid_no" class="form-control">
<option selected disabled >CHOOSE</option>
<?php foreach($copies as $copy):?>
<option value="<?=$copy['bcid_no'];?>"><?=$copy['bcid_no'];?></option>
<?php endforeach; ?>
</select>
</div>



<div class="form-group">
<label for="name">Date Of Issue</label>
<input type="date" name="date_of_issue" class="form-control">
</div>
<div class="form-group">
<label for="name">Maximum Return Date</label>
<input type="date" name="max_return_date" class="form-control">
</div>

<div class="form-group">
<button type="submit" name="submit" value="submit">submit</button>

</div>
 </div>
</div>
</form>
<script>
function checkBook(val) {
    // alert(val);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('book').innerHTML = this.responseText;

        }
    }
    xhr.open('GET', 'checkBook.php?author=' + val, true);
    xhr.send();
}
function checkCopy(val) {
    // alert(val);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('copy').innerHTML = this.responseText;

        }
    }
    xhr.open('GET', 'checkCopy.php?bid=' + val, true);
   //  alert(val);
    xhr.send();
}
 </script>