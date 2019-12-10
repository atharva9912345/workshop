<?php
@session_start();
include('connect.php');

$username=$_SESSION['username'];

if (isset($_POST['submitbtn'])){

$title=$_POST['title'];
$content=$_POST['comment'];
$date = date("Y/m/d");

// $query1 = "SELECT * FROM `article` WHERE username = '$username'";
// $res1 = mysqli_query($conn,$query1);
// if(mysqli_num_rows($res1)>0){
//     echo "Record already exists!!";
// }

$query = "INSERT INTO `details`(`username`, `date`, `title`, `content`) VALUES ('$username','$date','$title','$content')";
$res = mysqli_query($conn, $query);

?>
<script>
    alert('Post Uploaded!');
    window.location.href = "explore.php";
</script>

<?php
}
else{
    ?>
    <script>
    alert('Error!!');
    window.location.href = "explore.php";
    </script>
    <?php
}

?>