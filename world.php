<?php


$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$country = $_GET['country'];

//The next line test if no country is selected and checkbox is unchecked
if (strpos($country, 'empty') !== false)
{
    print "<p>". "NO COUNTRIES"."</p>";

}
else if(isset($country)){ 
    
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    print "<p>".$result['name']." is ruled by ".$result['head_of_state']."</p>";
    
}
else{
    
    
    $stmt = $conn->query("SELECT * FROM countries");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<ul>';
        foreach ($results as $row) {
          echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
        }
    echo '</ul>';
}