<?php
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
?>