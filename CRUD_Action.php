<?php
    session_start();
    if($_GET['action'] == 'Add Student'){
        $course_id = $_GET['course_id'];
        $stu_id = $_GET['stu_id'];
    
        include('config.php');
        // 3- Preapare Query
        $sql = "INSERT INTO students_courses VALUES (".$course_id." , ".$stu_id." )";
        // 4- Execute Query
        $result = mysqli_query($con ,$sql);
        if($result){
            $_SESSION['msg'] = '<div class="alert alert-success">Insert Successfully</div>';
        }else{
            $_SESSION['msg'] = '<div class="alert alert-danger">Insert Failed</div>';
        }
        
    }else if($_GET['action'] == 'delete'){
        $course_id = $_GET['course_id'];
        $stu_id = $_GET['stu_id'];
    
        include('config.php');
        // 3- Preapare Query
        $sql = "DELETE FROM students_courses WHERE course_id = $course_id  AND stu_id = $stu_id ";
        // 4- Execute Query
        $result = mysqli_query($con ,$sql);
        if($result){
            $_SESSION['msg'] = '<div class="alert alert-success">Delete Successfully</div>';
        }else{
            $_SESSION['msg'] = '<div class="alert alert-danger">Delete Failed</div>';
        }
       
    }else if($_GET['action'] == 'Update'){
        $stu_id = $_GET['stu_id'];
        $stu_name = $_GET['stu_name'];       
    
        include('config.php');
        // 3- Preapare Query
        $sql = "UPDATE students SET stu_name = '$stu_name' WHERE id = $stu_id ";
        // 4- Execute Query
        $result = mysqli_query($con ,$sql);
        if($result){
            $_SESSION['msg'] = '<div class="alert alert-success">Update Successfully</div>';
        }else{
            $_SESSION['msg'] = '<div class="alert alert-danger">Update Failed</div>';
        }
       
    }


    header('location:view_students.php');
    

?>