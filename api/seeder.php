<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "th2012e_php";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error){
    die("Connection failed: " . $conn ->connect_error);
}

$sql = "INSERT INTO districts (id, district_name)
VALUES (1, 'Hoàng Mai'); ";
$sql .= "INSERT INTO districts (id, district_name)
VALUES (2, 'Hà Đông'); ";
$sql .= "INSERT INTO districts (id, district_name)
VALUES (3, 'Hoàn Kiếm'); ";
$sql .= "INSERT INTO districts (id, district_name)
VALUES (4, 'Cầu Giấy'); ";
$sql .= "INSERT INTO districts (id, district_name)
VALUES (5, 'Ba Đình'); ";

$sql .= "INSERT INTO streets (name,district,pub_date,description,status) 
VALUES ('Nguyễn Hữu Thọ', 1, '1998-01-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1); ";
$sql .= "INSERT INTO streets (name,district,pub_date,description,status) 
VALUES ('Bùi Xương Trạch', 1, '1998-01-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', -1); ";
$sql .= "INSERT INTO streets (name,district,pub_date,description,status) 
VALUES ('Phan Bội Châu', 2, '1998-01-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0); ";
$sql .= "INSERT INTO streets (name,district,pub_date,description,status) 
VALUES ('Văn Phú', 2, '1998-01-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1); ";
$sql .= "INSERT INTO streets (name,district,pub_date,description,status) 
VALUES ('Hàng Bồ', 3, '1998-01-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', -1); ";
$sql .= "INSERT INTO streets (name,district,pub_date,description,status) 
VALUES ('Phan Chu Trinh', 3, '1998-01-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0); ";
$sql .= "INSERT INTO streets (name,district,pub_date,description,status) 
VALUES ('Bưởi', 4, '1998-01-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1); ";
$sql .= "INSERT INTO streets (name,district,pub_date,description,status) 
VALUES ('Dịch Vọng Hậu', 4, '1998-01-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0); ";
$sql .= "INSERT INTO streets (name,district,pub_date,description,status) 
VALUES ('Cao Bá Quát', 5, '1998-01-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1); ";
$sql .= "INSERT INTO streets (name,district,pub_date,description,status) 
VALUES ('Chu Văn An', 5, '1998-01-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1); ";

if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
