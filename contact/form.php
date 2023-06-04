<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>

    </style>
</head>

<body>
    <fieldset>
        <legend>
            <h1>Contract</h1>
        </legend>
        <form action="deshboard.php" method="post">
            Name:<input type="text" name="name" required><br><br>
            Email:<input type="text" name="email" required><br><br>
            Gender:<input type="radio" name="gender" value="male" checked>Male
            <input type="radio" name="gender" value="Female">Female<br><br>
            Date of Birth:<input type="text" name="birth" required><br><br>
            Mobile:<input type="number" name="mobile" required><br><br>
            Address:<input type="text" name="address" required>
            <input type="submit">
        </form>
    </fieldset>

</body>

</html>