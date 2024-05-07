<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Admin Page for Users</title>
</head>

<body>
    <h1>Users</h1>

    <!-- Form user jdid mn admin -->
    <form action="add_user.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Add User</button>
    </form>

    <table id="usersTable">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        <?php
        require "database.php";
        $errors = array();
        $sql = "SELECT id, username, email, password, date FROM users";
        $stmt = $pdo->query($sql);

        while ($row = $stmt->fetch())
        {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['password']) . "</td>";
            echo "<td>" . htmlspecialchars($row['date']) . "</td>";
            echo "<td><a href='delete_user.php?id=" . $row['id'] . "'>Delete</a></td>"; // Delete mn admin 
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
