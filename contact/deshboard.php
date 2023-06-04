<?php
$Name = $_POST["name"];
$Email = $_POST["email"];
$Gender = $_POST["gender"];
$DoB = $_POST["birth"];
$Mobile = $_POST["mobile"];
$Address = $_POST["address"];



//connection
$conn = new mysqli("localhost","root","","optional");
if($conn->connect_error){
    die("Connection faild".$conn->connect_error);
}else
{
// Prepare and execute the query
$query = "SELECT Mobile,Email FROM details";
$result = $conn->query($query);

// Fetch data as an array
$resultArray = [];
while ($row = $result->fetch_assoc()) {
    $resultArray[] = $row;
}



$resultLen = count($resultArray);
      $match_mobile = '';
      $match_email = '';

      //checked already have number or email;
    for($i = 0;$i < $resultLen; $i++){
        //echo empty($match_email);

        if($resultArray[$i]["Mobile"] == $Mobile && $resultArray[$i]["Email"] == $Email){
            $match_mobile.=$resultArray[$i]["Mobile"];
            $match_email .= $resultArray[$i]["Email"];
            break;
        }

        if($resultArray[$i]["Mobile"] == $Mobile ){
            $match_mobile.=$resultArray[$i]["Mobile"];
            break;
        }  
        if($resultArray[$i]["Email"] == $Email){
            $match_email .= $resultArray[$i]["Email"];
            break;
        }
    } 
    }
    
    //function
    echo "
        <script>
        function back(){
            setTimeout(()=>{
                location.href = 'form.php';
            },3000);
        } 
        </script>";
   



     if(!empty($match_mobile)&& !empty($match_email) ){
        echo "<h1>Both Phone and Email already taken!</h1>";
        echo "
        <script>
        back();
        </script>
        ";
        
        

     }
    elseif(!empty($match_mobile)){
        echo "<h1>Already have this mobile number!</h1>";
        echo "
        <script>
        back();
        </script>
        ";

    }elseif(!empty($match_email)){
        echo "<h1>Already have this email!</h1>";
        echo "
        <script>
        back();
        </script>
        ";

    }
    else{
        $stmt = $conn->prepare("insert into details(Name,Email,Gender,DoB,Mobile,Address) 
        values(?,?,?,?,?,?)");
        $stmt->bind_param("ssssis",$Name,$Email,$Gender,$DoB,$Mobile,$Address);
        $stmt->execute();
        echo "<h1>Registation  Success</h1>";
        echo "
        <script>
        back();
        </script>
        ";
        $conn->close();

    };

?>