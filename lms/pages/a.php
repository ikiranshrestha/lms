<?php 
 

// if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
    // unset($_POST['submit']);
  require_once('config/db.php');
   
    // $obj->Insert('books',$_POST);
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
    }
    // $obj->Update('books',$_POST,'bid',array(2));
    $obj->Delete('books','bid',array(2));
    $books = $obj->Select('books');
   
// }


?>

<!-- <form method="post">
    <label for="">Bname</label>
    <input type="text" name="bname">
    <label for="">Author</label>
    <input type="text" name="author">
    <label for="">Publication</label>
    <input type="text" name="publication">
    <button type="submit" name="submit" value="submit">Submit</button>
</form> -->
<table class="table table-bordered table-hover">
    <tr>
        <th>SN</th>
        <th>Book Name</th>
        <th>Author</th>
        <th>Publication</th>
        <th>Action</th>

</tr>
<?php foreach($books as $key=>$value) {?>
    <tr>
        <td><?=++$key;?></td>
        <td><?=$value->bname;?></td>
        <td><?=$value->author;?></td>
        <td><?=$value->publication;?></td>
        <td>
            <a href="">Edit</a>
            <a href="a.php?id=<?=$value->bid;?>">Delete</a>

        </td>

</tr>
    <?php } ?>
</table>



<div >
<label name="book">books</label>
<select name=bid class="form-control">
<option selected displable>choose</option>
</select>
</div>



<?php

?>
<table class="table table-bordered table-hover">
    <tr>
        <th>SN</th>
        <th>Book Name</th>
        <th>Student Name</th>
        <th>Date Of Issue</th>
        <th>Max Return Date</th>
        

</tr>
<?php 
$books=$obj->Selectall("book_issue","*"); 
?>
<?php foreach($books as $key=>$value) {?>
    <tr>
        <td><?=++$key;?></td>
        <td>
        <?php $bid = $value['bid']; ?>
        <?php $bookName = $obj->select('books','bname','bid',array($bid));?>
        <?php echo $bookName[0]->bname;?>
        </td>
        <td>
        <?php $sid = $value['sid']; ?>
        <?php $name = $obj->select('students','fname','sid',array($sid));?>
        <?php echo $name[0]->fname;?>
        </td>        
        <td><?=$value['date_of_issue'];?></td>
        <td><?=$value['max_return_date'];?></td>
        
</tr>
    <?php } ?>
</table>



//issuedbookdisplay
<div class="container">
 <div class="row">
  <div class="col-md-5">
  <h2><i class="glyphicon glyphicon-user"></i>Book Issued</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">

<div class="form-group">
<label for="name">bname</label>
<input type="text" name="bname" class="form-control" value="<?=$book[0]->bname;?>">
</div>

<div class="form-group">
<label for=name>fname</label>
<input type="text" name="fname" class="form-control" value="<?=$student[0]->fname;?>">
</div>




<div class="form-group">
<button type="submit" name="update" value="update">Update</button>

</div>
 </div>
</div>
