<?php require "header.php" ?>
<?php require "db.php";?>
<?php  
session_start();
$name="";
$pass="";
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty($email || $password)){
        $chk_sql = "";
    }
    else{
    $chk_sql = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
    $chk_result = $con->query($chk_sql);
    while($row = mysqli_fetch_assoc($chk_result)){
        $name = $row['email'];
        $pass = $row['password'];
        $id = $row['id'];
    }
    if($email !== $name || $password !== $pass){
        
        $_SESSION['message'] = 'sorry, this email and password is not register...';
        $_SESSION['msg_type'] = 'danger';
    
    } 
    else{
    $_SESSION['id'] = $id;   
     header('location:lists.php'); 
    
    }
  }
}



?>
<div class="nav">
          <h5>Admin Login Page</h5>
    </div>

<?php require "alert.php" ?>
    <div class="signup">
        <strong>Sign in</strong>
    </div>
<br>
<br>
<div id="form">
    <form action="login.php" method="post">
       <div class="row">
           <div class="col-md-12">
               <label for="">Email Address</label>
               <input type="text" name="email" class="form-control">
           </div>
       </div> 
       <div class="row">
           <div class="col-md-12">
               <label for="">Password</label>
               <input type="password" name="password" class="form-control">
           </div>
       </div> <br>
       <div class="row">
           <div class="col-md-12">
               <input type="submit" name="login" value="Sign in now" class="btn btn-primary form-control">
           </div>
       </div> 
    </form>
</div>