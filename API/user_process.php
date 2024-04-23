<?php

    if(isset($_POST['login'])){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        echo $user_name;
        echo $password;
        $url4 = "http://localhost:5000/login/$user_name/$password";
        // $data4 = file_get_contents($url4);
        // $login = json_decode($data4);
        // foreach($login as $value){
        //     echo "$value->user_type";
        //     switch ($value->user_type) {
        //         case 'admin':
        //             header("Location: http://localhost/api/admin.php");
        //             break;
        //         case 'student':
        //             header("Location: http://localhost/api/student.php");
        //             break;
        //         case 'teacher':
        //             header("Location: http://localhost/api/teacher.php");
        //             break;    
        //         default:
        //             break;
        //     }
        // }
        
    // }
    // if(isset($_POST['addUser'])){
    //     header("Location: add_user.php");
    //     exit;
    // }
    if(isset($_POST['editUser'])){
        $userId = $_POST['editUser'];
        echo $userId;
    }
    // if(isset($_POST['deleteUser'])){
    //     $userId = $_POST['deleteUser'];
    //     header("Location: http://localhost:5000/users/$userId");
    //     exit;
    // }
    if(isset($_POST['updateAdmin'])){
        $user_id = $_POST['user_id'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_type = $_POST['user_type'];
        header("Location: add_user.php");
        exit;
    }
    // if(isset($_POST)){
    //     //print_r($_POST);
    //     // foreach($_POST as $value){
    //     //     echo $value->user;
    //     //     echo $value->type;
    //     //     echo $value->token;
    //     // }
    // }
?>