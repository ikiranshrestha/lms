<?php
$conn = mysqli_connect("localhost:3308", "root", "", "lms");
$response = array();
if($conn){
    if(empty($_GET['sid'])){
        $sql = "select * from students";
        $result = mysqli_query($conn, $sql);
        // echo ($result);die();
        if($result){
            header("Content-Type: JSON");
            $i=0;
            while($row = mysqli_fetch_assoc(($result))){
                $response[$i]["student_id"] = $row['sid'];
                $response[$i]["full_name"] = $row['fname'] . " " . $row['mname'] . " " . $row['lname'];
                $response[$i]["email_address"] = $row['email'];
                $response[$i]["password"] = $row['password'];
                $i++;
            }
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
        else{
            echo "SOMETHING WENT WRONG";
        }
    }else{
        $sid = $_GET['sid'];
        $sql = "select * from students where sid = {$sid}";
        $result = mysqli_query($conn, $sql);
        // echo ($result);die();
        if($result){
            header("Content-Type: JSON");
            $i=0;
            while($row = mysqli_fetch_assoc(($result))){
                $response[$i]["student_id"] = $row['sid'];
                $response[$i]["full_name"] = $row['fname'] . " " . $row['mname'] . " " . $row['lname'];
                $response[$i]["email_address"] = $row['email'];
                $response[$i]["password"] = $row['password'];
                $i++;
            }
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
        else{
            echo "SOMETHING WENT WRONG";
        }
    }
}
?>