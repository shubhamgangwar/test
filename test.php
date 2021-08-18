<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    input {
        width: 80%;
        padding: 6px;
    }

    td label {
        color: whitesmoke;
        position: relative;
        left: 30%;
    }

    .btn-trans {
        border-radius: 10px;
        background-color: red;
    }

    .btn-trans:hover {
        background-color: black;
        color: white;
        transition: 0.5s ease-in-out;
    }
    </style>
</head>

<body>
    <center>

        <?php

$con = mysqli_connect('localhost','root','','test');

if (isset($_POST['submit'])) {
    $sname = $_POST['sname'];
    $course = $_POST['course'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
   
    $simage = $_FILES['simage']['name'];
    $tempname = $_FILES['simage']['tmp_name'];

    move_uploaded_file($tempname, "media/$simage");

    // move_uploaded_file($_FILES['pimage']['tmp_name'], 'media/'.$_FILES['pimage']['name']);

    $qry = "INSERT INTO `student`(`s_name`, `course`, `mobile`, `email`, `image`) VALUES ('$sname','$course','$mobile','$email','$simage')";

    $run = mysqli_query($con, $qry);
}
?>

        <table bgcolor="red" width="70%">
            <div class="panel-body">
                <form method="POST" enctype="multipart/form-data" class="form-horizontal form-border">
                    <div class="form-group">
                        <tr>
                            <td><label class="control-label">Student Name: </label>
                            </td>

                            <td><input type="text" class="form-control" name="sname">
                    </div><br></td>
                    </tr>
            </div>

            <div class="form-group">
                <tr>
                    <td><label class=" control-label">Course:</label></td>

                    <td><input type="text" class="form-control" name="course">
            </div><br></td>
            </tr>
            </div>

            <!-- <div class="form-group">
                <tr>
                    <td><label class="control-label">Description</label></td>

                    <td><textarea class="form-control" name="pdesc"></textarea>
            </div><br></td>
            </tr>
            </div> -->

            <div class="form-group">
                <tr>
                    <td><label class=" control-label">Mobile:</label></td>

                    <td> <input type="text" class="form-control" name="mobile">
            </div><br></td>
            </tr>
            </div>

            <div class="form-group">
                <tr>
                    <td><label class=" control-label">Email:</label></td>

                    <td><input type="email" class="form-control" name="email">
            </div><br></td>
            </tr>
            </div>

            <div class="form-group">
                <tr>
                    <td><label class=" control-label">Student Image</label></td>

                    <td><input type="file" class="form-control" name="simage">
            </div><br></td>
            </tr>
            </div>


            <tr>
                <td></td>

                <td>
                    <input type="submit" class="btn btn-danger btn-trans" name="submit"></input><br>
                </td>
            </tr>

            </form>
            </div>
        </table>
    </center>

    <?php

    $qry = "select * from student";
    $run = mysqli_query($con, $qry);

    ?>

    <div class="panel-body " style="overflow-x:auto; width:100%;">

        <table id="example" class="table table-striped table-bordered " cellspacing="0" border="2">

            <thead>
                <tr align="center">
                    <th>Sno.</th>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Mobile</th>
                    <th>E-Mail</th>
                    <th>Image</th>

                    <!-- <th>Image</th> -->
                </tr>
            </thead>

            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($run)) 
            {
            ?>


            <tbody>
                <tr align="center">
                    <td> <?php echo $i; ?> </td>
                    <td> <?php echo $row['s_name']; ?> </td>
                    <td><?php echo $row['course']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['email']; ?></td>


                    <td style="min-width: 80px;">
                        <img src="media/<?php echo $row['image']; ?>" alt="" width="100px">

                    </td>

                    <td style="font-size: 24px; ">
                        <a href="# ?id= <?php echo $row['id'] ?>">
                            <i class="fa fa-edit"></i>Edit |
                        </a>


                        <a href="delete.php ? id= <?php echo $row['id'] ?>">
                            <i class="fa fa-trash"></i>Delete
                        </a>

                    </td>
                </tr>

                <?php
                $i++;
                }
                ?>

            </tbody>
        </table>


    </div>
</body>

</html>