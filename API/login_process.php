<?php
    if(isset($_POST['login']))
    {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $url = 'http://localhost:5000/all_user'; // path to your JSON file
        $data = file_get_contents($url); // put the contents of the file into a variable
        $items = json_decode($data); // decode the JSON feed	 

        foreach ($items as $item) {
            echo $item->user_name;
            echo $item->last_name;
            if($item->user_name == 'yasin'){
                echo 'you are logged in';
            }
            else{
                echo 'missmatch';
            }
        }

        
        $sql = "select fsr_login('$name','$pass')";
        $result = pg_query($db, $sql);
        while($row = pg_fetch_row($result)){
            $id = $row[0];
        }
        if ($id != null) {
            $_SESSION["fsr_if_id"] = $id;
            header("Location: fsr_if.php");
            exit();
        }
        else {
            //header("Location: fsr_login.php");
            echo "<script language='javascript'>";
            echo "if(!alert('Wrong User Name or Password')){
                location.replace('fsr_login.php')
            }";
            echo "</script>";
        }
    }
?>