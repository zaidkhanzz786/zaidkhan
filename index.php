<?php
    // Initialize insert flag
    $insert = false;

    if(isset($_POST["StudentName"])){ 
        // Database connection details
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "davmalighat"; // Add your database name here

        // Connect to MySQL
        $con = mysqli_connect($server, $username, $password, $database);

        // Check connection
        if(!$con){
            die("Connection to this database failed: " . mysqli_connect_error());
        }

        // Get form data and sanitize inputs
        $StudentName = mysqli_real_escape_string($con, $_POST['StudentName']);
        $StudentClass = mysqli_real_escape_string($con, $_POST['StudentClass']);
        $StudentRoll = mysqli_real_escape_string($con, $_POST['StudentRoll']);
        $StudentAdm = mysqli_real_escape_string($con, $_POST['StudentAdm']);
        $dob = mysqli_real_escape_string($con, $_POST['dob']);

        // Corrected SQL query
        $sql = "INSERT INTO studentdetails (StudentName, StudentClass, StudentRoll, StudentAdm, dob)
                VALUES ('$StudentName', '$StudentClass', '$StudentRoll', '$StudentAdm', '$dob')";

        // Execute the query
        if(mysqli_query($con, $sql)){
            $insert = true;
        } else {
            echo "ERROR: $sql <br>" . mysqli_error($con);
        }

        // Close the connection
        mysqli_close($con);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sem-2-First-Website</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Header styling */
        .header {
            height: 100px;
            background-color: rgb(48, 48, 236);
        }

        .headhtag {
            text-align: center;
            color: white;
            padding-top: 20px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        /* Form section */
        .formFillLeft {
            height: auto;
            padding: 20px;
            border: 1px solid black;
            background-color: rgb(239, 239, 91);
        }

        .formFillRight {
            height: 400px;
            border: 1px solid black;
        }

        /* Label Styling */
        label {
            font-weight: bold;
            font-size: 20px;
            display: block;
            margin-top: 10px;
        }

        /* Input Styling */
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #333;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Better input focus effect */
        input:focus {
            outline: none;
            border-color: blue;
            box-shadow: 0 0 5px rgba(0, 0, 255, 0.5);
        }

        button {
            width: 20%;
            height: 50px;
            float: right;
            position: relative;
            top: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- header -->
            <div class="col-lg-12 header">
                <h2 class="headhtag">DAV PUBLIC SCHOOL MALIGHAT MUZAFFARPUR ADMIT CARD GENERATOR SOFTWARE..</h2>
            </div>
            <!-- formFill -->
            <div class="col-lg-6 formFillLeft">
                <form action="indexx.php" method="post">
                    <label for="StudentName">Student Name</label>
                    <input type="text" name="StudentName" id="StudentName" placeholder="Enter Student Name" required>

                    <label for="StudentClass">Class :</label>
                    <input type="text" name="StudentClass" id="StudentClass" placeholder="Enter Class" required>

                    <label for="StudentRoll">Student Roll :</label>
                    <input type="text" name="StudentRoll" id="StudentRoll" placeholder="Enter Student Roll" required>

                    <label for="StudentAdm">Adm no</label>
                    <input type="text" name="StudentAdm" id="StudentAdm" placeholder="Enter Adm Num" required>

                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob" required>

                    <?php
                    if($insert){
                        echo "<p style='color: green;'>Submitted Successfully 100%</p>";
                    }
                    ?>
                    
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div class="col-lg-6 formFillRight"></div>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>
