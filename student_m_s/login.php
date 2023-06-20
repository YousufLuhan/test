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

p {
    background-color: cadetblue;
    padding-bottom: 2px;
    margin-top: -15px;
    /* display: none; */
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>

<body>
    <div class="container">
        <div class="elements">
            <h1>Log in</h1>
            <form action="welcome.php" method="post">
                <div class="div1">
                    <label for="email">Email:</label><br>
                    <span>Need an account? <a href="signup.php" id="sign">Sign up</a></span>
                </div>
                <input type="email" placeholder="Enter your Email" name="email" required><br><br>
                <label for="password">Password:</label><br>
                <input type="password" placeholder="Enter your Password" name="password" required><br><br>
                <p style="background-color: white;" align='right'>Change password? <a href="change.php"
                        id="sign">Change</a></p>
                <input type="submit" value="Log in" id="btn">
            </form>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
function preventBack() {
    window.history.forward();
    console.log(window.history.forward());
}
setTimeout(preventBack, 0);
window.onunload = function() {
    null;
};
</script>