<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="2" align="center">
        <thead>
            <tr>
                <th>StudentID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //connection
            $conn = new mysqli("localhost","root","","university");
            //check connection
            if($conn->connect_error){
                die("Connection Failed".$conn->connect_error);
            }else{
                echo "Connect successfully <br>";
            };

            //connect databasetable;
            $sql = "select s.StudentID,s.Name,s.Age,s.Gender,sd.Phone,sd.Address from student_details sd inner join students s on sd.StudentID = s.StudentID";         
            $result = $conn->query($sql);

            //fetch each row;
            while($row = $result->fetch_assoc()){
                echo " <tr>
                <td>$row[StudentID]</td>
                <td>$row[Name]</td>
                <td>$row[Age]</td>
                <td>$row[Gender]</td>
                <td>$row[Address]</td>
                <td>$row[Phone]</td>
            </tr>";
            }
            ?>
        </tbody>


    </table>

</body>

</html>