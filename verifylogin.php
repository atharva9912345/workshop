<!--verify login 
 decide if the credentials entered are correct -->
<?php
    @session_start();
    include 'connect.php';
    //setting variable using post array
    $user = $_POST['username'];
    $password = $_POST['password'];

    //check if the user exists in the user table
    $query = "select * from user where username = '$user'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);

    if(mysqli_num_rows($res) > 0){

        if(strcmp($row['password'],$password)==0){
        //if the user exists then create seesion variables emailid and password
        $_SESSION['username']=$user;
        $_SESSION['password']=$password;
        $_SESSION['email'] = $row['email'];
        $_SESSION['phone_no'] = $row['phone_no'];
        //redirect to explore page
        header('Location: explore.php');
    }
    //incorrect password
    else{
        echo "<script> alert('Invalid Password!') </script>";
        header('Location: index.php');
    }
}
    //if user is not found
    else {
        echo "<script> alert('User not found!') </script>";
        header('Location: index.php');
    }
?>