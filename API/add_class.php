<?php
include "inc/header.php";
if (isset($_POST['addClass'])) {
    $user_id = $_POST['user_id'];
    echo $user_id;
}
?>
<title>Add Class</title>
</head>

<body>
    <?php include "inc/nav.php"; ?>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Add Class</h1>
            <form class="row g-3" action="http://localhost:5000/classes" method="post">

                <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
                <div class="col-md-6">
                    <label for="user_name" class="form-label">Class Name: </label>
                    <input type="text" class="form-control" id="class_name" name="class_name">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Add Class</button>
                </div>
            </form>
        </div>
    </div>
    <?php include "inc/footer.php"; ?>