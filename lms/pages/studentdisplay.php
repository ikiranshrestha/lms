<?php
if(isset($_GET['DELETE']) && $_GET['DELETE']=='DELETE')
{

    $obj->Delete('students','sid',array($_GET['sid']));
}
?>
<table class="table table-bordered table-hover">
    <tr>
        <th>SN</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Gender</th>
        <th>Delete</th>
        <th>UPDATE</th>

</tr>
<?php $students=$obj->select("students","*");     ?>
<?php foreach($students as $key=>$value) {?>
    <tr>
        <td><?=++$key;?></td>
        <td><?=$value->fname;?></td>
        <td><?=$value->mname;?></td>
        <td><?=$value->lname;?></td>
        <td><?=$value->email;?></td>
        <td><?=$value->contact;?></td>
        <td><?=$value->gender;?></td>
        <td>
        <a href="studentdisplay.php?DELETE=DELETE&sid=<?=$value->sid;?>">DELETE</a>
        </td>
        <td>
        <a href="studentupdate.php?sid=<?=$value->sid;?>">UPDATE</a>
        </td>      

</tr>
    <?php } ?>
</table>
