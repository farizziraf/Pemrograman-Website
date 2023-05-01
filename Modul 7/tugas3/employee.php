<!DOCTYPE html>
<html>

<head>
  <title>Employee CRUD</title>
</head>

<body>
  <h1>Employee CRUD</h1>

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
    $employee_id = $_POST['employee_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $salary = $_POST['salary'];
    $job_id = $_POST['job_id'];

    $sql = "INSERT INTO hr_employees (employee_id, first_name, last_name, email, phone_number, salary, job_id)
                VALUES ('$employee_id', '$first_name', '$last_name', '$email', '$phone_number', '$salary', '$job_id')";
    if (mysqli_query($conn, $sql)) {
      echo "Data inserted successfully<br>";
    } else {
      echo "Error inserting data: " . mysqli_error($conn) . "<br>";
    }
  }

  // Delete data from table
  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM hr_employees WHERE employee_id='$id'";
    if (mysqli_query($conn, $sql)) {
      echo "Data deleted successfully<br>";
    } else {
      echo "Error deleting data: " . mysqli_error($conn) . "<br>";
    }
  }

  // Update data in table
  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $salary = $_POST['salary'];
    $job_id = $_POST['job_id'];

    $sql = "UPDATE hr_employees SET first_name='$first_name', last_name='$last_name', email='$email',
                phone_number='$phone_number', salary='$salary', job_id='$job_id' WHERE employee_id='$id'";
    if (mysqli_query($conn, $sql)) {
      echo "Data updated successfully<br>";
    } else {
      echo "Error updating data: " . mysqli_error($conn) . "<br>";
    }
  }

  // Retrieve data from table
  $sql = "SELECT * FROM hr_employees";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Employee ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Salary</th><th>Job ID</th><th>Actions</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['employee_id'] . "</td>";
      echo "<td>" . $row['first_name'] . "</td>";
      echo "<td>" . $row['last_name'] . "</td>";
      echo "<td>" . $row['email'] . "</td>";
      echo "<td>" . $row['phone_number'] . "</td>";
      echo "<td>" . $row['salary'] . "</td>";
      echo "<td>" . $row['job_id'] . "</td>";
      echo "<td><a href='?delete=" . $row['employee_id'] . "'>Delete</a> | <a href='#' onclick='showEditForm(\"" . $row['employee_id'] . "\", \"" . $row['first_name'] . "\", \"" . $row['last_name'] . "\", \"" . $row['email'] . "\", \"" . $row['phone_number'] . "\", \"" . $row['salary'] . "\", \"" . $row['job_id'] . "\")'>Edit</a></td>";
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
    <label for="employee_id">Employee ID:</label>
    <input type="text" id="employee_id" name="employee_id" required><br>
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required><br>

    <label for="phone_number">Phone Number:</label>
    <input type="text" id="phone_number" name="phone_number"><br>

    <label for="salary">Salary:</label>
    <input type="text" id="salary" name="salary"><br>

    <label for="job_id">Job ID:</label>
    <input type="text" id="job_id" name="job_id" required><br>

    <input type="submit" name="submit" value="Add Data">
  </form>
  <!-- Edit Form -->
  <div id="edit-form" style="display:none;">
    <h2>Edit Data</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="hidden" id="id" name="id" value="">
      <label for="employee_id">Employee ID:</label>
      <input type="text" id="employee_id" name="employee_id" value="" disabled><br>
      <label for="first_name">First Name:</label>
      <input type="text" id="edit_first_name" name="first_name" required><br>
      <label for="last_name">Last Name:</label>
      <input type="text" id="edit_last_name" name="last_name" required><br>
      <label for="email">Email:</label>
      <input type="text" id="edit_email" name="email" required><br>
      <label for="phone_number">Phone Number:</label>
      <input type="text" id="edit_phone_number" name="phone_number"><br>
      <label for="salary">Salary:</label>
      <input type="text" id="edit_salary" name="salary"><br>
      <label for="job_id">Job ID:</label>
      <input type="text" id="edit_job_id" name="job_id"><br>
      <input type="submit" name="update" value="Update">
    </form>
  </div>
  <!-- Show Edit Form Script -->
  <script>
    function showEditForm(id, first_name, last_name, email, phone_number, salary, job_id) {
      document.getElementById('id').value = id;
      document.getElementById('employee_id').value = id;
      document.getElementById('edit_first_name').value = first_name;
      document.getElementById('edit_last_name').value = last_name;
      document.getElementById('edit_email').value = email;
      document.getElementById('edit_phone_number').value = phone_number;
      document.getElementById('edit_salary').value = salary;
      document.getElementById('edit_job_id').value = job_id;
      document.getElementById('edit-form').style.display = 'block';
    }
  </script>
  <center><a href="index.php"><button>Back to Index</button></a><center>
</body>

</html>