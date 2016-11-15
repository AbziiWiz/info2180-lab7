<?php


$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$country = $_GET['country'];
if($country != ""){ 

    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //print "<h3>" . strtoupper($query) . "</h3>";
    //print "<p>" . $definition[$query] . "</p>";
    //echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
    
    //print "<h3>".$country."</h3>";
    print "<p>".$result['name']."is ruled by ".$result['head_of_state']."</p>";
}
else{
    
    //alert("Empty Search");
    $stmt = $conn->query("SELECT * FROM countries");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<ul>';
        foreach ($results as $row) {
          echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
        }
    echo '</ul>';
}