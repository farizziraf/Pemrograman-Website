<!DOCTYPE html>
<html>
<head>
</head>

<body>
    <h1>Form CRUD hr.jobs</h1>

    <?php
    // Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_pegawai";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert data into table
    if (isset($_POST['submit'])) {
        $job_id = $_POST['job_id'];
        $job_title = $_POST['job_title'];
        $min_salary = $_POST['min_salary'];
        $max_salary = $_POST['max_salary'];

        $sql = "INSERT INTO hr_jobs (job_id, job_title, min_salary, max_salary) VALUES ('$job_id', '$job_title', '$min_salary', '$max_salary')";
        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully<br>";
        } else {
            echo "Error inserting data: " . mysqli_error($conn) . "<br>";
        }
    }

    // Delete data from table
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $sql = "DELETE FROM hr_jobs WHERE job_id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "Data deleted successfully<br>";
        } else {
            echo "Error deleting data: " . mysqli_error($conn) . "<br>";
        }
    }

    // Update data in table
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $job_title = $_POST['job_title'];
        $min_salary = $_POST['min_salary'];
        $max_salary = $_POST['max_salary'];

        $sql = "UPDATE hr_jobs SET job_title='$job_title', min_salary='$min_salary', max_salary='$max_salary' WHERE job_id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "Data updated successfully<br>";
        } else {
            echo "Error updating data: " . mysqli_error($conn) . "<br>";
        }
    }

    // Retrieve data from table
    $sql = "SELECT * FROM hr_jobs";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Job ID</th><th>Job Title</th><th>Min Salary</th><th>Max Salary</th><th>Actions</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['job_id'] . "</td>";
            echo "<td>" . $row['job_title'] . "</td>";
            echo "<td>" . $row['min_salary'] . "</td>";
            echo "<td>" . $row['max_salary'] . "</td>";
            echo "<td><a href='?delete=" . $row['job_id'] . "'>Delete</a> | <a href='#' onclick='showEditForm(\"" . $row['job_id'] . "\", \"" . $row['job_title'] . "\", \"" . $row['min_salary'] . "\", \"" . $row['max_salary'] . "\")
            ?>'>Edit</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No data found";
    }
    mysqli_close($conn);
    ?>

    <!-- Add Form -->
    <h2>Add New Data</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="job_id">Job ID:</label>
        <input type="text" id="job_id" name="job_id" required><br>

        <label for="job_title">Job Title:</label>
        <input type="text" id="job_title" name="job_title" required><br>

        <label for="min_salary">Min Salary:</label>
        <input type="text" id="min_salary" name="min_salary" required><br>

        <label for="max_salary">Max Salary:</label>
        <input type="text" id="max_salary" name="max_salary" required><br>

        <input type="submit" name="submit" value="Add Data">
    </form>

    <!-- Edit Form -->
    <h2>Edit Data</h2>
    <form id="editForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" id="id" name="id">

        <label for="job_title_edit">Job Title:</label>
        <input type="text" id="job_title_edit" name="job_title" required><br>

        <label for="min_salary_edit">Min Salary:</label>
        <input type="text" id="min_salary_edit" name="min_salary" required><br>

        <label for="max_salary_edit">Max Salary:</label>
        <input type="text" id="max_salary_edit" name="max_salary" required><br>

        <input type="submit" name="update" value="Update Data">
    </form>

    <!-- Script to show/hide Edit Form -->
    <script>
        function showEditForm(id, job_title, min_salary, max_salary) {
            document.getElementById("id").value = id;
            document.getElementById("job_title_edit").value = job_title;
            document.getElementById("min_salary_edit").value = min_salary;
            document.getElementById("max_salary_edit").value = max_salary;

            document.getElementById("editForm").style.display = "block";
        }
    </script>
    <center><a href="index.php"><button>Back to Index</button></a><center>
</body>

</html>