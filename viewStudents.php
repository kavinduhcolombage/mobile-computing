<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }
        th, td {
            padding: 10px;
            border: 1px solid #333;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>All Student Records</h2>

<?php
$connect = mysqli_connect("localhost", "root", "", "studentdb");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM students";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>
            <tr>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Height (cm)</th>
                <th>Phone Number</th>
            </tr>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row["student_id"] . "</td>
                <td>" . $row["first_name"] . "</td>
                <td>" . $row["last_name"] . "</td>
                <td>" . $row["height"] . "</td>
                <td>" . $row["phone_number"] . "</td>
              </tr>";
    }
    
    echo "</table>";
} else {
    echo "<p style='text-align:center;'>No student records found.</p>";
}

mysqli_close($connect);
?>

</body>
</html>
