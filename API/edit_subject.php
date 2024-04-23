<?php
include "inc/header.php";
if (isset($_POST['editSubject'])) {
    $subject_id = $_POST['editSubject'];
    $user_id = $_POST['user_id'];
    $class_id = $_POST['class_id'];
    echo $class_id;
    echo $subject_id;
    echo $user_id;
    $url = "http://localhost:5000/users/teacher";
    $data = file_get_contents($url);
    $teacher = json_decode($data);
    $url2 = "http://localhost:5000/subjects/show/$subject_id";
    $data2 = file_get_contents($url2);
    $all_subject = json_decode($data2);
    foreach ($all_subject as $value) {
        $subject_name = $value->subject_name;
    }
    echo $subject_name;
}
?>
<title>Edit Subject</title>
</head>

<body>
    <?php include "inc/nav.php"; ?>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Edit Subject</h1>
            <form class="row g-3" action="http://localhost:5000/subjects/addEditSubject/editSubject" method="post">
                <input type='hidden' name='subject_id' value='<?php echo $subject_id ?>'>
                <input type='hidden' name='user_id' value='<?php echo $user_id ?>'>
                <div class="col-md-6">
                    <label for="user_name" class="form-label">Class Id: </label>
                    <input type="text" class="form-control" id="class_id" name="class_id" value="<?php echo $class_id; ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="user_name" class="form-label">Subject Name: </label>
                    <input type="text" class="form-control" id="subject_name" name="subject_name" value="<?php echo $subject_name; ?>">
                </div>
                <!-- <div class="col-md-4">
                    <label for="user_type" class="form-label">Is Archive: </label>
                    <select id="is_archived" name="is_archived" class="form-select">
                        <option value="1">Archive</option>
                        <option value="0">Not Archive</option>
                    </select>
                </div> -->
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
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
    <?php include "inc/footer.php"; ?>