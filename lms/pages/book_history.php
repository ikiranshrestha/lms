<?php
 if(isset($_GET['DELETE']) && $_GET['DELETE']=='DELETE')
 {
 
     $obj->Delete('book_issue','i_id',array($_GET['i_id']));
 }
?>
<h1><i class="fa fa-book"></i> Book Issued History Of Students</h1>
<input type="text" id="search" class="form-control" placeholder="Search the name of students here...">
<table  class="table table-bordered table-hover">
    <tr>
        <th>SN</th>
        <th>Book Name</th>
        <th>Student Name</th>
        <th>Date Of Issue</th>
        <th>Max Return Date</th>
        
        <th>Delete</th>
        <th>UPDATE</th>
    
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
        
        
        <td>
        <a href="issued_bookdisplay.php?DELETE=DELETE&i_id=<?=$value['i_id'];?>">DELETE</a>
        </td>
        <td>
        <a href="issued_bookupdate.php?i_id=<?=$value['i_id'];?>">UPDATE</a>
        </td> 
</tr>
    <?php } ?>
</table>

<div style="height:70vh"></div>
<script>
$("#search").keyup(function () {
    var value = this.value.toLowerCase().trim();

    $("table tr").each(function (index) {
        if (!index) return;
        $(this).find("td").each(function () {
            var id = $(this).text().toLowerCase().trim();
            var not_found = (id.indexOf(value) == -1);
            $(this).closest('tr').toggle(!not_found);
            return not_found;
        });
    });
});
</script>