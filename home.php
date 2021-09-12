<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
    <title>Project</title>
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            background-color: whitesmoke;
            margin: 10px;
        }

        #container {
            width: 100%;
            font-size: 19px;
        }

        aside {
            float: left;
            text-align: center;
            border: 1px solid gray;
            padding: 10px;
            width: 300px;
            background-color: #e4eaec;
            line-height: 30px;
        }

        main {
            float: right;
            padding: 5px;
            border: 1px solid gray;
        }

        input {
            padding: 4px;
            border: 1px solid black;
            text-align: center;
            font-size: 17px;
            font-weight: bold;
        }

        .btn-add {
            border: none;
            border-radius: .25rem;
            border: 1px solid #007bff;
            color: #007bff;
            background-color: white;
            font-size: 20px;
            margin: 5px;
            width: 70px;
        }
        .btn-add:hover {
            background-color:  #007bff;
            color: white;
        }

        .btn-delete {
            border: none;
            border-radius: .25rem;
            border: 1px solid red;
            color: red;
            background-color: white;
            font-size: 20px;
            margin: 5px;
            width: 70px;
        }
        .btn-delete:hover {
            background-color: red;
            color: white;
        }

        #data {
            width: 860px;
            font-size: 20px;
            font-weight: bold;
        }
        .th {
            background-color: silver;
            color: black;
            font-weight: bold;
            font-size: 20px;
            padding: 10px;
        }
        td {
            text-align: center;
            background-color: white;
            color: red;
            font-weight: bold;
            font-size: 20px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php 
        // connect database
        $host = "localhost";
        $user = "root";
        $pass = '';
        $db = "...";  // database name
        $connect = mysqli_connect($host , $user , $pass , $db);  // connect to database
        $result = mysqli_query($connect , "select * from ... "); // contain all data in database

        // variable
        $id = "";
        $name = "";
        $address = "";
        
        if ( isset($_POST['id']) ) {
            $id = $_POST['id'];
        }

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
        }

        if ( isset($_POST['address']) ) {
            $address = $_POST['address'];
        }

        $sql = '';

        // click on Add button
        if ( isset($_POST['add']) ) {
            $sql = "insert into ... value($id , '$name' , '$address')";     // Add data to database
            mysqli_query($connect , $sql);
            header("location: home.php");
        }

        // click on Delete button
        if ( isset($_POST['delete']) ) {
            $sql = "delete from ... where name = '$name' ";
            mysqli_query($connect , $sql);
            header("location: home.php");
        }
    ?>
    <div id="container">
        <form method="POST">
            <!-- Admin Panel -->
            <aside>
                <div id="details">
                    <img src="data:image/png;base64,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" alt="logo" width="70px">
                    <h3>Admin Panel</h3>

                    <label for="id">ID: </label><br>
                    <input type="text" name="id" id="id"><br>

                    <label for="name">Name: </label><br>
                    <input type="text" name="name" id="name" required><br>

                    <label for="add">Address</label><br>
                    <input type="text" name="address" id="add"><br><br>

                    <button class="btn-add" name="add">Add</button>
                    <button class="btn-delete" name="delete">Delete</button>

                </div>
            </aside>

            <!-- Display Data -->
            <main>
                <table id="data">
                    <tr>
                        <th class="th">ID</th>
                        <th class="th">Name</th>
                        <th class="th">Address</th>
                    </tr>
                    <?php
                    while ( $row = mysqli_fetch_array($result) ) {  // Display data
                        echo '<tr>';
                        echo '<td>'.$row['id'].'</td>';     // display id
                        echo '<td>'.$row['name'].'</td>';    // display name
                        echo '<td>'.$row['address'].'</td>';  // display address
                        echo '</tr>';
                    }
                    ?>
                </table>
            </main>
        </form>
    </div>
</body>
</html>