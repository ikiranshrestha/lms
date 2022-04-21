<?php
$conn = mysqli_connect("localhost:3308", "root", "", "lms");
$response = array();
if($conn){
    $sql = "select * from book_copies LEFT JOIN books ON book_copies.bid = books.bid";
    $result = mysqli_query($conn, $sql);
    // echo ($result);die();
    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc(($result))){
            $response[$i]["bcid"] = $row['bcid'];
            $response[$i]["bid"] = $row['bid'];
            $response[$i]["book_name"] = $row['bname'];
            $response[$i]["author"] = $row['author'];
            $response[$i]["bcid_no"] = $row['bcid_no'];
            $response[$i]["created_date"] = $row['created_date'];
            $response[$i]["copies"] = $row['updated_on'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}else{
    echo "SOMETHING WENT WRONG";
}
?>