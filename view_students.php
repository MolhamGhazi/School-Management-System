<?php
session_start();
if(isset($_GET['course_id'])){
    $_SESSION['course_id'] = $_GET['course_id'] ;
    $_SESSION['course_name'] = $_GET['course_name'] ;
    $course_id = $_GET['course_id'] ; 
    $course_name = $_GET['course_name'] ;
}else{
    $course_id = $_SESSION['course_id'];
    $course_name = $_SESSION['course_name'] ;
}
include('config.php');
// 3- Preapare Query
$sql = "SELECT id , stu_name
        FROM students , students_courses
        WHERE students_courses.stu_id = students.id
        AND course_id = $course_id";
// 4- Execute Query
$result = mysqli_query($con ,$sql);
// 5- Fetch resulting rows as an array 
$rows = mysqli_fetch_all($result , MYSQLI_ASSOC);

include('header.php');
?>

    <div class="container">    
    <h1><?php echo $course_name;?> Course</h1>
    <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];}?>    
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Action</th>
        </tr>
        <?php foreach($rows as $row){?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['stu_name'];?></td>
                <td>
                    <a class="btn btn-success" href="view_students.php?stu_id=<?php echo $row['id'];?>&stu_name=<?php echo $row['stu_name'];?>&edit=edit">Edit</a>
                    <a class="btn btn-danger" href="CRUD_Action.php?course_id=<?php echo $course_id ;?>&stu_id=<?php echo $row['id'] ;?>&action=delete">Delete</a>
                </td>
                
            </tr>
        <?php }?>
    </table>
    <?php if(isset($_GET['edit'])){?>
    <h3>Edit Student Info</h3>
    <form action="CRUD_Action.php">
        <input type="text" name="stu_id" value="<?php echo $_GET['stu_id']; ?>" readonly><br><br>
        <input type="text" name="stu_name" value="<?php echo $_GET['stu_name']; ?>"><br><br>
        <input type="submit" value="Update" class="btn btn-warning" name="action">
    </form> 
    <?php }else{?>
    <h3>Add Student</h3>
    <form action="CRUD_Action.php">
        <input type="text" name="course_id" value="<?php echo $course_id ;?>" hidden>
        <input type="text" name="stu_id"><br><br>
        <input type="submit" value="Add Student" class="btn btn-primary" name="action">
    </form> 
    <?php }?> 
    </div> 
   
    <?php  include('footer.php');?>

   