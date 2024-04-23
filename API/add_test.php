<?php 
  include "inc/header.php";
  if(isset($_POST['select_subject'])){
    $userId = $_POST['user_id'];
    $subjectId = $_POST['select_subject'];
    echo $userId;
    echo $subjectId;
  }
?>
    <title>Index</title>
</head>
<body>
<?php include "inc/nav.php";?>
<div class="container">
    <div class="row">
        <h1 class="text-center">Add Test</h1>
        <?php 
        echo '<form method="post" action="http://localhost:5000/tests/'.$subjectId.'">';
            echo "<input type='hidden' name= 'user_id' value = ". $userId . ">";
        ?>
        <div class="form-group row">
            <label class="col-4 col-form-label">Test Name</label>
            <div class="input-group">
                <input type="text" class="form-control" name="test_name" placeholder="Test Name">
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label class="col-4 col-form-label">Date</label>
            <div class="col">
                <input type="datetime-local" class="form-control" name="date">
            </div>
        </div>
            <br>
        <!-- <div class="form-group row">
            <label class="col-4 col-form-label">Is Complete</label>
            <div class="input-group my-3">
                <input type='radio' name='is_completed' value='t' checked = 'true'>Complete 
                <input type='radio' name='is_completed' value='f'>Not Completed
            </div>
        </div>
        <br> -->
        <div class="col-4 col-form-label">
            <button type="submit" class="btn btn-primary" value = "addTest">Create Test</button>
        </div>
        </form>
    </div>
</div>
<?php include "inc/footer.php"; ?>