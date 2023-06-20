<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <style>
    input {
        padding: 10px;
        font-size: 18px;
    }
    </style>
</head>

<body>
    <h3 align="center">Search your Name or Phone</h3>
    <form action="" method="post" align="center">
        <input type="text" placeholder="Enter your Name or Phone" name="search">
        <input type="submit" name="submit">
    </form>
    <h1></h1>
    <table border="1" align="center">

        <?php
        require("connection.php");

    if(isset($_POST["submit"])){
        $name = $_POST["search"];
        $sql = "select * from student_details where Name like '%$name%' or Phone like '%$name%'";
        $result = $connection->query($sql);
        if($result){
           $r = mysqli_num_rows($result);
           if($r > 0){
            echo "<thead>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>FathersName</th>
            <th>MothersName</th>
            <th>Gender</th>
            <th>DoB</th>
            <th>Groups</th>
            <th>Phone</th>
            <th>Image</th>
            </tr>
        </thead>
            <tbody>
            
            ";
             while($row = $result->fetch_assoc()){
                echo "
                  <tr>
                <td><a href = 'payment.php?id=$row[ID]'>$row[ID]</td>
                <td>$row[Name]</td>
                <td>$row[FathersName]</td>
                <td>$row[MothersName]</td>
                <td>$row[Gender]</td>
                <td>$row[DoB]</td>
                <td>$row[Section]</td>
                <td>$row[Phone]</td>
                <td>$row[Image]</td>
                  </tr>
                  </tbody>
                  ";
                  }
           }else{
            echo "<h2 align = 'center'>Not Found any data!<h2>";
           }    
        }    
    }
?>
    </table>
    <a href="admin.php">Cancel</a>
</body>

</html>