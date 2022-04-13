<?php
if(isset($_GET['DELETE']) && $_GET['DELETE']=='DELETE')
{

    $obj->Delete('book_return','r_id',array($_GET['r_id']));

}
?>
<table class="table table-bordered table-hover">
    <tr>
        <th>SN</th>
        <th>Book Name</th>
        <th>Student Name</th>
        <th>Date Of Return</th>
        <th>Fine</th>
        <th>Delete</th>
        <th>UPDATE</th>
        

</tr>
<?php 
$books=$obj->Selectall("book_return","*"); 
// echo "<pre>";
// print_r($books);die;
 foreach($books as $key=>$value) { ?>
    <tr>
        <td><?=++$key;?></td>
        <td>
        <?php $bid = $value['i_id']; 
         $getsid = $obj->select('book_issue','*','i_id',array($bid));
        
         $bname= $obj->select('books','*','bid',array($getsid[0]->bid));
         echo $bname[0]->bname;
        ?>
       
        </td>
        <td>
        <?php 
        // $sid = $value['sid']; 
       
         $getsid = $obj->select('book_issue','*','i_id',array($bid));
        
        $sid = $getsid[0]->sid;
         $name = $obj->select('students','*','sid',array($sid));
       echo $name[0]->fname." ". $name[0]->lname;?>
        </td>        
        <td><?=$value['date_of_return'];?></td>
        <td><?=$value['fine'];?></td>
        <td>
        <a href="returned_bookdisplay.php?DELETE=DELETE&r_id=<?=$value['r_id'];?>">DELETE</a>
        </td>
        <td>
        <a href="returned_bookupdate.php?r_id=<?=$value['r_id'];?>">UPDATE</a>
        </td> 
        
</tr>
    <?php } 
    ?>
</table>
