<?php 
ob_start();
session_start();
require "header.php";
require "db.php";
$submit=true;
$fname ="";
$lname="";
$mob="";
$org="";
$mail="";
?>
<?php
 
 if(isset($_GET['edit'])){
     $submit = false;
     $edit_id = $_GET['edit'];
     $show_sql = "SELECT * FROM registration WHERE id = $edit_id";
     $show_res = $con->query($show_sql);
     while($row = mysqli_fetch_assoc($show_res)){
         $fname = $row['firstname'];
         $lname = $row['lastname'];
         $org = $row['organization'];
         $mail = $row['email'];
         $mob = $row['mobile'];
         $id = $row['id'];



        
     }
 }
 //update details



?>
 

    <div class="nav">
          <h5>Event Registartion</h5>
    </div>
    <div id="alerts">
    <i id="alert"></i>
    </div>
   
    <div class="signup">
        <strong>Sign up</strong>
        <p>Already you have account?<a href="login.php">Sign in</a></p>
    </div>
    
        <form action="index.php" id="form" method="post" value="<?php echo $id; ?>">
       
            <div class="row">
                <div class="col-md-6" >
                    <label for="">Fist Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control error" value="<?php echo $fname;?>">
                    <small></small>
                </div>
                <div class="col-md-6">
                    <label for="">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control error" value="<?php echo $lname;?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Organization(optional)</label>
                    <input type="text" name="org" id="org" class="form-control error" value="<?php echo $org;?>">
                    <small></small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Email Address</label>
                    <input type="text" name="email" id="email" class="form-control error" value="<?php echo $mail;?>">
                    <small></small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Phone Number</label>
                    <input type="text" name="mobile" id="mobile" class="form-control error" value="<?php echo $mob;?>">
                    <small></small>
                </div>
            </div><br>
            <?php if($submit == true) :?>
            <div class="row">
                <div class="col-md-12">
                    
                    <input type="submit" id="register" name="signup"  value="sign up now" class="btn btn-primary form-control">
                </div>
            </div>
            <?php else: ?>
                <div class="row">
                <div class="col-md-12">
                    
                    <input type="submit" id="update" name="update_details"  value="Update" class="btn btn-primary form-control">
                </div>
            </div>
            <?php endif; ?>
            
        </form>
<script src="jquery-3.5.1.min.js"></script>
<script>
    
    $('#alerts').hide();
    $("document").ready(function(){
       
       $("#register").click(function(){
        
        debugger;
        $.ajax({
            url:'register.php',
            type:"post",
            data:$("#form").serialize(),
            success: the_function,
     });
     function the_function(response){
            
            $('#alert').html(response);
            
            
     }
     $('#form')[0].reset();
     
       });
      
    });
    
    $("document").ready(function(){
     
        $("#update").click(function(){
            debugger;
            var id = $("form").attr("value");
            $.ajax({
                url:'update.php',
                type:"post",
                data:$("#form").serialize(id),
                success: update_function,
                
            });
            function update_function(response){
                $("#alert").html(response);
            }
        });
    });

    
</script>
<script src="script.js"></script>

</body>
</html>