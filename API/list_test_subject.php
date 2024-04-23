<?php
// if (isset($_POST['subjectDetails'])) {
//   $subject_id = $_POST['subjectDetails'];
//   $user_id = $_POST['user_id'];
//   echo $user_id;
//   echo $subject_id;
//   //header("Location: http://localhost:5000/users/list_student_subject/$user_id/$subject_id");
//   $url4 = "http://localhost:5000/subjects/tests/$user_id/$subject_id";
//   $data4 = file_get_contents($url4);
//   $list = json_decode($data4);
// }
$url4 = "http://localhost:5000/subjects/tests/$user_id/$subject_id";
$data4 = file_get_contents($url4);
$list = json_decode($data4);

?>
<div class="container">
  <h3>list all assigned subjects student</h3>
  <table class="table">
    <form action="list_student_test.php" method="post">
      <thead>
        <tr>
          <!-- <th scope="col">Class id</th> -->
          <th scope="col">Subject id</th>
          <th scope="col">test_id </th>
          <th scope="col">test Name</th>
          <th scope="col" class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // echo "Upload Test results: <br>";
        // echo "<input type='file' class='form-control' name='inputfile' id='inputfile' data-user='$user_id'>";
        echo "<input type='hidden' name= 'user_id' value = " . $user_id . ">";
        echo "<input type='hidden' name= 'subject_id' value = " . $subject_id . ">";
        foreach ($list as $value) {
          echo "<tr>";
          //echo "<td> $value->class_id </td>";

          echo "<td> $value->subject_id </td>";
          echo "<td> $value->test_id </td>";
          echo "<td> $value->test_name </td>";
          echo "<td>";
          echo "<button type='submit' class='btn btn-info' name='testDetails'  value= '$value->test_id' >" . "Details"  . "</button>";
          echo "<button class='btn btn-info mx-3' name= 'select_test' formaction='edit_test.php' value= '$value->test_id' >" . "Edit"  . "</button>";
          //echo "<button class='btn btn-info mx-3' name= 'select_subject' formaction='edit_test.php' value= '$value->subject_id' >" . "Edit"  . "</button>";
          //echo "<button type='submit' class='btn btn-info mx-3' formaction='add_test.php' name= 'select_subject' value= '$value->subject_id' >" . "Add Test"  . "</button>";
          //echo "<button class='btn btn-info mx-3' formaction='upload_file.php' name='test_id' value= '$value->test_id'> Upload Mark</button>";
          //echo "<input type='file' name='inputfile' id='inputfile' data-user='$user_id'>";
          echo "<button type='button' class='btn btn-danger' id= 'deleteTest' name= 'deleteTest' formaction='test_process.php' value= '$value->test_id' >" . "Remove"  . "</button>";
          echo "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </form>
  </table>
</div>

<!-- <script>
  $(document).on("change", "#inputfile", function() {
    const file_data = this.value;
    const file = file_data.replace(/^.*[\\\/]/, '')
    const user_id = $(this).attr('data-user');
    //var form_data = new FormData();
    console.log(file_data)
    console.log(file)
    console.log(user_id)
    //console.log(form_data)
    //form_data.append('file', file_data);
    $.ajax({
      url: "http://localhost:5000/tests/importGrades/" + user_id,
      type: "POST",
      data: {
        file: file
      },
      crossDomain: true,
      encode: true,
      success: function(data) {
        console.log(data);
        alert(data)
      }
    });
  });
</script> -->