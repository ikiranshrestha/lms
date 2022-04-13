<?php
session_start();
require('config/db.php');
$books = $obj->Selectall("books","*","author",array($_GET['author']));

?>

<label for="name">Book Name</label>
<select name="bid" class="form-control">
<option selected disabled >CHOOSE</option>
<?php foreach($books as $books):?>
<option value="<?=$books['bid'];?>" <?php if ($books['no_of_books']==0){ ?> disabled <?php }?>

} ><?=$books['bname'];?></option>
<?php endforeach; ?>
</select>