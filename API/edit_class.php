<?php
include "inc/header.php";
if (isset($_POST['editClass'])) {
    $class_id = $_POST['editClass'];
    $user_id = $_POST['user_id'];
    echo $class_id;
    $url4 = "http://localhost:5000/classes/$class_id";
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
            <h3 class="">Edit Class</h3>
            <div class="">
                <form action="" method="post">
                    <?php

                    foreach ($list as $value) {
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-3 col-form-label">user_name</label>';
                        echo '<div class="col">';
                        echo "<p><input type='text' class='form-control' id='class_name' name='class_name' value = '$value->class_name'></p>";
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo "<input type='hidden' id='class_id' name='class_id' value='$value->class_id'>";
                        echo "<input type='hidden' id='user_id' name='user_id' value='$user_id'>";
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
            const class_id = $("#class_id").val();
            const user_Id = $("#user_id").val();
            var formData = {
                class_name: $("#class_name").val(),
                //user_Id: $("#user_id").val()
            };
            $.ajax({
                type: "PUT",
                url: 'http://localhost:5000/classes/' + class_id + '/' + user_Id,
                data: formData,
                crossDomain: true,
                dataType: "json",
                encode: true,
                success: function(result) {
                    if (result == 'not ok') {
                        alert('hoi nai')
                    } else {
                        window.location.href = 'admin.php?id=' + user_Id
                    }
                    console.log(result)
                }
            })
            event.preventDefault();
        });
    </script>
    <?php include "inc/footer.php"; ?>