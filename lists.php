<?php 
     session_start();
     require "header.php";
      require "db.php";

      if(!$_SESSION['id']){
          header('location:login.php');
      }
?>
<?php
      if(isset($_GET['delete'])){
          $del_id = $_GET['delete'];
          $del_sql = "DELETE FROM registration WHERE id='$del_id'";
          $del_res = $con->query($del_sql);
          if($del_res){
              echo "<script>alert('are you sure to delete this id?')</script>";
          }
          else{
              echo "failed".mysqli_error($del_res);
          }
      }
?>
<div class="nav">
          <h5>View All Users Lists</h5>
    </div>

<?php require "alert.php" ?>
    <div class="signup">
        <strong>Users List</strong>
    </div>
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email Address</th>
            <th>Phone Number</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    <?php
    $select_sql = "SELECT * FROM registration";
    $select_result = $con->query($select_sql);
    while($row = mysqli_fetch_assoc($select_result)){
        $name = $row['firstname'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $list_id =$row['id'];
    ?>
        <tr>
            <td><?php echo $name;?></td>
            <td><?php echo $email;?></td>
            <td><?php echo $mobile;?></td>
            <td><a href="index.php?edit=<?php echo $list_id; ?>">Edit</a>|<a href="lists.php?delete=<?php echo $list_id ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>



