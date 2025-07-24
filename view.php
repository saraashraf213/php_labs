<?php


if (isset($_GET['index'])) {
    $index = $_GET['index'];
    $lines = file("customer.txt", FILE_IGNORE_NEW_LINES);
    if (isset($lines[$index])) {
        unset($lines[$index]);
        file_put_contents("customer.txt", implode("\n", $lines));
    }
    header("Location: view.php");
    exit;
}


$lines = file("customer.txt", FILE_IGNORE_NEW_LINES);

echo "<h2>Registered Users</h2>";
echo "<table border='1' cellpadding='10'>
<tr>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email</th>
  <th>Address</th>
  <th>Country</th>
  <th>Gender</th>
  <th>Skills</th>
  <th>Username</th>
  <th>Password</th>
  <th>Department</th>
  <th>Action</th>
</tr>";

foreach ($lines as $index => $line) {
    $fields = explode("|", $line);
    echo "<tr>";
    foreach ($fields as $field) {
        echo "<td>" . htmlspecialchars($field) . "</td>";
    }
    echo "<td><a href='view.php?index=$index' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
    echo "</tr>";
}
echo "</table>";
?>


