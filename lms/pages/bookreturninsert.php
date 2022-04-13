<?php
 //$student= $obj->Selectall("book_issue join students on students.sid=book_issue.sid","*");
 //$book = $obj->Selectall("book_issue join books on books.bid=book_issue.bid","*");
 $student= $obj->Selectall("students","*");
$books = $obj->Selectall("books","*","NOT no_of_books",array(0));
 if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
    unset($_POST['submit']);
    //print_r($_POST);
    $getIid=$obj->Select("book_issue","i_id","bid",array($_POST['bname'])," AND sid=".$_POST['fname']);
    //print_r($getIid[0]->i_id);
      $i_id=$getIid[0]->i_id;
    $book=$obj->Select("books","*","bid",array($_POST['bname']));

    unset($_POST['bname']);
    unset($_POST['fname']);
   $_POST['i_id']=$i_id;
   //print_r($_POST);

    //die();

    $noOfBooks['no_of_books']=($book[0]->no_of_books)+1;
    $obj->Insert("book_return",$_POST);
    $obj->Update("books",$noOfBooks,"bid",array($book[0]->bid));
   
 }
?>
<div class="container">
 <div class="row">
  <div class="col-md-5">
  <h2><i class="glyphicon glyphicon-book"></i> Returned Book</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">
<div class="form-group">
<label for="name">Student first  Name</label>
<select name="fname" class="form-control" id="fname">
<option selected disabled >CHOOSE</option>
<?php foreach($student as $student):?>
<option value="<?=$student['sid'];?>"><?=$student['fname'];?></option>
<?php endforeach; ?>
</select>
</div>

<div class="form-group">
<label for="name">Book Name</label>
<select name="bname" class="form-control" id="bname">
<option selected disabled >CHOOSE</option>
<?php foreach($books as $book):?>
<option value="<?=$book['bid'];?>"><?=$book['bname'];?></option>
<?php endforeach; ?>
</select>
</div>
<div class="form-group">
  <span id="max_return_date"></span>
</div>
<div class="form-group">
<label for="name">Date Of Return</label>
<input type="date" name="date_of_return" class="form-control">

</div>
<div class="form-group">
<label for="name">Fine</label>
<input type="text" name="fine" class="form-control">
</div>

<div class="form-group">
<button type="submit" name="submit" value="submit">submit</button>

</div>
 </div>
</div>
</form>
<script>
  document.getElementById('fname').addEventListener('change',function(e){
    let sid=e.target.value;
    // alert(e.target.value);
    $.ajax({
      type:"GET",
      url:"http://localhost/lms_new/pages/ajax.php?sid="+sid+"&action=getbooks",
      success:function(s){
        let Html=``;
        // console.log(s);
        s.forEach(function(current){
          // console.log(current);
          Html+=`<option value="${current.bid}">${current.bname}</option>`
        });
        console.log(Html);
        document.getElementById('bname').innerHTML=Html;

      }

    });
  });
  document.getElementById('bname').addEventListener('change',function(e){
    let sid=document.getElementById('fname').value;
    let bid=e.target.value;
    // alert(bid);
    // alert(sid);
        $.ajax({
          type:"GET",
          url:"http://localhost/lms_new1/pages/ajax.php?sid="+sid+"&bid="+bid+"&action=getFine",
          success:function(se){
            let Html=``;
            console.log(se[0]);
            document.getElementById('max_return_date').innerHTML="max return date ="+se[0].max_return_date;
            
          
            // console.log(Html);
            // document.getElementById('bname').innerHTML=Html;
          }

        });
  });
  
</script>