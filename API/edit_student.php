<?php
include "inc/header.php";
if (isset($_POST['editStudent'])) {
    $student_id = $_POST['editStudent'];
    echo $student_id;
    $url4 = "http://localhost:5000/users/show/$student_id";
    $data4 = file_get_contents($url4);
    $list = json_decode($data4);
}
?>
<title>Edit Student</title>
</head>

<body>
    <?php include "inc/nav.php"; ?>
    <div class="container">
        <div class="row">
            <h3 class="">Edit Admin</h3>
            <div class="">
                <form action="" method="post">
                    <?php

                    foreach ($list as $value) {
                        //echo "<p>Meeting ID <input type='text' class='form-control' name='meeting_id' value = ". $row[0] . " readonly></p>";
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-3 col-form-label">user_name</label>';
                        echo '<div class="col">';
                        echo "<p><input type='text' class='form-control' id='user_name' name='user_name' value = " . $value->user_name . "></p>";
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-3 col-form-label">password</label>';
                        echo '<div class="col">';
                        echo "<p><input type='password' class='form-control' id='password' name='password'></p>";
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-3 col-form-label">first_name</label>';
                        echo '<div class="col">';
                        echo "<p><input type='text' class='form-control' id='first_name' name='first_name' value = " . $value->first_name . "></p>";
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-3 col-form-label">last_name</label>';
                        echo '<div class="col">';
                        echo "<p><input type='text' class='form-control' id='last_name' name='last_name' value = " . $value->last_name . "></p>";
                        echo '</div>';
                        echo '</div>';
                        echo "<input type='hidden' id='user_id' name='user_id' value='$student_id'>";
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
        $("form").submit(function(event) {
            const user_id = $("#user_id").val();
            var formData = {
                user_name: $("#user_name").val(),
                password: $("#password").val(),
                first_name: $("#first_name").val(),
                last_name: $("#last_name").val()
            };
            $.ajax({
                type: "PUT",
                url: 'http://localhost:5000/users/' + user_id,
                data: formData,
                dataType: "json",
                encode: true,
                success: function(result) {
                    alert(result)
                    if (result == 'not ok') {
                        alert('hoi nai')
                    } else {
                        window.location.href = 'student.php?id=' + user_id;
                    }
                    console.log(result)
                }
            })
            event.preventDefault();
        });
    </script>
    <?php include "inc/footer.php"; ?>