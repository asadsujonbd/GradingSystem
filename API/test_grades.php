<?php
include "inc/header.php";
if (isset($_POST['selectSubject'])) {
    $user_id = $_POST['user_id'];
    $subject_id = $_POST['selectSubject'];
    echo $user_id;
    echo $subject_id;
    $url = "http://localhost:5000/subjects/details/$user_id/$subject_id";
    $data = file_get_contents($url); // put the contents of the file into a variable
    $list = json_decode($data);
}

?>
<title>Index</title>
</head>

<body>
    <?php include "inc/nav.php"; ?>
    <div class="container">
        <h3>list all test marks</h3>
        <table class="table">
            <thead>
                <tr>
                    <!-- <th scope="col">Class id</th> -->
                    <th scope="col">Test Name</th>
                    <th scope="col">Marks</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $value) {
                    echo "<tr>";
                    //echo "<td> $value->class_id </td>";
                    echo "<td> $value->test_name </td>";
                    echo "<td> $value->marks </td>";
                    echo '</form>';
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include "inc/footer.php"; ?>