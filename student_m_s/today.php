<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3 align="center">Search your Date</h3>
    <form action="" method="post" align="center">
        <input type="date" placeholder="Enter your Date" name="search">
        <input type="submit" name="submit">
    </form>

    <table border="1" align="center">

        <?php
require("connection.php");
$rs = null;
if(isset($_POST["submit"])){
$name = $_POST["search"];
// $date = "SELECT EXTRACT(day FROM Date) from payment";
$sql = "select * from payment where Date like '%$name%'";
$result = $connection->query($sql);
if($result){
   $r = mysqli_num_rows($result);
   if($r > 0){
    echo "<thead>
    <tr>
    <th>ID</th>
    <th>Amount</th>
    <th>Purpose</th>
    <th>Date</th>
    <th>Receiver</th>
    <th>StudentID</th>
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
        <td>$row[Amount]</td>
        <td>$row[Purpose]</td>
        <td>$row[Date]</td>
        <td>$row[Receiver]</td>
        <td>$row[StudentID]</td>
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

</body>

</html>