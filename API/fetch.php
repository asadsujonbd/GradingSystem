<?php
    $url = 'http://localhost:5000/all_user'; // path to your JSON file
    $data = file_get_contents($url); // put the contents of the file into a variable
    $characters = json_decode($data); // decode the JSON feed
    
    //echo $characters[0]->user_name;
    
    foreach ($characters as $character) {
        echo $character->user_name . '<br>';
        echo $character->last_name . '<br>';
        if($character->user_name == 'yasin'){
            echo 'you are logged in';
        }
        else{
            echo 'missmatch';
        }
    }

?>
