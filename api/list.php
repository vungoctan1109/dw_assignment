<?php

$search_keyword = '';
$district_filter = '';
$search_title = '';

if (isset($_REQUEST['search_keyword'])) {
    $search_keyword = $_REQUEST['search_keyword'];
}

if (isset($_REQUEST['district_filter'])) {
    $district_filter = $_REQUEST['district_filter'];
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "th2012e_php";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM streets INNER JOIN districts ON streets.district = districts.id";

if ($search_keyword != null && strlen($search_keyword) > 0) {
    $sql .= " where name like '%$search_keyword%'";
    $search_title = "Search result for street name $search_keyword ";
}


if ($district_filter != null) {
    $sql .= " and district = $district_filter";
    $search_title = "Search result for district $district_filter";
}

if ($search_keyword != null && $district_filter != null) {
    $search_title = "Search result for street name $search_keyword and district $district_filter";
}


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    print json_encode($rows, JSON_UNESCAPED_UNICODE);
} else {

}
$conn -> close();

