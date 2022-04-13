<?php
include('../config/db.php');
if(isset($_GET['sid']) && isset($_GET['action'])){
    if($_GET['action']=='getbooks'){
        $books=$obj->Select("book_issue JOIN books ON books.bid=book_issue.bid","*","sid",array($_GET['sid']));
        // print_r($books);
        header('Content-Type: application/json');
        echo json_encode($books);
        // foreach($books as $book){
        //     echo $book
        // }
    }
    if($_GET['action']=='getFine'){
        $book_issue=$obj->Select("book_issue","*","sid",array($_GET['sid'])," AND bid=".$_GET['bid']);
        header('Content-Type: application/json');
        echo json_encode($book_issue);
    }
}

?>