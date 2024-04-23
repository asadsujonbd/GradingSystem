<?php
include "inc/header.php";
$url2 = "http://localhost:5000/users/teacher/subjects/{$userId}";
$data2 = file_get_contents($url2); // put the contents of the file into a variable
$characters2 = json_decode($data2);

echo '<br>';
?>
<title>Index</title>
</head>

<body>
  <?php include "inc/nav.php"; ?>
  <div class="container">
    <h3>list all assigned subjects</h3>
    <table class="table">

      <form action="list_student_subject.php" method="post">
        <?php echo "<button type = 'submit' name='editTeacher' formaction='edit_teacher.php' value= '$userId' class='btn btn-secondary'>" . "Edit"  . "</button>"; ?>
        <thead>
          <tr>
            <!-- <th scope="col">Class id</th> -->
            <th scope="col">Subject id</th>
            <th scope="col">Subject Name</th>
            <th scope="col">Is Archived </th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          echo "<input type='hidden' name= 'user_id' value = " . $userId . ">";
          foreach ($characters2 as $value) {
            echo "<tr>";
            //echo "<td> $value->class_id </td>";

            echo "<td> $value->subject_id </td>";
            echo "<td> $value->subject_name </td>";
            echo "<td> $value->is_archived </td>";
            echo "<td>";
            echo "<button type='submit' class='btn btn-info' name='subjectDetails'  value= '$value->subject_id' >" . "Details"  . "</button>";

            echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </form>
    </table>
  </div>


  <?php include "inc/footer.php"; ?>