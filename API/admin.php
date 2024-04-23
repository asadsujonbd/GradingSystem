<?php
include "inc/header.php";
//$url = 'http://localhost:5000/users/login'; // path to your JSON file
$url2 = 'http://localhost:5000/users';
$url3 = 'http://localhost:5000/classes';

//$data = file_get_contents($url); // put the contents of the file into a variable
$data2 = file_get_contents($url2);
$data3 = file_get_contents($url3);

//$userId = json_decode($data); // decode the JSON feed
$users = json_decode($data2);
$classes = json_decode($data3);
$userId = $_GET['id'];
echo $userId;
echo $userId;
?>
<title>Admin</title>
</head>

<body>
  <?php include "inc/nav.php";
  ?>

  <div class="container">
    <h3>list of all User</h3>
    <table class="table text-center">
      <form action="user_process.php" method="post">

        <thead>
          <tr>
            <!-- <th scope="col">Class id</th> -->
            <th scope="col">user_id</th>
            <th scope="col">user_name</th>
            <th scope="col">first_name </th>
            <th scope="col">last_name</th>
            <th scope="col">user_type</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
          <?php
          echo "<button type = 'submit' name='addUser' formaction='add_user.php' class='btn btn-primary mx-3'>" . "Add User"  . "</button>";
          foreach ($users as $value) {
            echo "<tr>";
            echo "<td> $value->user_id </td>";
            echo "<td> $value->user_name </td>";
            echo "<td> $value->first_name </td>";
            echo "<td> $value->last_name </td>";
            echo "<td> $value->user_type </td>";
            echo "<td>";
            //echo "<button type = 'submit' name='addUser' class='btn btn-primary mx-3'>" . "Add"  . "</button>";
            echo "<input type='hidden' name='user_id' value='$userId'>";
            echo "<input type='hidden' name='adminID' value='$userId'>";
            echo "<button type = 'submit' name='editUser' formaction='edit_admin.php' value= '$value->user_id' class='btn btn-secondary'>" . "Edit"  . "</button>";
            echo "<button type = 'button' name='deleteUser' value= '$value->user_id' class='btn btn-danger mx-3'>" . "Delete"  . "</button>";
            echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </form>
    </table>
  </div>

  <div class="container">
    <h3>list of all Class</h3>
    <table class="table text-center">
      <form action="class_process.php" method="post">
        <thead>
          <tr>
            <th scope="col">Class id</th>
            <th scope="col">Class Name</th>
            <!-- <th scope="col">Is Archived</th> -->
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          echo "<button type = 'submit' name='addClass' formaction='add_class.php' class='btn btn-primary mx-3'>" . "Add Class"  . "</button>";
          foreach ($classes as $value) {
            echo "<tr>";
            echo "<td> $value->class_id </td>";
            echo "<td> $value->class_name </td>";
            //echo "<td> $value->is_archived </td>";
            echo "<td>";
            echo "<button type = 'submit' name='showClass' formaction='subject.php' value= '$value->class_id' class='btn btn-primary mx-3'>" . "Show"  . "</button>";
            echo "<button type = 'submit' formaction='edit_class.php' name='editClass' value= '$value->class_id' class='btn btn-secondary'>" . "Edit"  . "</button>";
            echo "<input type='hidden' name='user_id' value='$userId'>";

            echo "<button type= 'button' name='deleteClass' value='$value->class_id' class='btn btn-danger mx-3'>" . "Delete"  . "</button>";
            echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </form>
    </table>
  </div>
  <?php include "inc/footer.php"; ?>