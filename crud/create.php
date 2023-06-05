

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <fieldset>
        <legend>
            <h1>Contract</h1>
        </legend>
        <form action="deshboard.php" method="post">
            Name: <input type="text" name="Name" required><br><br>
            Email: <input type="text" name="Email" required><br><br>
            Gender: <input type="radio" name="Gender" required value="Male">Male
            <input type="radio" name="Gender" required value="Female">Female<br><br>
            DoB: <input type="text" name="DoB" required><br><br>
            Mobile: <input type="number" name="Mobile" required><br><br>
            Address: <input type="text" name="Address" required><br><br>
            <input type="submit"><span> </span><a href="index.php" role="button">Cancel</a>


        </form>
    </fieldset>

</body>

</html>