<?php
include "inc/header.php";
?>
<title>Index</title>
</head>

<body>
    <?php include "inc/nav.php"; ?>
    <div class="container">
        <!-- <div class="card shadow">
            <div class="card-body yasin">This is some text within a card body.</div>
        </div> -->
        <div class="row my-5">
            <div class="col-6">
                <h1 class="text-center">Sign In</h1>

                <form method="post" action="http://localhost:5000/users/login" class="row row-cols-lg-auto g-3 align-items-center">
                    <div class="col-12">
                        <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-text">@</div>
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username">
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="visually-hidden" for="inlineFormInputGroupUsername">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="login">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <script>
$("form").submit(function (event) {
    //const user_id = $("#user_id").val();
    var formData = {
    user_name: $("#user_name").val(),
    password: $("#password").val()
    };
    
    $.ajax({
      type: "POST",
      url: 'http://localhost:5000/users/login',
      crossDomain:true,
      data: formData,
      dataType: "json",
      encode: true
    }).done(function ( data ) {
      alert("ajax callback response:"+JSON.stringify(data));
      window.location.replace("http://www.w3schools.com");
   })
   
});
</script> -->
    <?php include "inc/footer.php"; ?>