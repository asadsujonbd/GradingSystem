<?php
include "inc/header.php";
$url4 = "http://localhost:5000/users/student";
$data4 = file_get_contents($url4);
$studentList = json_decode($data4);
if (isset($_POST['assignPupil'])) {
  $class_id = $_POST['assignPupil'];
  echo $class_id;
  $url5 = "http://localhost:5000/classes/assign/$class_id";
  $data5 = file_get_contents($url5);
  $assigned_student = json_decode($data5);
  $url6 = "http://localhost:5000/classes/deassign/$class_id";
  $data6 = file_get_contents($url6);
  $assign_available_student = json_decode($data6);
}
?>
<title>Assign Pupil</title>
</head>

<body>
  <?php include "inc/nav.php"; ?>
  <div class="container">
    <h3>Assign Pupil</h3>
    <table class="table text-center">
      <form action="class_process.php" method="post">
        <thead>
          <tr>
            <th scope="col">user_id</th>
            <th scope="col">user_name</th>
            <!-- <th scope="col">Is Archived</th> -->
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($assigned_student as $value) {
            echo "<tr>";
            echo "<td> $value->user_id </td>";
            echo "<td> $value->user_name </td>";
            //echo "<td> $value->is_archived </td>";
            echo "<td>";
            echo "<button type = 'button' id='assignStudent' name='assignStudent' data-class='$class_id' value= '$value->user_id' class='btn btn-primary mx-3'>" . "Assign"  . "</button>";
            echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </form>
    </table>
  </div>
  <div class="container">
    <h3>Assign Pupil</h3>
    <table class="table text-center">
      <form action="class_process.php" method="post">
        <thead>
          <tr>
            <th scope="col">user_id</th>
            <th scope="col">user_name</th>
            <!-- <th scope="col">Is Archived</th> -->
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($assign_available_student as $value) {
            echo "<tr>";
            echo "<td> $value->user_id </td>";
            echo "<td> $value->user_name </td>";
            //echo "<td> $value->is_archived </td>";
            echo "<td>";

            echo "<button type = 'button' id='deassignStudent' name='deassignStudent' data-class='$class_id' value= '$value->user_id' class='btn btn-primary mx-3'>" . "De assign"  . "</button>";
            echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </form>
    </table>
  </div>
  <?php include "inc/footer.php"; ?>