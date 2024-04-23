<?php
include "inc/header.php";
if (isset($_POST['select_test'])) {
    $user_id = $_POST['select_test'];
    $test_id = $_POST['test_id'];
    //$subject_id = $_POST['subject_id'];
    //echo $subject_id;
    $teacher_id = $_POST['teacher_id'];
    echo $teacher_id;
    echo $user_id;
    echo $test_id;
    $url4 = "http://localhost:5000/tests/student_grades/$user_id/$test_id";
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
                        echo '<label class="col-sm-3 col-form-label">Given Mark</label>';
                        echo '<div class="col">';
                        echo "<p><input type='text' class='form-control' id='marks' name='marks' value = " . $value->marks . "></p>";
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        //echo "<input type='hidden' id='subject_id' name='subject_id' value='$value->subject_id'>";
                        echo "<input type='hidden' id='user_id' name='user_id' value='$user_id'>";
                        echo "<input type='hidden' id='test_id' name='test_id' value='$test_id'>";
                        echo "<input type='hidden' id='teacher_id' name='teacher_id' value='$teacher_id'>";
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
            const teacher_id = $("#teacher_id").val();
            const user_Id = $("#user_id").val();
            const test_id = $("#test_id").val();
            console.log(user_Id)
            var formData = {
                user_Id: $("#user_id").val(),
                test_id: $("#test_id").val(),
                marks: $("#marks").val()
            };
            console.log()
            $.ajax({
                type: "PUT",
                url: 'http://localhost:5000/tests/grades/' + user_Id,
                data: formData,
                crossDomain: true,
                dataType: "json",
                encode: true,
                success: function(result) {
                    if (result == 'not ok') {
                        alert('hoi nai')
                    } else {
                        window.location.href = 'list_student_test.php?_id=' + teacher_id + '&test_id=' + test_id;
                    }
                    console.log(result)
                }
            })
            event.preventDefault();
        });
    </script>
    <?php include "inc/footer.php"; ?>