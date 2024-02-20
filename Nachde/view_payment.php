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
    <h2>Payment Details</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Style Id</th>
            <th>Payment Id</th>
            <th>Added Date</th>

        </tr>
        <?php
        // Database connection
        include "connection.php";
        // Retrieve all users
        $sql = "SELECT * FROM payment";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["style_id"] . "</td>";
                echo "<td>" . $row["payment_id"] . "</td>";
                echo "<td>" . $row["added_date"] . "</td>"; 
                
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 results</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>