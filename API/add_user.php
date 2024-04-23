<?php 
  include "inc/header.php";
  
  if(isset($_POST['addUser'])){
    $user_id = $_POST['user_id'];
    echo $user_id;
  }
?>
    <title>User registration</title>
</head>
<body>
<?php include "inc/nav.php";?>
<div class="container">
    <div class="row">
        <h1 class="text-center">User registration</h1>
        <form class="row g-3" action="http://localhost:5000/users/register" method="post">
            <input type='hidden' name='user_id' value='<?php echo $user_id ?>'>
            <div class="col-md-6">
                <label for="user_name" class="form-label">User Name: </label>
                <input type="text" class="form-control" id="user_name" name="user_name">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Password: </label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-12">
                <label for="first_name" class="form-label">First Name: </label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Yasin">
            </div>
            <div class="col-12">
                <label for="last_name" class="form-label">Last Name: </label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Arafat">
            </div>
            <div class="col-md-4">
                <label for="user_type" class="form-label">User Type: </label>
                <select id="user_type" name="user_type" class="form-select">
                <option selected>Choose...</option>
                <option value="admin">Admin</option>
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
        </form>
    </div>
</div>
<?php include "inc/footer.php"; ?>
