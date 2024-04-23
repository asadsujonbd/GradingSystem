<?php
include "inc/header.php";
?>
<title>Index</title>
</head>

<body>
    <?php include "inc/nav.php";
    //$url = 'http://localhost:5000/users/login'; // path to your JSON file

    //$data = file_get_contents($url); // put the contents of the file into a variable
    //$userId = json_decode($data); // decode the JSON feed

    $url2 = "http://localhost:5000/users/student/{$userId}";
    $url3 = "http://localhost:5000/users/student/grades/{$userId}";
    //echo $url2;
    $data2 = file_get_contents($url2); // put the contents of the file into a variable
    $characters2 = json_decode($data2);

    $data3 = file_get_contents($url3); // put the contents of the file into a variable
    $characters3 = json_decode($data3);
    echo '<br>';

    // var_dump($data2);

    // foreach ($data2 as $key => $value) {
    //   // $arr[3] will be updated with each value from $arr...
    //   echo "{$key->class_id} => {$value->class_id} ";
    //   print_r($data2);
    // }
    ?>
    <div class="container">
        <h3>subject_grades</h3>
        <form action="edit_student.php" method="post">
            <?php echo "<button type = 'submit' id='editStudent' name='editStudent' value= '$userId' class='btn btn-secondary'>" . "Edit"  . "</button>"; ?>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Subject id</th>
                    <th scope="col">Average Grade</th>
                    <!-- <th scope="col">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($characters3 as $value) {
                    echo "<tr>";
                    echo "<td> $value->subject_id </td>";
                    echo "<td> $value->AverageGrade </td>";
                    //echo "<td><button class='btn btn-info' onclick='location.href=\"http://localhost:5000/api/v1/get_all_subject_grades/$value->subject_id\"' value= '$value->subject_id' >" . "Details"  . "</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="container">
        <h3>list all assigned subjects</h3>
        <table class="table">
            <thead>
                <tr>
                    <!-- <th scope="col">Class id</th> -->
                    <th scope="col">Subject id</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Is Archived </th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($characters2 as $value) {
                    echo "<tr>";
                    //echo "<td> $value->class_id </td>";
                    echo "<td> $value->subject_id </td>";
                    echo "<td> $value->subject_name </td>";
                    echo "<td> $value->is_archived </td>";
                    echo '<form action="test_grades.php" method="post">';
                    echo "<input type='hidden' name='user_id' value='$userId'>";
                    echo "<td><button class='btn btn-info' name='selectSubject' value= '$value->subject_id' >" . "Details"  . "</button></td>";
                    echo '</form>';
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include "inc/footer.php"; ?>