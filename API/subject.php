<?php
include "inc/header.php";
if (isset($_POST['showClass'])) {
  $class_id = $_POST['showClass'];
  $user_id = $_POST['user_id'];
  echo $class_id;
  echo $user_id;
}
if (isset($_GET['user_id'])) {
  $class_id = $_GET['class_id'];
  $user_id = $_GET['user_id'];
  echo $class_id;
  echo $user_id;
}

$url4 = "http://localhost:5000/classes/subjects/$class_id";
$data4 = file_get_contents($url4);
$subjects = json_decode($data4);
?>
<title>Index</title>
</head>

<body>
  <?php include "inc/nav.php"; ?>
  <div class="container">
    <h3>list of all Subject</h3>
    <table class="table text-center">
      <form action="" method="post">
        <thead>
          <tr>
            <th scope="col">Subject Id</th>
            <th scope="col">Subject Name</th>
            <th scope="col">Class id</th>
            <th scope="col">Is Archived</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          echo "<input type='hidden' id='user_id' name='user_id' value='$user_id'>";
          echo "<input type='hidden' id='class_id' name='class_id' value='$class_id'>";
          echo "<button type = 'submit' formaction='add_subject.php' name='addSubject' value = '$class_id' class='btn btn-primary mx-3'>" . "Add Subject"  . "</button>";
          echo "<button type = 'submit' formaction='assignPupil.php' name='assignPupil' value = '$class_id' class='btn btn-primary mx-3'>" . "Assign Pupil"  . "</button>";
          foreach ($subjects as $key => $value) {
            echo "<tr>";
            echo "<td> $value->subject_id </td>";
            echo "<td> $value->subject_name </td>";
            echo "<td> $value->class_id </td>";
            echo "<td> $value->is_archived </td>";
            echo "<td>";
            //echo "<button type = 'submit' name='addSubject' value= '$value->subject_id' class='btn btn-primary mx-3'>" . "Add"  . "</button>";
            if ($value->is_archived == 0) {
              echo "<button type = 'submit' formaction='edit_subject.php' name='editSubject' value= '$value->subject_id' class='btn btn-secondary me-3'>" . "Edit"  . "</button>";
              echo "<button type = 'button' id='archiveSubject' name='archiveSubject' value= '$value->subject_id' class='btn btn-primary'>" . "Archive"  . "</button>";
              //echo "<input type= 'button' id='deleteSubject' data-subject='$value->subject_id' value='$value->subject_id' class='btn btn-danger mx-3'>";
              echo "<button type= 'button' name='deleteSubject' value='$value->subject_id' class='btn btn-danger mx-3'>" . "Delete"  . "</button>";
            }

            echo "</td>";
            echo "</tr>";
            //print_r($key);
          }
          ?>
        </tbody>
      </form>
    </table>
  </div>
  <!-- <script>
    $("form").submit(function(event) {
      const archiveSubject = $("#archiveSubject").val();
      console.log('subject id : ' + archiveSubject)
      $.ajax({
        type: 'POST',
        url: 'http://localhost:5000/subjects/archive/' + archiveSubject,
        crossDomain: true,
        dataType: 'json',
        success: function(result) {
          console.log(result)
          alert(result)
          //window.location.reload()
        }
      })
    });
  </script> -->
  <?php include "inc/footer.php"; ?>