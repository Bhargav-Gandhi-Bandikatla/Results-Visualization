<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="index.css">
    <title>Results Visualization</title>
   
    
</head>
<body>
<div class="noprint" >
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid  ">
      <a class="navbar-brand text-light" >Results Visualization</a>
      <!-- <span class="nav-text"> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <i class="navbar-toggler-icon"></i>
      </button>
            <div  class="collapse navbar-collapse " id="navbarText">
              
                <ul  class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light "  href="../try" >Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light "  href="../try/consolidate.php" >SemWise Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="../try/conf.php" >Yearwise Data</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link text-light" href="../try/newresults.php" >New Result</a>
                </li>
                </ul>
            </div>
        <!-- </span> -->
    </div>
</nav>
    <center>
         <img src="gec.png" alt="" width=100% hight=100%>
      <div class="noprint" >
        <h1>Results Visualization</h1>
        </div>
    </center>
  <div class="container mt-3">
    <div class="form"  >
        <center>
            <form action="" method="POST" >
                <div class="input-group mb-3" >
                    <div class="input-group-text">
                        
                        <input type="text" id="Htno" class="form-control" placeholder="Roll Number" name="Htno"  minlength="10" maxlength="10" required >      &nbsp;
                        <br><br>
                        <button class="bt"type="submit" name="search" class="btn" value="seach by roll">
                            submit
                        </button>
                    </div>
                </div>
                </form>
        </center>
    </div>
    </div>
    <!-- <div id="mySidenav" class="sidenav">
        <a href="/consolidate.php" id="home">Semwise Data</a>
        <a href="/conf.php" id="consem">Yearwise Data</a>
    </div> -->

      <?php
        require('db_config.php');

      if(!isset($_POST['search']))
      {
      ?>
      <hr>
      <center><img class="h" src="ge.jpeg" width=80% /></center>
        <?php
      }
        ?>

<?php 
// //$connection = mysqli_connect("localhost","root","");
// //$db = mysqli_select_db($connection,'sdata19jk');
if(isset($_POST['search']))
{
 
    $Htno = strtoupper($_POST['Htno']);
    
    $query="SELECT * FROM student where Htno='$Htno' ";
    $query_run=$mysqli->query($query);
  	$query1="SELECT image FROM image where Rollnumber like '%$Htno%' ";
  	$query_run1=$mysqli->query($query1);
  	$row1=mysqli_fetch_array($query_run1);
    while($row=mysqli_fetch_array($query_run))
    {
        ?>
        <center>
        <br>
        <table class="data" >
                <tr>
                    <td>
                        <img src="img/pass/<?php echo $row1['image']?>" alt="Student Photo"  height=190 width=150>
                    </td>
                
                    <td>
                
            <table class="data">
               
               <tr>
                   <td>Roll No.</td>
                   <td >:</td>
                   <td><?php echo $row['Htno'];?><br></td>
               </tr>
               <tr>
                   <td>Name</td>
                   <td>:</td>
                   <td><?php echo $row['Name'];?><br>
               </tr>
               <tr>
                   <td>Branch</td>
                   <td>:</td>
                   <td><?php echo $row['Branch'];?><br></td>
               </tr>

               <tr>
                   <td>Regulation</td>
                   <td>:</td>
                   <td><?php echo $row['Reg'];?><br></td>
               </tr>
           </table>
             </td> </tr> 
        </table>  
        </center>       
        <?php
    }
//}
}
?>
<!-- <div id="mySidenav" class="sidenav">
        <a href="/consolidate.php" id="home">SemWise Data</a>
        <a href="/conf.php" id="consem">Yearwise Data</a>
    </div> -->
<hr>

</table>
</div>
<div id="main">
<center>
    <?php 
        $months=array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAY','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OCT','11'=>'NOV','12'=>'DEC','RS'=>'Regular/supply','RV'=>'Revaluation/recounting');
        // //$connection = mysqli_connect("localhost","root","");
        // $sub=array();
        // $sname=array();
        // //$db = mysqli_select_db($connection,'sdata19jk');
        if(isset($_POST['search']))
        {
        
            $Htno = strtoupper($_POST['Htno']);
            echo "<h1>".strtoupper($Htno)."</h1>";
           

            if(isset($_POST['search']) && $Htno!='')
            {
                echo "<table id=\"t\" border=\"1\" width=\"80%\">";
                        //<br>
            }
                $query="SELECT  DISTINCT exam FROM `results` ORDER by Uploadtime DESC LIMIT 1 ";
                $query_run=$mysqli->query($query);
                $row=mysqli_fetch_array($query_run);

                $exam=$row['exam'];
                //$connection = mysqli_connect("localhost","root","");
                //$db = mysqli_select_db($connection,'sdata19jk');
                if(isset($_POST['search']))
                {
                    
                    
                    //$query="SELECT * FROM ".$exam." where Htno='$Htno' ";
                    $query="SELECT * FROM results where Htno='$Htno'  and `exam`= '$exam'";
                    $query_run=$mysqli->query($query);
                    $row=mysqli_fetch_array($query_run);
                    $query1="SELECT image FROM image where image like '%$Htno%' ";
                    $query_run1=$mysqli->query($query1);
                    $row1=mysqli_fetch_array($query_run1);

                    if($row!= NULL){
                        $exam=strtoupper($exam);
                        $m=substr($exam,-4,-2);
                        
                        $r=substr($exam,-2);
                        echo "<h3>".$exam[0].'-'.$exam[1]."  ".$months[$m]."  ".substr($exam,-8,-4)."  ".$months[$r]."</h3>";
                        //echo $exam;
                    ?>
                    <tr>
                    <th><center>S.no</center></th>
                    <th><center>Subcode</center></th>
                    <th><center>Subname</center></th>
                    
                    <th><center>External</center></th>
                    <th><center>Credits</center></th>
                </tr>
                
                    <?php
                    $query_run=$mysqli->query($query);
                    $sno=1;
                    while($row=mysqli_fetch_array($query_run))
                    {
                        ?>
                        <tr>
                            <td><center><?php echo $sno;$sno++;?></center></td>
                            <td><center><?php echo $row['Subcode'];?></center></td>
                            <td><?php echo $row['Subname'];?></td>                           
                            <td><center><?php echo $row['Grade'];?></center></td>            
                            <td><center><?php echo $row['Credits'];?></center></td>
                        </tr>
                        </center>
                        <?php
                        $sname[$row['Subcode']]=$row['Subname'];
                        if($row['Grade']!='No Change'){
                        $sub[$row['Subcode']]=$row['Grade'];}
                    }
                    ?>
                    </table>
                    
                    <?php
                }
                else{
                    echo("<h3> No result Found </h3>");
                }
            } 
    
    //print_r($sub);

}   
    ?>
    
</div>
<div class="noprint" >
     </center>

    <br>
<?php
if(isset($_POST['search'])){?>
<center>
        <button onclick="window.print()">Print the result</button>
        <br>
        
    </center>
    <?php
}        ?>
<br>
</body>
<footer>
  <span style="color: rgba(0, 0, 0, 0); font-size:0.10vw;">P.DILIP VENKATESH</span><p>@Designed by R19 CSE (2019-23 Batch)  </p>
  <p>Dedicated to the <b>GEC College</b> </p>
  <p>If any error will occur or you noticed send an email to <u>support@pdilipvenkatesh.in</u></p>
</footer>

</div>
</html>

