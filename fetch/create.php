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
        <form method="post" action="desh.php">
            Name: <input type="text" name="Name" required><br><br>
            Age: <input type="text" name="Age" required><br><br>
            Gender: <input type="radio" name="Gender" required value="Male">Male
            <input type="radio" name="Gender" required value="Female">Female<br><br>
            Mobile: <input type="number" name="Mobile" required><br><br>
            Address: <input type="text" name="Address" required><br><br>
            <input type="submit" name="submit"><span> </span><a href="fetch.php" role="button">Cancel</a>
        </form>
    </fieldset>

</body>

</html>