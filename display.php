<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" href="./style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section class="table-container">
        <div class="table-content">
            <div class="db-title">Display Record</div>

            <table class="table">
                <thead>
                    <tr class="tr">
                        <th>no.</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Email</th>
                        <th>Date Of Birth</th>
                        <th>Password</th>
                        <th>Repeat Password</th>

                        <th><i class="fa-solid fa-pen-to-square"></i></th>
                        <th><i class="fa-solid fa-trash"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    error_reporting(0);
                    $sql = "SELECT * FROM register";
                    $result = mysqli_query($conn, $sql);
                    $sno =1;
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        echo '<tr>';
                        echo '<td>' . $sno++ . '</td>';
                        echo '<td>' . $row['firstname'] . '</td>';
                        echo '<td>' . $row['lastname'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['dob'] . '</td>';
                        echo '<td>' . $row['password'] . '</td>';
                        echo '<td>' . $row['repeat_password'] . '</td>';
                        // echo "<input type='hidden' name='rollno' value='$rollno'>";
                        echo "
                        <td>   <a href='./edit.php?id=$id' title='Edit'>
        <button type='button' class='btnn' style='border:none; background:none;'>
           <i class='fa-solid fa-pen-to-square' style='color:green; font-size:18px;'></i>
        </button>
    </a></td>
                                        <td>
    <a href='./delete.php?id=$id' title='Delete'>
        <button type='button' class='btnn2' style='border:none; background:none;'>
            <i class='fas fa-trash-alt' style='color:red; font-size:18px;'></i>
        </button>
    </a>
</td>";
                        echo '</tr>';
                    }
                    ?>
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

</body>

</html>