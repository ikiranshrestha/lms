<?php
if(isset($_GET['DELETE']) && $_GET['DELETE']=='DELETE')
{

    $obj->Delete('books','bid',array($_GET['bid']));
}
//echo date('Y-m-d');
?>
<table class="table table-bordered table-hover">
    <tr>
        <th>SN</th>
        <th>Book Name</th>
        <th>Author</th>
        <th>Publication</th>
        <th>Number Of Books</th>
        <th>Delete</th>
        <th>UPDATE</th>
        
</tr>
<?php $books=$obj->select("books","*");     ?>
<?php foreach($books as $key=>$value) {?>
    <tr>
        <td><?=++$key;?></td>
        <td><?=$value->bname;?></td>
        <td><?=$value->author;?></td>
        <td><?=$value->publication;?></td>
        <td><?=$value->no_of_books;?></td>
        
       <td>
        <a href="bookdisplay.php?DELETE=DELETE&bid=<?=$value->bid;?>">DELETE</a>
        </td>
        <td>
        <a href="bookupdate.php?bid=<?=$value->bid;?>">UPDATE</a>
        </td>      

</tr>
    <?php } ?>
</table>
