<!DOCTYPE html>
<html lang="en">
<style>
* {
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: rgb(45, 51, 58);
}

.elements {
    height: 70vh;
    width: 350px;
    background-color: rgb(255, 255, 255);
    padding: 30px;
    box-shadow: 0 4px 6px 0;
    border-radius: 10px;
    text-align: center;
}

h1 {
    text-align: center;
    margin-bottom: 5px;
}

input {
    width: 80%;
    padding: 10px;
    font-size: 20px;
    margin: 5px;


}

#btn {
    border-radius: 30px;
    cursor: pointer;
    background-color: rgb(4, 170, 109);
    text-align: center;
}

label {
    font-size: 20px;
    text-align: left;
}

.div1 {
    display: flex;
    justify-content: space-around;
}

#sign {
    background: none;
    border: none;
    padding: 2px;
    cursor: pointer;
    font-size: 20px;
    color: rgb(4, 170, 109);
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>

<body>
    <div class="container">
        <div class="elements">
            <h1>Sign up</h1>
            <form action="deshboard.php" method="post">
                <div class="div1">
                    <label for="name">Username:</label><br>
                    <span>Already have an account? <a href="login.php" id="sign">Log in</a></span>
                </div>
                <input type="text" name="name" placeholder="Enter your Name" required>
                <label for="email">Email:</label>
                <input type="email" placeholder="Enter your Email" name="email" required><br><br>
                <label for="password">Password:</label><br>
                <input type="password" placeholder="Enter your Password" name="password" required><br><br>
                <input type="submit" value="Signup in" id="btn">
            </form>
        </div>
    </div>

</body>
</html>