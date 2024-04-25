<?php
    session_start();
    if(isset($_SESSION['instructor_id'])){
        $instructor_id = $_SESSION['instructor_id'] ;
        include('config.php');
        // 3- Preapare Query
        $sql = "SELECT *
                FROM courses
                WHERE instructor_id = $instructor_id ";
        // 4- Execute Query
        $result = mysqli_query($con ,$sql);
        // 5- Fetch resulting rows as an array 
        $rows = mysqli_fetch_all($result , MYSQLI_ASSOC);  
        include('header.php');
 
    echo '<div class="container">
        <h1 class="text-center">View Courses</h1>
        <h2 class="text-center">Welcome'. $_SESSION['instructor_name'].'</h2> 
        <table class="table table-striped">
            <tr>
                <th>id</th>
                <th>Course Name</th>
                <th>Room</th>
                <th>Action</th>
            </tr>';
            foreach($rows as $row){
                echo '<tr>
                    <td>'. $row['id'].'</td>
                    <td>'. $row['course_name'].'</td>
                    <td>'. $row['room_id'].'</td>
                    <td><a class="btn btn-outline-danger" href="view_students.php?course_id='. $row['id'].'&course_name='. $row['course_name'].'">Show Students</a></td>
                </tr>';
            }   
        echo '</table>
        </div>';
        include('footer.php');

    }else{
       
        header('location:index.php');
    }
    ?>

    
    