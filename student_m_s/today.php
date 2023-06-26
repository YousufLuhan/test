<?php
$name = '';
$name2 = '';
$name3 = '';
if($_SERVER["REQUEST_METHOD"]==="POST"){
$name2 = trim($_POST["search2"]);
$name = trim($_POST["search"]);
$name3 = $_POST["search3"];

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3 align="center">Search By Date</h3>
    <form action="" method="post" align="center">
        From: <input type="date" name="search" value="<?php echo $name?>">
        To:<input type="date" name="search2" value="<?php echo $name2?>">
        <select name="search3" id="">
            <?php
            require("connection.php");
            $sql = "select * from student_details";
            $result = $connection->query($sql);
            while($row = $result->fetch_assoc()){
                echo "<option value = '$row[ID]'>$row[Name]</option>";
            }
            
          ?>
            <option value="">None</option>
        </select>
        <input type="submit" name="submit">
    </form>
    <p></p>
    <table border="1" align="center">
        <?php
require("connection.php");
$rs = null;
if(isset($_POST["submit"])){
$name2 = trim($_POST["search2"]);
$name = trim($_POST["search"]);
$name3 = $_POST["search3"];

$result = '';
//both data is not empty;
if($name != "" && $name2 != ""){
    $sql = "SELECT * FROM payment INNER JOIN student_details ON payment.StudentID = student_details.ID WHERE Date BETWEEN  '$name' and '$name2'";
    if($name3 !== ""){
        $sql .= "and StudentID like '%$name3%'";
       }
    $result = $connection->query($sql);
}

//if first_search is not empty and second is  empty; 
if($name !== "" &&  empty($name2)){
 $sql = "SELECT * FROM payment INNER JOIN student_details ON payment.StudentID = student_details.ID where Date like '%$name%'";
 if($name3 !== ""){
    $sql .= "and StudentID like '%$name3%'";
   }
 $result = $connection->query($sql);
}
//if first_search is empty and second is not empty; 
if(empty($name) && $name2 !== ""){

    $sql = "SELECT * FROM payment INNER JOIN student_details ON payment.StudentID = student_details.ID
    where Date like '%$name2%' ";
        if($name3 !== ""){
         $sql .= "and StudentID like '%$name3%'";
        }
        echo $name2," ",$name3;
       $result = $connection->query($sql);

   }
//if both search is empty;
   if(empty($name) && empty($name2)){
    $result = '';
    if($name3 !== null){
        $sql = "SELECT * FROM payment INNER JOIN student_details ON payment.StudentID = student_details.ID
        where StudentID like '%$name3%'";
        $result = $connection->query($sql);
     }
   }

if($result){
   $r = mysqli_num_rows($result);

   if($r > 0){
    echo "<thead>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Amount</th>
    <th>Purpose</th>
    <th>Date</th>
    <th>Receiver</th>
    <th>Action</th>
    </tr>
</thead>
    <tbody>
    
    ";

     while($row = $result->fetch_assoc()){
       global $rs;
        $totall = (int)($row['Amount']);
       static $s = 0;
       $rs = $s += $totall;
        echo "
          <tr>
        <td>$row[ID]</td>
        <td>$row[Name]</td>
        <td>$row[Amount]</td>
        <td>$row[Purpose]</td>
        <td>$row[Date]</td>
        <td>$row[Receiver]</td>
        <td>
            <a href = 'pedit.php?id=$row[ID]'>Edit</a>
            <a href = 'pdelete.php?id=$row[ID]'>Delete</a>
         </td>
          </tr>
          </tbody>
          ";
          }
   }else{
    echo "<h2 align = 'center'>Not Found any data!<h2>";
   }    
}    
}else{
    // header("location:report.php");
    // exit();
}


?>

        <tr>
            <td colspan="">Totall</td>
            <td colspan="6"><?php 
            if($rs != null){
                echo $rs;
            }else{
                echo "Null";
            }
            ?></td>
        </tr>
    </table>
    <p align="center"> <a href="admin.php">Back</a></p>
</body>

</html>