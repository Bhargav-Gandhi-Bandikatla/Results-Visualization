<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="index.css">
    <title>Consolidate Report</title>
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
                    <a class="nav-link text-light "  href="../Results-Visualization" >Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light "  href="../Results-Visualization/consolidate.php" >SemWise Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="../Results-Visualization/conf.php" >Yearwise Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="../Results-Visualization/newresults.php" >New Result</a>
                </li>
                </ul>
            </div>
        <!-- </span> -->
    </div>
</nav>
    <center>
        <img src="gec.png" alt="" width=100% hight=100%>
        <h1>Results Visualization</h1>
    </center>
    <div id='form'>
        <center>
            <form action="" method="POST">
                <label>Select year of join: </ladel>
                <select name="yoj" required>
                    <option value="">select</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                </select>&nbsp;
                <label for="sem">Semester: </label>
                    <select name="sem" required>
                        <option value="">select</option>
                        <option value="11">1-1</option>
                        <option value="12">1-2</option>
                        <option value="21">2-1</option>
                        <option value="22">2-2</option>
                        <option value="31">3-1</option>
                        <option value="32">3-2</option>
                        <option value="41">4-1</option>
                        <option value="42">4-2</option>
                    </select>
                <label>Department: </label>
                <select name="dep" required>
                    <option value="">select</option>
                    <option value="CIVIL">CIVIL</option>
                    <option value="EEE">EEE</option>
                    <option value="MECH">ME</option>
                    <option value="ECE">ECE</option>
                    <option value="CSE">CSE</option>
                    <option value="CSE (AIML)">CSE (AI/ML)</option>
                    <option value="CSE (DS)">CSE (DS)</option>
                </select>
                <br><br>
                <input type="submit" name='search'>
            </form> 
        </center>
    </div>
</div>

<?php
if(!isset($_POST['search']))
{
?>
<hr>
<center><img class="h" src="ge.jpeg" width=80% /></center>
  <?php
}
  ?>

    
    <?php
    require('db_config.php');
        if(isset($_POST['search']))
        {
            $sem=$_POST['sem'];
            $yoj=$_POST['yoj'];
            $dep=$_POST['dep'];
            $sname=array();
            $sub=array();
            $sd=array();
            
            ?>
  			<br class='noprint'>
            <center><b><?php echo $sem[0].'-'. $sem[1].' '. $dep.' 20'.$yoj.' batch';?></b></center>
            <?php
            $sf=array();
            $fail=0;
            $pass=0;
            $fl=array();
            //$connection = mysqli_connect("localhost","root","");
            //$db = mysqli_select_db($connection,'sdata19jk');
            $query="select * from student where year ='$yoj'AND Branch='$dep' ";
            $query_run=$mysqli->query($query);
            $Hno=array();
            while($ro=mysqli_fetch_array($query_run)){
                array_push($Hno,$ro['Htno']);
            }
            //print_r($Hno);
            $query="SELECT DISTINCT exam FROM results ORDER by exam";
            $query_run=$mysqli->query($query);
            $x=array();
            while($ro=mysqli_fetch_array($query_run))
            {
                
                array_push($x,$ro['exam']);
            }
            foreach ($x as $k)
            {
                
                
                if (substr($k,0,2)==$sem)
                {
                    foreach($Hno as $Htno)
                    {
                        //$connection = mysqli_connect("localhost","root","");
                        //$db = mysqli_select_db($connection,'sdata19jk');
                        $query="SELECT * FROM student where Htno='$Htno' ";
                        $query_run=$mysqli->query($query);
                        while($row=mysqli_fetch_array($query_run)){
                            $sd[$row['Htno']]=$row['Name'];
                        }
                        //print_r($sd);
                        $flag=array();
                            $query="SELECT * FROM results where Htno='$Htno'and exam='$k' ";
                            $query_run=$mysqli->query($query);
                            while($row=mysqli_fetch_array($query_run))
                            {
                                if ($row['Grade']!='No Change')
                                $flag[$row['Subcode']]=$row['Grade'];
                                $sname[$row['Subcode']]=$row['Subname'];
                            }
                            //echo ($Htno);
                            $sc='';
                            if (count($flag)==0) continue;
                            //print_r($flag);
                            if (in_array("F", $flag) OR in_array("ABSENT", $flag) OR in_array("AB", $flag))
                            {
                                foreach($flag as $fsubc=>$fusb){
                                    if ($fusb=='F' OR $fusb=='ABSENT' OR $fusb=='AB'){
                                        $sc=$sc.$sname[$fsubc].' &nbsp;&nbsp;&nbsp; <b style="color: red">'.$fusb.'</b><hr>';
                                    }
                                }
                                $sf[$Htno]="F";
                                $sub[$Htno]=$sc;
                            }
                            else $sf[$Htno]="P";
                    }
                }
                
            }
            //print_r($sf);
            foreach($sf as $k){
                if($k=='F')
                {
                $fail+=1;
                //array_push($fl,$key);
                }
            }
            if (count($sf)==0){
                echo"<center> <b>No results found<b> </center>";
                exit();
            }
            $pass=count($sf);
            $pass-=$fail;
            //print_r($fl);
            ?>
            <center>
                <b>Number of students : <?php echo count($sf) ;?> </b><br>
                <b>Number of students pass: <?php echo $pass;?> </b><br>
                <b>Number of students fail: <?php echo $fail;?> </b>
            </center>
            <center>
                <h2>Fail List</h2>
                <table>
                  <?php
                            if ($fail!=0){?>
                            <tr>
                                <th><center>S.No</center></th>
                                <th><center>Rollno</center></th>
                                <th><center>Student Name</center></th>
                                
                                <th><center>Subject List</center></th>
                            </tr>
                         <?php
                            }
                        $sno=0;
                        foreach($sf as $key=>$k){
                            if($k=='F'){
                            $sno+=1
                            ?>
                            <tr>
                                <td><center><?php echo $sno?></center></td>
                                <td><center><?php echo $key?></center></td>
                                <td><center><?php echo $sd[$key]?></center></td>
                                <td><center><?php echo $sub[$key]?></center></td>
                            </tr>
                            <?php
                            }
                        }
                    ?>
                </table>
            </center>
            <?php
        }
    ?>
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
<span style="color: #2C3539; font-size:0.10vw;">P.DILIP VENAKTESH</span><p>@Designed by R19 CSE (2019-23 Batch)  </p>
  <p>Dedicated to the <b>GEC College</b> </p>
  <p>If any error will occur or you noticed send an email to <u>support@pdilipvenkatesh.in</u></p>
</footer>

</div>
</html>