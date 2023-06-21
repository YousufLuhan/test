<?php
require("connection.php");
$dis = null;
if($_SERVER["REQUEST_METHOD"]=== "GET"){
     
     $id = $_GET["id"];
    $sql = "SELECT * FROM student_details WHERE ID = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

   $id = $row['ID'];
   $name = $row['Name'];
   $fname = $row['FathersName'];
   $mname = $row['MothersName'];
   $gender =  $row['Gender'];
   $dob = $row['DoB'];
   $section = $row['Section'];
   $phone = $row['Phone'];
   $image = $row['Image'];

   
}else{
    
    $name = $_POST["fullname"];
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $gender = $_POST["gender"];
    $DoB = $_POST["DOB"];
    $groups = $_POST["groups"];
    $phone = $_POST["phonenumber"];
    $newImage = $_FILES["new"]["name"];
    $oldImage = $_POST["old"];

    if($newImage != ""){
        $actualImage = "images/".$newImage;
        move_uploaded_file($_FILES["new"]["tmp_name"],$actualImage);
        unlink($oldImage);

    }else{
        $actualImage = $oldImage;
    }

    $id = $_GET["id"];
    $sql = "UPDATE student_details SET Image = '$actualImage',
    Name = '$name',FathersName = '$fname',MothersName = '$mname', Gender = '$gender',DoB ='$DoB',Section = '$groups',Phone = '$phone' WHERE  ID = $id";
     $result = $connection->query($sql);  
     echo "Update successfully";  
     header("location:list.php");
     exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        /* background: #6fd5e659; */
    }

    .container {
        display: flex;
        align-items: center;
        flex-direction: column;
        height: 100vh;
        padding: 20px;
        background-color: rgb(45, 51, 58);

    }

    .form-wrapper {
        padding: 40px;
        background-color: rgb(193, 193, 193);
        border-radius: 10px;

    }

    .form-item {
        display: flex;
        justify-content: center;
    }

    input {
        padding: 5px;
        margin: 5px 0;
        border: none;
        outline: none;
        border: 2px solid;
        border-radius: 5px;
        font-size: 15px;
    }

    label {
        padding: 5px;
        font-size: 18px;
    }


    #submit {
        background-color: rgb(4, 170, 109);
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        font-size: 15px;
        border-radius: 10px;
    }

    #submit:hover {
        transition: ease 0.5s all;
        background-color: rgb(4, 170, 10);
        color: whitesmoke;
    }

    #studentimage {
        /* height: 100px;
        width: 100px; */
        border: 2px solid;
    }

    h2 {
        color: whitesmoke;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Student Edit From</h2>
        <div class="form-wrapper">
            <form action="" method="post" enctype="multipart/form-data">
                <p align="center"><img src="<?php echo $image?>" alt="" width="100px" height="100px"></p>
                <div class="form-item">
                    <label for="fullname">Student Image:</label>
                    <input type="hidden" name="old" id="studentimage" value="<?php echo $image?>">
                    <input type="file" name="new" id="studentimage"">
                    <p>(less than 5 Mb)</p> 
                </div>
                <div class=" form-item">
                    <label for="fullname">Student Name:</label>
                    <input type="text" name="fullname" id="fullname" placeholder="Full Name" value="<?php echo $name?>"
                        required>
                </div>
                <div class="form-item">
                    <label for="username">Father's Name:</label>
                    <input type="text" name="fname" id="fathersname" placeholder="Father's Full Name" required
                        value="<?php echo $fname?>">
                </div>
                <div class="form-item">
                    <label for="username">Mother's Name:</label>
                    <input type="text" name="mname" id="mothersname" placeholder="Mother's Full Name" required
                        value="<?php echo $mname?>">
                </div>

                <div class="form-item">
                    <div class="genders">
                        <label for="gender">Gender:</label>
                        <input type="radio" name="gender" id="gender" value="male" required <?php
                        if($gender == "male"){
                            echo "checked";
                        }else{
                            echo "unchecked";
                        }
                        ?>>Male
                        <input type="radio" name="gender" id="gender" value="female" <?php
                        if($gender == "female"){
                            echo "checked";
                        }else{
                            echo "unchecked";
                        }
                        ?>>Female
                        <input type="radio" name="gender" id="gender" value="other" <?php
                        if($gender == "other"){
                            echo "checked";
                        }
                        ?>>Other
                    </div>
                </div>
                <div class="form-item">
                    <label for="email">Date of Birth</label>
                    <input type="date" name="DOB" id="DOB" required value="<?php echo $dob?>">
                </div>
                <div class="form-item">
                    <label for="department">Groups:</label>
                    <select name="groups" id="department">
                        <option value="science" <?php
                        if($section == "science"){
                            echo "selected";
                        }
                        ?>>Science</option>
                        <option value="arts" <?php
                        if($section == "arts"){
                            echo "selected";
                        }
                        ?>>Arts</option>
                        <option value="commerce" <?php
                        if($section == "commerce"){
                            echo "selected";
                        }
                        ?>>Commerce</option>
                    </select>
                </div>

                <div class="form-item">
                    <label for="phonenumber">Tel/Mobile:</label>
                    <input type="tel" name="phonenumber" id="phonenumber" placeholder="XXX XXX XXXX" required
                        value="<?php echo $phone?>">
                </div>
                <p><?php echo $dis?></p>
                <div class="form-item submit">
                    <input type="submit" name="submit" id="submit" value="Update" required>
                </div>

            </form>
        </div>


</body>

</html>