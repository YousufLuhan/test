<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        /* background: #6fd5e659; */
    }

    .container {
        display: flex;
        align-items: center;
        flex-direction: column;
        height: 100vh;
        padding: 20px;
        background-color: rgb(45, 51, 58);

    }

    .form-wrapper {
        padding: 40px;
        background-color: rgb(193, 193, 193);
        border-radius: 10px;

    }

    .form-item {
        display: flex;
        justify-content: center;
    }

    input {
        padding: 5px;
        margin: 5px 0;
        border: none;
        outline: none;
        border: 2px solid;
        border-radius: 5px;
        font-size: 15px;
    }

    label {
        padding: 5px;
        font-size: 18px;
    }


    #submit {
        background-color: rgb(4, 170, 109);
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        font-size: 15px;
        border-radius: 10px;
    }

    #submit:hover {
        transition: ease 0.5s all;
        background-color: rgb(4, 170, 10);
        color: whitesmoke;
    }

    #studentimage {
        /* height: 100px;
        width: 100px; */
        border: 2px solid;
    }

    h2 {
        color: whitesmoke;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Student Registration From</h2>
        <div class="form-wrapper">
            <form action="list.php" method="post" enctype="multipart/form-data">
                <div class="form-item">
                    <label for="fullname">Student Image:</label>
                    <input type="file" name="studentimage" id="studentimage" required>
                    <p>(less than 5 Mb)</p>
                </div>
                <div class="form-item">
                    <label for="fullname">Student Name:</label>
                    <input type="text" name="fullname" id="fullname" placeholder="Full Name" required>
                </div>
                <div class="form-item">
                    <label for="username">Father's Name:</label>
                    <input type="text" name="fname" id="fathersname" placeholder="Father's Full Name" required>
                </div>
                <div class="form-item">
                    <label for="username">Mother's Name:</label>
                    <input type="text" name="mname" id="mothersname" placeholder="Mother's Full Name" required>
                </div>

                <div class="form-item">
                    <div class="genders">
                        <label for="gender">Gender:</label>
                        <input type="radio" name="gender" id="gender" value="male" required>Male
                        <input type="radio" name="gender" id="gender" value="female">Female
                        <input type="radio" name="gender" id="gender" value="other">Other
                    </div>
                </div>
                <div class="form-item">
                    <label for="email">Date of Birth</label>
                    <input type="date" name="DOB" id="DOB" required>
                </div>
                <div class="form-item">
                    <label for="department">Groups:</label>
                    <select name="groups" id="department">
                        <option value="science">Science</option>
                        <option value="arts">Arts</option>
                        <option value="commerce">Commerce</option>
                    </select>
                </div>

                <div class="form-item">
                    <label for="phonenumber">Tel/Mobile:</label>
                    <input type="tel" name="phonenumber" id="phonenumber" placeholder="XXX XXX XXXX" required>
                </div>
                <div class="form-item submit">
                    <input type="submit" name="submit" id="submit" value="submit" required>
                </div>
            </form>
        </div>


</body>

</html>