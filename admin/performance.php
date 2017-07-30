<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 01/04/2017
 * Time: 11:24
 */
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['logname']) && isset($_SESSION['rank'])) {
    switch($_SESSION['rank']) {

        case 2:
            header('location:../user/index.php');//redirect to  page
            break;

    }
}elseif(!isset($_SESSION['logname']) && !isset($_SESSION['rank'])) {
    header('Location:../sessions.php');
}
else
{

    header('Location:index.php');
}
include '../connection/db.php';
$username=$_SESSION['logname'];

$result1 = mysqli_query($con, "SELECT * FROM Login_table WHERE Login_Username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $username= $res['Login_username'];

}

?>

<?php include 'header.php';?>

<?php

$result = mysqli_query($con, "SELECT Performance_Id,Performance_Employee_Id,Performance_Empl_Panctuality,Performance_Empl_Skills,Performance_Empl_Attendance,Performnce_Empl_Honesty,Performnce_Empl_Communication,Perfomance_Empl_Integrity,
(  +Performance_Empl_Panctuality  + Performance_Empl_Skills + Performance_Empl_Attendance+Performnce_Empl_Honesty+Performnce_Empl_Communication+Perfomance_Empl_Integrity) AS total FROM `Performance_Table`");
?>

    <div class="card">
        <div class="header">
            <h4 class="title">Performance</h4>
            <p class="category">Select each staff to reward him/her</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-striped">
                <thead class="alert-success">
                <th>Employee</th>
                <th>Punctuality</th>
                <th>Skills</th>
                <th>Attendance</th>
                <th>Honesty</th>
                <th>Communication</th>
                <th>Integrity</th>
                <th><b>Total</b></th>
                <th><i class="fa fa-user-plus"></i> </th>
                <th><i class="fa fa-user-plus"></i> </th>
                <th><i class="fa fa-trash"></i> </th>
                </thead>
                <tbody>

                <?php

                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td class=''>".$res['Performance_Employee_Id']."</td>";
                    echo "<td>".$res['Performance_Empl_Panctuality']."</td>";
                    echo "<td>".$res['Performance_Empl_Skills']."</td>";
                    echo "<td>".$res['Performance_Empl_Attendance']."</td>";
                    echo "<td>".$res['Performnce_Empl_Honesty']."</td>";
                    echo "<td>".$res['Performnce_Empl_Communication']."</td>";
                    echo "<td>".$res['Perfomance_Empl_Integrity']."</td>";
                    echo "<td>".$res['total']."</td>";
                    echo "<td><a href=\"add-reward.php?id=$res[Performance_Employee_Id]\" onClick=\"return confirm('Are you sure you want range performance?')\" class='fa fa-gift lg-2'></a></td>";
                    echo "<td><a href=\"add-disc.php?id=$res[Performance_Employee_Id]\" onClick=\"return confirm('Are you sure you want range performance?')\" class='fa fa-pencil lg-2'></a></td>";
                    echo "<td><a href=\"delete.php?perf=$res[Performance_Id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='fa fa-trash lg-2'></a></td>";


                }
                ?>

                <?php

                $a=mysqli_query($con,"select SUM(Performance_Empl_Panctuality ) AS punc FROM Performance_Table");
                $fetch1=mysqli_fetch_array($a);
                //2
                $b=mysqli_query($con,"select SUM(Performance_Empl_Skills ) AS skills FROM Performance_Table");
                $fetch2=mysqli_fetch_array($b);
                //3
                $c=mysqli_query($con,"select SUM(Performance_Empl_Attendance ) AS attend FROM Performance_Table");
                $fetch3=mysqli_fetch_array($c);
                //4
                $d=mysqli_query($con,"select SUM(Performnce_Empl_Honesty) AS honest FROM Performance_Table");
                $fetch4=mysqli_fetch_array($d);
                //5
                $e=mysqli_query($con,"select SUM(Performnce_Empl_Communication) AS comm FROM Performance_Table");
                $fetch5=mysqli_fetch_array($e);
                //
                $f=mysqli_query($con,"select SUM(Perfomance_Empl_Integrity) AS integrity FROM Performance_Table");
                $fetch6=mysqli_fetch_array($f);

                ?>
                </tbody>
                <tfoot class="alert-warning">
                <tr>
                    <th><b>Average</b></th>
                    <td><?php echo $fetch1[punc];?></td>
                    <td><?php echo $fetch2[skills];?></td>
                    <td><?php echo $fetch3[attend];?></td>
                    <td><?php echo $fetch4[honest];?></td>
                    <td><?php echo $fetch5[comm];?></td>
                    <td><?php echo $fetch6[integrity];?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th></th>
                    
                </tr>

                </tfoot>
            </table>
        </div>
    </div>


<?php include 'footer.php';?>