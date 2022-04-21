<?php
//sample URL: http://localhost/Sumitra/lms/lms/apis/select-issues-books-by-student-name.php?id=14
$conn = mysqli_connect("localhost:3308", "root", "", "lms");
$response = array();
$sid = $_GET['sid'];
if($conn){
    $sql = "select distinct * from book_issue 
    LEFT JOIN books ON book_issue.bid = books.bid 
    LEFT JOIN students ON book_issue.sid = students.sid
    INNER JOIN book_copies ON book_issue.bcid_no = book_copies.bcid_no 
    WHERE students.sid = {$sid}";
    $result = mysqli_query($conn, $sql);
    
    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc(($result))){
            $response[$i]["issue_id"] = $row['i_id'];
            $response[$i]["student_name"] = $row['fname'] . " " . $row['mname'] . " " . $row['lname'];
            $response[$i]["book_name"] = $row['bname'];
            $response[$i]["book_copy_code"] = $row['bcid_no'];
            $response[$i]["issue_date"] = $row['date_of_issue'];
            $response[$i]["return_date"] = $row['max_return_date'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}else{
    echo "SOMETHING WENT WRONG";
}
?>