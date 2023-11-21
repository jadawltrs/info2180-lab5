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
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
