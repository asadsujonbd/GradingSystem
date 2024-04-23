<?php
include "inc/header.php";
// from teacher view
if (isset($_POST['testDetails'])) {
  $test_id = $_POST['testDetails'];
  $teacher_id = $_POST['user_id'];
  echo $teacher_id;
  echo $test_id;
  //header("Location: http://localhost:5000/users/list_student_subject/$user_id/$subject_id");
  $url4 = "http://localhost:5000/tests/details/$teacher_id/$test_id";
  $data4 = file_get_contents($url4);
  $list = json_decode($data4);
}
if (isset($_GET['_id'])) {
  $test_id = $_GET['test_id'];
  $teacher_id = $_GET['_id'];
  echo $teacher_id;
  echo $test_id;
  //header("Location: http://localhost:5000/users/list_student_subject/$user_id/$subject_id");
  $url4 = "http://localhost:5000/tests/details/$teacher_id/$test_id";
  $data4 = file_get_contents($url4);
  $list = json_decode($data4);
}
?>
<title>Subject Details</title>
</head>

<body>
  <?php include "inc/nav.php"; ?>
  <div class="container">
    <h3>list all assigned subjects student</h3>
    <table class="table">
      <form action="" method="post">
        <thead>
          <tr>
            <!-- <th scope="col">Class id</th> -->
            <th scope="col">user_name</th>
            <th scope="col">test_name</th>
            <th scope="col">marks </th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          echo "<input type='hidden' name= 'test_id' value = " . $test_id . ">";
          echo "<input type='hidden' name= 'teacher_id' value = " . $teacher_id . ">";
          echo "<input type='file' class='form-control' name='inputfile' id='inputfile' data-user='$teacher_id' data-test='$test_id'>";
          foreach ($list as $value) {
            echo "<tr>";
            //echo "<td> $value->class_id </td>";
            echo "<td> $value->user_name </td>";
            echo "<td> $value->test_name </td>";
            echo "<td> $value->marks </td>";
            echo "<td>";
            // echo "<button type='submit' class='btn btn-info' name='subjectDetails'  value= '$value->subject_id' >" . "Details"  . "</button>";
            echo "<button class='btn btn-info mx-3' name= 'select_test' formaction='edit_grade.php' value= '$value->user_id' >" . "Edit"  . "</button>";
            // echo "<button type='submit' class='btn btn-info' formaction='add_test.php' name= 'select_subject' value= '$value->subject_id' >" . "Add Test"  . "</button>";
            // //echo "<button class='btn btn-info' name= 'select_subject' formaction='test_process.php' value= '$value->subject_id' >" . "Upload CSV"  . "</button>";
            // echo "<button class='btn btn-danger mx-3' name= 'select_subject' formaction='test_process.php' value= '$value->subject_id' >" . "Remove"  . "</button>";
            echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </form>
    </table>
  </div>
  <script>
    $(document).on("change", "#inputfile", function() {
      const file_data = this.value;
      const file = file_data.replace(/^.*[\\\/]/, '')
      const user_id = $(this).attr('data-user');
      const test_id = $(this).attr('data-test');
      //var form_data = new FormData();
      console.log(file_data)
      console.log(file)
      console.log(user_id)
      console.log(test_id)
      //console.log(form_data)
      //form_data.append('file', file_data);
      $.ajax({
        url: "http://localhost:5000/tests/importGrades/" + user_id,
        type: "POST",
        data: {
          file: file,
          test_id: test_id
        },
        crossDomain: true,
        encode: true,
        success: function(data) {
          console.log(data);
          alert(data)
          window.location.replace("list_student_test.php?_id=" + user_id + "&test_id=" + test_id);
        }
      });
      event.preventDefault();
    });
  </script>
  <?php include "inc/footer.php"; ?>