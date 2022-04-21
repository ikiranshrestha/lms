<?php
$conn = mysqli_connect("localhost:3308", "root", "", "lms");
$response = array();
if($conn){
    $sql = "select * from books";
    $result = mysqli_query($conn, $sql);
    // echo ($result);die();
    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc(($result))){
            $response[$i]["bid"] = $row['bid'];
            $response[$i]["bname"] = $row['bname'];
            $response[$i]["author"] = $row['author'];
            $response[$i]["publication"] = $row['publication'];
            $response[$i]["copies"] = $row['no_of_books'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}else{
    echo "SOMETHING WENT WRONG";
}
?>