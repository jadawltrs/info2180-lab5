<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if(isset($_GET["country"])){
  $country = $_GET["country"];
  $stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE '%$country%'");
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
else{
  $results=array();
  echo "error";
}

?>
<?php
echo '<table>';
  echo '<thead><tr><th>Name</th><th>Continent</th><th>Independence</th><th>Head of State</th></tr></thead>';

  foreach ($results as $row):
    echo '<tr>';
      echo '<td>' . $row['name'] . '</td>';
      echo '<td>' . $row['continent'] . '</td>';
      echo '<td>' . $row['independence_year'] . '</td>';
      echo '<td>' . $row['head_of_state'] . '</td>';
    echo '</tr>';
  endforeach;

echo '</table>';
?>
