<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<nav>
        <ul>
            <li><a href="admin_panel.php">Admin Panel</a></li> 
        </ul>
    </nav>
    <h2>Query</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Query</th>
            <th>Message</th>


        </tr>
        <?php
        // Database connection
        include "connection.php";
        // Retrieve all users
        $sql = "SELECT * FROM query";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["query"] . "</td>";
                echo "<td>" . $row["message"] . "</td>";  
                
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>0 results</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>