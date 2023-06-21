<?php
require("connection.php");
if($_SERVER["REQUEST_METHOD"]=== "GET"){
     
    $id = $_GET["id"];
   $sql = "SELECT * FROM student_details WHERE ID = $id";
   $result = $connection->query($sql);
   $row = $result->fetch_assoc();

   $sql2 = "SELECT * FROM payment WHERE StudentID = $id";
   $result2 = $connection->query($sql2);
   
  
  $name = $row['Name'];
  $image = $row['Image'];
  $phone = $row['Phone'];
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
        <p align="center"><img src="<?php echo $image?>" alt="" width="100px" height="100px"></p>
        <h3 align="center"><?php  echo $name?></h3>
    </div>
    <table align="center" border="6">
        <thead>
            <tr>
                <th>Purpose</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <ol><?php
                    $r = null;
                    while($row2 = $result2->fetch_assoc()){
                        global $rs;
        $totall = (int)($row2['Amount']);
       static $s = 0;
       $r = $s += $totall;
                        
                        if($row2 != ''){
                            echo"<li>". $row2["Purpose"]. " = ".$row2["Amount"]."TK"."</li>"."<hr><br/>";
                        }
                       }
                ?></ol>
                </td>
            </tr>
            <tr>
                <td><?php echo "Totall =".$r?></td>

            </tr>
        </tbody>

    </table>

</body>

</html>