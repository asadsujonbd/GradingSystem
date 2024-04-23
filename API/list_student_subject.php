<?php
include "inc/header.php";
// from teacher view
if (isset($_POST['subjectDetails'])) {
  $subject_id = $_POST['subjectDetails'];
  $user_id = $_POST['user_id'];
  echo $user_id;
  echo $subject_id;
  //header("Location: http://localhost:5000/users/list_student_subject/$user_id/$subject_id");
  $url4 = "http://localhost:5000/users/subject/students/$user_id/$subject_id";
  $data4 = file_get_contents($url4);
  $list = json_decode($data4);
}
if (isset($_GET['subject_id'])) {
  $subject_id = $_GET['subject_id'];
  $user_id = $_GET['user_id'];
  $url4 = "http://localhost:5000/users/subject/students/$user_id/$subject_id";
  $data4 = file_get_contents($url4);
  $list = json_decode($data4);
  echo $user_id;
  echo $subject_id;
  $url5 = "http://localhost:5000/subjects/tests/$user_id/$subject_id";
  $data5 = file_get_contents($url5);
  $list1 = json_decode($data5);
}
?>
<title>Subject Details</title>
</head>

<body>
  <?php include "inc/nav.php"; ?>
  <div class="container">
    <h3>list all assigned subjects student</h3>
    <table class="table">
      <form action="list_test_subject.php" method="post">
        <thead>
          <tr>
            <!-- <th scope="col">Class id</th> -->
            <th scope="col">Subject id</th>
            <th scope="col">Subject Name</th>
            <th scope="col">user_id </th>
            <th scope="col">AverageGrade </th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          echo "<input type='hidden' name= 'user_id' value = " . $user_id . ">";
          echo "<button type='submit' class='btn btn-info' formaction='add_test.php' name= 'select_subject' value= '$subject_id' >" . "Add Test"  . "</button>";
          foreach ($list as $value) {
            echo "<tr>";
            //echo "<td> $value->class_id </td>";

            echo "<td> $value->subject_id </td>";
            echo "<td> $value->subject_name </td>";
            echo "<td> $value->user_id </td>";
            echo "<td> $value->AverageGrade </td>";
            echo "<td>";
            //echo "<button type='submit' class='btn btn-info me-3' name='subjectDetails'  value= '$value->subject_id' >" . "Details"  . "</button>";


            // echo "<button class='btn btn-info' name= 'select_subject' formaction='test_process.php' value= '$value->subject_id' >" . "Upload CSV"  . "</button>";
            // echo "<button class='btn btn-danger mx-3' name= 'select_subject' formaction='test_process.php' value= '$value->subject_id' >" . "Remove"  . "</button>";
            echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </form>
    </table>
  </div>
  <?php
  include "list_test_subject.php";
  include "inc/footer.php"; ?>