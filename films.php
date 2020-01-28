<button onlick="window.close();">Terug</button>
<br />
<?php
$host = 'localhost';
$db = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
	PDO::ATTR_ERRMODE				=>	PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE	=>	PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES		=>	false,
];
try {
	$pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
	throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
$stmt = $pdo->query('SELECT * FROM movies WHERE id='.$_GET['id']);
while ($row = $stmt->fetch()) {
?>
<h1><?php echo $row['title']; ?> - <?php echo $row['duur']; ?> minuten</h1>
<h3><b>Datum van uitkomst:</b> <?php echo $row['datum_van_uitkomst']; ?></h3>
<h3><b>Land van uitkomst:</b> <?php echo $row['land_van_uitkomst']; ?></h3>
<p><?php echo $row['description']; ?></p>
<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $row['youtube_trailer_id']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php
}
?>