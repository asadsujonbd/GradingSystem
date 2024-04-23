<?php
$file= $_FILES['inputfile']['name'];
echo $file;
    if(isset($_POST['uploadFile'])){
        //inputfile
        $file= $_FILES['inputfile']['name'];
        $user_id = $_POST['user_id'];
        echo $file;
        echo $user_id;
        
        //header("Location: http://localhost:5000/tests/importGrades/$user_id/$file");
        //exit;
    }
    if(isset($_POST['addClass'])){
        header("Location: add_class.php");
        exit;
    }
    if(isset($_POST['editClass'])){
        $class_id = $_POST['editClass'];
        echo $class_id;
    }
    if(isset($_POST['assignClass'])){
        $class_id = $_POST['assignClass'];
        echo $class_id;
    }
    if(isset($_POST['deleteClass'])){
        $class_id = $_POST['deleteClass'];
        echo $class_id;
        header("Location: http://localhost:5000/classes/$class_id",$_DELETE);
        exit;
    }
