<?php
include "inc/header.php";
if (isset($_POST['addSubject'])) {
    $class_id = $_POST['addSubject'];
    $user_id = $_POST['user_id'];
    echo $class_id;
    $url = "http://localhost:5000/users/teacher";
    $data = file_get_contents($url);
    $teacher = json_decode($data);
}
?>
<title>Add Subject</title>
</head>

<body>
    <?php include "inc/nav.php"; ?>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Add Subject</h1>
            <form class="row g-3" action="http://localhost:5000/subjects/addEditSubject/addSubject" method="post">

                <input type='hidden' name='user_id' value='<?php echo $user_id ?>'>
                <div class="col-md-6">
                    <label for="user_name" class="form-label">Class Id: </label>
                    <input type="text" class="form-control" id="class_id" name="class_id" value="<?php echo $class_id; ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="user_name" class="form-label">Subject Name: </label>
                    <input type="text" class="form-control" id="subject_name" name="subject_name">
                </div>
                <div class="col-md-4">
                    <label for="user_type" class="form-label">Is Archive: </label>
                    <select id="is_archived" name="is_archived" class="form-select">
                        <option value="1">Archive</option>
                        <option value="0">Not Archive</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="user_type" class="form-label">Assign Teacher: </label>
                    <select id="teacher_id" name="teacher_id" class="form-select">
                        <?php
                        foreach ($teacher as $value) {
                            echo "<option value='$value->user_id'>$value->user_name</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Add Subject</button>
                </div>
            </form>
        </div>
    </div>
    <?php include "inc/footer.php"; ?>