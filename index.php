<?php
    session_start();
    if(isset($_GET['submit'])){
        $instructor_email = $_GET['username'];
        $pasword = $_GET['password'];
       
        include('config.php');
        // 3- Preapare Query
        $sql = "SELECT *
                FROM instructors
                WHERE email = '$instructor_email' and password = '$pasword'
                 ";
        // 4- Execute Query
        $result = mysqli_query($con ,$sql);        
        if(mysqli_num_rows($result)==1){
            header('location:view_courses.php');
            $rows = mysqli_fetch_all($result , MYSQLI_ASSOC);
            
            foreach($rows as $row){
                $_SESSION['instructor_name'] =  $row['instructor_name']; //set
                $_SESSION['instructor_id'] =  $row['id']; //set
            }            
        }else{
            $error = '<div class="alert alert-danger">Incorrect email or Password</div>';
        }
       
    }
    include('header.php');
?>

<div class="form">

<form>
<?php if(isset($error)){echo $error;}?>
  <!-- Email input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1Example1">Email address</label>
    <input type="email" id="form1Example1" class="form-control" name="username" />
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1Example2">Password</label>
    <input type="password" id="form1Example2" class="form-control" name="password"  />
   
  </div>

 
  <!-- Submit button -->
  <button type="submit" name="submit" value="Login" class="btn btn-primary btn-block">Sign in</button>
 
</form>
</div>
<?php  include('footer.php');?>
<?php 
  if(isset($_GET['logout'])){
    session_destroy();
  }
 ?>