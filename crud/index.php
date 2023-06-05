<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
</head>

<body>
    <a href="create.php">Add New</a>
    <table border="5" align="center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>DoB</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "storehouse";

            //connection
            $connection = new mysqli($servername,$username,$password,$database);

            //check connection
            if($connection->connect_error){
                die("connection failed".$connection->connect_error);
            }else{
               // echo "Connect successfully";
            }

            //read all row from database table
            $sql = "SELECT * FROM clients";
            $result = $connection->query($sql);

            //read data of each row
            while($row = $result->fetch_assoc()){
                echo " <tr>
                <td>$row[ID]</td>
                <td>$row[Name]</td>
                <td>$row[Email]</td>
                <td>$row[Gender]</td>
                <td>$row[Birth]</td>
                <td>$row[Phone]</td>
                <td>$row[Address]</td>
                <td>
                    <a href='edit.php?id=$row[ID]'>Edit</a>
                    <a href='delete.php?id=$row[ID]'>Delete</a>
                </td>
            </tr> ";  
            }
            
            ?>
        </tbody>
    </table>
</body>

</html>