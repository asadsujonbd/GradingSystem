<?php
    // admin view
    if(isset($_POST['editSubject'])){
        $subject_id = $_POST['editSubject'];
        echo $subject_id;
    }
    if(isset($_POST['archiveSubject'])){
        $subject_id = $_POST['archiveSubject'];
        echo $subject_id;
        header("Location: http://localhost:5000/subjects/archive/$subject_id");
        exit;
    }
    
    // if(isset($_POST['deleteSubject'])){
    //     $subject_id = $_POST['deleteSubject'];
    //     header("Location: http://localhost:5000/users/$subject_id",$_DELETE);
    //     exit;
    // }
?>