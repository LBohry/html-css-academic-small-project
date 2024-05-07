<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Admin Page for Users</title>
</head>

<body>
    <h1>Users</h1>

    <table id="usersTable">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Date</th>
        </tr>
        <?php
        require "functions.php";
        $errors = array();
        $sql = "SELECT username, email, password, date FROM users";
        $stmt = $pdo->query($sql);

        while ($row = $stmt->fetch())
        {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['password']) . "</td>";
            echo "<td>" . htmlspecialchars($row['date']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>