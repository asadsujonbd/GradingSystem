<?php
include "inc/header.php";
if (isset($_POST['select_test'])) {
  $test_id = $_POST['select_test'];
  $subject_id = $_POST['subject_id'];
  $user_id = $_POST['user_id'];
  echo $test_id;
  echo $subject_id;
  echo $user_id;
  $url4 = "http://localhost:5000/tests/$test_id";
  $data4 = file_get_contents($url4);
  $list = json_decode($data4);
}
?>
<title>Edit Class</title>
</head>

<body>
  <?php include "inc/nav.php"; ?>
  <div class="container">
    <div class="row">
      <h3 class="">Edit Test</h3>
      <div class="">
        <form action="" method="post">
          <?php
          foreach ($list as $value) {
            echo '<div class="form-group">';
            echo '<label class="col-sm-3 col-form-label">test_name</label>';
            echo '<div class="col">';
            echo "<p><input type='text' class='form-control' id='test_name' name='test_name' value = " . $value->test_name . "></p>";
            echo '</div>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label class="col-sm-3 col-form-label">Date</label>';
            echo '<div class="col">';
            echo "<p><input type='datetime-local' class='form-control' id='date' name='date' value = " . $value->date . "></p>";
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo "<input type='hidden' id='subject_id' name='subject_id' value='$value->subject_id'>";
            echo "<input type='hidden' id='user_id' name='user_id' value='$user_id'>";
            echo "<input type='hidden' id='test_id' name='test_id' value='$test_id'>";
          }
          ?>
          <div class="">
            <input type="submit" class="btn btn-primary" value="Update">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    console.log('user id : ' + $("#user_id").val())

    $("form").submit(function(event) {
      const subject_id = $("#subject_id").val();
      const user_Id = $("#user_id").val();
      var formData = {
        test_id: $("#test_id").val(),
        subject_id: $("#subject_id").val(),
        user_Id: $("#user_id").val(),
        test_name: $("#test_name").val(),
        date: $("#date").val()
      };
      $.ajax({
        type: "PUT",
        url: 'http://localhost:5000/tests/' + user_Id,
        data: formData,
        crossDomain: true,
        dataType: "json",
        encode: true,
        success: function(result) {
          if (result == 'not ok') {
            alert('hoi nai')
          } else {
            window.location.href = 'list_student_subject.php?user_id=' + user_Id + '&subject_id=' + subject_id;
          }
          console.log(result)
        }
      })
      event.preventDefault();
    });
  </script>
  <?php include "inc/footer.php"; ?>