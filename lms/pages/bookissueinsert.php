<?php
// $Result=$obj->Selectall("book_issue join students on students.sid=book_issue.sid join books on books.bid=book_issue.bid" ,"*");
$student= $obj->Selectall("students","*");
$books = $obj->Selectall("books","*");
 if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
    unset($_POST['submit']);
    $book=$obj->Select("books","*","bid",array($_POST['bid']));
    $noOfBook['no_of_books']=($book[0]->no_of_books)-1;
    //echo $noOfBook;
    //print_r($book);
    //die();
    $bid_check = $obj->select("book_issue","*","bid",array($_POST['bid'])," AND sid=".$_POST['sid']);
    if($bid_check){
       header("Location:bookissueinsert.php?error=this book is already issued for this student");
    }
    $obj->Insert("book_issue",$_POST);
    $obj->Update("books",$noOfBook,"bid",array($_POST['bid']));
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
<label for="name">Student first  Name</label>
<select name="sid" class="form-control">
<option selected disabled >CHOOSE</option>
<?php foreach($student as $student):?>
<option value="<?=$student['sid'];?>"><?=$student['fname'];?></option>
<?php endforeach; ?>
</select>
</div>
<div class="form-group">
<label for="name">Email</label>
<input type="email" name="email" required class="form-control">
</div>

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
<label for="name">Book Name</label>
<select name="bid" class="form-control">
<option selected disabled >CHOOSE</option>
<?php foreach($books as $books):?>
<option value="<?=$books['bid'];?>" <?php if ($books['no_of_books']==0){ ?> disabled <?php }?>

} ><?=$books['bname'];?></option>
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
 </script>