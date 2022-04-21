<?php
session_start();
require('config/db.php');
$bid = $_GET['bid'];
$copies = $obj->Selectall("book_copies","*","bid",array($_GET['bid']));
$bookName = $obj->Selectall("books","*","bid",array($_GET['bid']));
// print_r($bookName);die();
?>

<label for="name">Available Copies</label>
<select name="bcid_no" class="form-control">
<option selected disabled >Choose</option>
<?php foreach($copies as $copy):?>
<option value="<?=$copy['bcid_no'];?>">
<?= $bookName[0]['bname']; ?> (Copy No: <?=$copy['bcid_no'];?>)
</option>
<?php endforeach; ?>
</select>