<?php
session_start();
require_once 'db.php';

// Iegūst visus testus no datubāzes
$sql = "SELECT * FROM tests";
$result = $conn->query($sql);

$tests = [];
if ($result->num_rows > 0) {
    // Iegūst testus, ja tādi ir
    while($row = $result->fetch_assoc()) {
        $tests[] = $row;
    }
} else {
    echo "Nav pieejami testi.";
}

?>

<h2>Izvēlies testu:</h2>
<ul>
<?php foreach ($tests as $test): ?>
    <li>
        <a href="test.php?test_id=<?= $test['id'] ?>"><?= htmlspecialchars($test['title']) ?></a>
    </li>
<?php endforeach; ?>
</ul>
