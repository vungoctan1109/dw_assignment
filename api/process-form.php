<?php header("Refresh: 3;url=http://localhost:8080/dw_assignment/list.hmtl");
$data = json_decode(file_get_contents('php://input'), true);
$name = $data['name'];
$district = $data['district'];
$pub_date = $data['pub_date'];
$description = $data['description'];
$status = $data['status'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "th2012e_php";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error){
    die("Connection failed: " . $conn ->connect_error);
}
$sql = "INSERT INTO streets (name,district,pub_date,description,status) VALUES ('". $name."','". $district."','". $pub_date."','". $description."',". $status.")";

header('Content-Type: application/json; charset=utf-8');
if ($conn ->query($sql) == TRUE){
    $data = new stdClass();
    $data ->message = 'Action success';
    http_response_code(201);
    echo json_encode($data);
}else{
    $data = new stdClass();
    $data ->message = 'Action failed';
    http_response_code(500);
    echo json_encode($data);
}
$conn ->close();
