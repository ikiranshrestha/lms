<?php
$conn = mysqli_connect("localhost:3308", "root", "", "lms");
$response = array();
if($conn){
    $sql = "select * from librarian";
    $result = mysqli_query($conn, $sql);
    // echo ($result);die();
    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc(($result))){
            $response[$i]["librarian_id"] = $row['lid'];
            $response[$i]["username"] = $row['username'];
            $response[$i]["email_address"] = $row['email'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}else{
    echo "SOMETHING WENT WRONG";
}
?>