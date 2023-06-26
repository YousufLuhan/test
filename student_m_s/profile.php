<?php
require("connection.php");
$dis = null;
if($_SERVER["REQUEST_METHOD"]=== "GET"){
     
    $id = $_GET["id"];
   $sql = "SELECT * FROM student_details WHERE ID = $id";
   $result = $connection->query($sql);
   $row = $result->fetch_assoc();

   $sql2 = "SELECT * FROM payment WHERE StudentID = $id";
   $result2 = $connection->query($sql2);
   
  
   $id = $row['ID'];
   $name = $row['Name'];
   $fname = $row['FathersName'];
   $mname = $row['MothersName'];
   $gender =  $row['Gender'];
   $dob = $row['DoB'];
   $section = $row['Section'];
   $phone = $row['Phone'];
   $image = $row['Image'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <div class="container">
        <div align="center" style="border: 1px solid black;width:398px">
            <div class="form-wrapper">
                <p align="center"><img src="<?php echo $image?>" alt="" width="100px" height="100px"></p>
                <p>Name:<?php echo $name?></p>
                <p>Father'sName:<?php echo $fname?></p>
                <p>Mother'sName:<?php echo $mname?></p>
                <p>Gender:<?php echo strtoupper($gender)?></p>
                <p>DoB:<?php echo $dob?></p>
                <p>Section:<?php echo strtoupper($section)?></p>
                <p>Phone:<?php echo $phone?></p>
                <p><?php echo $dis?></p>
            </div>

        </div>
    </div>
    <div class="table">
        <table border="1" style="width: 400px;">
            <thead>
                <tr>
                    <th>Purpose</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>

                <?php
        $r = null;
        while($row2 = $result2->fetch_assoc()){
        global $rs;
        $totall = (int)($row2['Amount']);
        static $s = 0;
        $r = $s += $totall;
        if($row2 != ''){
            echo "
            <tr>
            <td>$row2[Purpose]</td>
            <td>$row2[Amount]</td>
            <td>$row2[Date]</td>
            </tr>
            ";
        }
        }
        ?>


                <tr align="right">
                    <td colspan="2"><?php echo "Totall =".$r?></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>