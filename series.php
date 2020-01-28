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
$stmt = $pdo->query('SELECT * FROM series WHERE id='.$_GET['id']);
while ($row = $stmt->fetch()) {
?>
<h1><?php echo $row['title']; ?> - <?php echo $row['rating']; ?></h1>
<h3><b>Awards?</b> <?php if ($row['has_won_awards'] == 1) { ?>Ja<?php } else { ?>Nee<?php } ?></h3>
<h3><b>Seasons:</b> <?php echo $row['seasons']; ?></h3>
<h3><b>Country</b> <?php echo $row['country']; ?></h3>
<h3><b>Language:</b> <?php echo $row['language']; ?></h3>
<p><?php echo $row['description']; ?></p>
<?php
}
?>