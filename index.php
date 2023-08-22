<!DOCTYPE html>
<html lang="en">
<head>
  <title>Results Visualization</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="index.css">
  
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
  </div>
    <center>
      
        <img src="/gec.png" alt="" width=100% hight=100%>
      <div class="noprint" >
        <h1>Results Visualization</h1>
        </div>
    </center>
    

<div class="container mt-3">
  
  <br>
  <div class='noprint'>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="tab" href="#first">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#CMM">CMM</a>
    </li>
  </ul>
  </div>
  <!-- Tab panes -->
  
  <div class="tab-content">
    <div id="first" class="container tab-pane active"><br>
                    <div class="noprint" >
                        <!-- <div id="mySidenav" class="sidenav">
                            <a href="/consolidate.php" id="home">SemWise Data</a>
                            <a href="/conf.php" id="consem">Yearwise Data</a>
                        </div> -->
                        
                    <div class="form"  >
                        <center>
                            <form action="" method="POST" >
                                <div class="input-group mb-3" >
                                    <div class="input-group-text">
                                        <input type="text" id="Htno" class="form-control" placeholder="Roll Number" oninvalid="setCustomValidity('Enter Roll number Here')" name="Htno"  minlength="10" maxlength="10" required >      &nbsp;
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
                    
                    <?php
                        require('db_config.php');
                        $months=array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAY','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OCT','11'=>'NOV','12'=>'DEC','RS'=>'Regular/supply','RV'=>'Revaluation/recounting');
                        if(!isset($_POST['search']))
                        {
                    ?>
                    <hr>
                    <center><img class="h" src="/ge.jpeg" width=80% /></center>
                        <?php
                    }
                        ?>

                <?php 
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
                        <br class="noprint">
                        <center>
                        <table class="data" >
                                <tr>
                                    <td>
                                        <img src="/img/pass/<?php echo $row1['image']?>" alt="Student Photo"  height=190 width=150>
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
                                
                        <?php
                    }
                }
                ?>
                <hr>

                </table>
                </center>
                
                <div id="main">
                <center>
                    <?php 
                        
                        if(isset($_POST['search']))
                        {
                            $Htno = strtoupper($_POST['Htno']);
                            echo "<h1>".strtoupper($Htno)."</h1>";
                            // $query="show TABLES; ";
                            // $query_run=$mysqli->query($query);
                            // $x=array();
                            // while($ro=mysqli_fetch_array($query_run))
                            // {
                            //     if ($ro['Tables_in_sdata19jk']=="student")
                            //     {
                            //         continue;
                            //     }
                            //     array_push($x,$ro['Tables_in_sdata19jk']);
                            // }
                            //foreach ($x as $k){

                            

                                $k1='';
                                $k='';
                                // $connection = mysqli_connect("localhost","root","");
                                // $db = mysqli_select_db($connection,'sdata19jk');
                                if(isset($_POST['search']))
                                {
                                    
                                    
                                    $query="SELECT * FROM results where Htno='$Htno' order by exam ";
                                    $query_run=$mysqli->query($query);
                                    $row=mysqli_fetch_array($query_run);
                                    // $query_run=$mysqli->query($query);
                                    // $row=mysqli_fetch_array($query_run);
                                    if($row!= NULL){
                                        
                                        //echo $k;
                                    ?>
                                    
                                
                                    <?php
                                    $query_run=$mysqli->query($query);
                                    $sno=1;
                                    while($row=mysqli_fetch_array($query_run))
                                    {
                                        $k=$row['exam'];
                                        $k=strtoupper($k);
                                        if($k!=$k1)
                                        {
                                            
                                            if($k1!=''){
                                               echo "</table>";
                                            }
                                            
                                            $m=substr($k,-4,-2);
                                            $r=substr($k,-2);
                                            echo "<table class=\"table table-striped\" >";
                                            echo "<h3>".$k[0].'-'.$k[1]."  ".$months[$m]."  ".substr($k,-8,-4)."  ".$months[$r]."</h3>";
                                            $k1=$k;
                                            $sno=1;
                                            ?>
                                            <tr>
                                                <th><center>S.no</center></th>
                                                <th><center>Subcode</center></th>
                                                <th><center>Subname</center></th>
                                                <th><center>External</center></th>
                                                <th><center>Credits</center></th>
                                            </tr>
                                            <?php
                                        }
                                        
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
                                }} 
                    //}
                    //print_r($sub);
                    ?>
                    
                    <?php
                    $bc=0;
                    $sno=0;
                    foreach($sub as $ic => $jg)
                    {
                        if ($jg=='F' OR $jg=='ABSENT' OR $jg=='AB')
                        {  
                            $bc+=1;
                        }
                    }?>
    				<center>
                    <h3><?php echo "No.of Backlogs :".$bc?></h3>
                      </center>
                    <?php
                    if ($bc!=0){?>
                        <h3><u>Backlogs List:</u></h3>
                    <table class="table table-striped" >
                        <tr>
                            <th>S.No</th>
                            <th>Subject code</th>
                            <th>Subject Name</th>
                        </tr>
                        <?php
                    foreach($sub as $ic => $jg)
                    {
                        if ($jg=='F' OR $jg=='ABSENT' OR $jg=='AB')
                        {  $sno+=1?>
                            
                            <tr>
                                <td><?php  echo $sno;?></td>
                                <td><?php echo $ic;?></td>
                                <td><?php echo $sname[$ic];?> </td>
                            </tr>
                            <?php
                        }
                    }}?>
                    </table>
                    
                <?php
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
            </div>
            
        </div>
        <div id="CMM" class="container tab-pane fade"><br>
            <div class="noprint" >
                
                

                <?php
                if(!isset($_POST['search']))
                {
                    ?>
                    

              <center>
                <p>If you need the CMM result. Please, enter your Roll number at Home</p>
                <img class="h" src="/try/ge.jpeg" width=80% /></center>
                    <?php
                }
                ?>
            </div>
            <div>
                <?php 
                
                
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
                        <br>
                        <center>
                        <table class="data" >
                                <tr>
                                    <td>
                                        <img src="/img/pass/<?php echo $row1['image']?>" alt="Student Photo"  height=190 width=150>
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
                                <td><?php echo $row['Name']; $name=$row['Name'];?><br>
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
                        <?php
                    }
                //}
                }
                ?>
                <hr>

                </table>
                </center>
            </div>
            <div id="main">
            <center>

                <?php 
                    
                    $flag=array();
                    //$months=array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAY','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OCT','11'=>'NOV','12'=>'DEC','RS'=>'Regular/supply','RV'=>'Revaluation/recounting');
                    
                    
                    if(isset($_POST['search']))
                    {
                    
                        $Htno = strtoupper($_POST['Htno']);
                        $bc=0;
                        //echo "<h1>Name: $name</h1>" ;
                        echo "<h1>".strtoupper($Htno)."</h1>";
                        // $query="show TABLES; ";
                        // $query_run=$mysqli->query($query);
                        // $x=array();
                        // while($ro=mysqli_fetch_array($query_run))
                        // {
                        //     if ($ro['Tables_in_pdilipvenka_try']=="student")
                        //     {
                        //         continue;
                        //     }
                        //     array_push($x,$ro['Tables_in_pdilipvenka_try']);
                        // }
                        // foreach ($x as $k)
                        //{
                            if(isset($_POST['search']))
                            {
                                
                                
                                $query="SELECT * FROM results where Htno='$Htno'  order by exam";
                                
                                $query_run=$mysqli->query($query);
                                $row=mysqli_fetch_array($query_run);

                                if($row!= NULL)
                                {
                                    //$k=strtoupper($k);
                                    $m=substr($k,0,2);
                                    //$r=substr($k,-2);
                                    //echo "<h3>".$k[0].'-'.$k[1]."  ".$months[$m]."  ".substr($k,-6,-2)."  ".$months[$r]."</h3>";
                                    $g19=array('O'=>10,'S'=>9,'A'=>8,'B'=>7,'C'=>6,'D'=>5,'F'=>0,'COMPLETED'=>0,'COMPLE'=>0,"ABSENT"=>0);
                                    $g20=array('A+'=>10,'A'=>9,'B'=>8,'C'=>7,'D'=>6,'E'=>5,'F'=>0,'COMPLETED'=>0,'COMPLE'=>0,"ABSENT"=>0);
                                
                                    $query_run=$mysqli->query($query);
                                    while($row=mysqli_fetch_array($query_run))
                                    {
                                        if ($row['Grade']!='No Change')
                                        {
                                        $flag[$row['Subcode']]=array('Subcode'=>$row['Subcode'],'Subname'=>$row['Subname'],'Grade'=>$row['Grade'],'Credits'=>$row['Credits']);
                                        }
                                        if ($flag!=NULL)
                                        {
                                    
                                            //print_r($flag);
                                            
                                        }
                                        
                                    }
                                
                                            
                                }
                        
                            }
                        //}
                                ?>
                                    <h3>1-1</h3>
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Sno</th>
                                            <th>Sem</th>
                                            <th>Subcode</th>
                                            <th>Subname</th>
                                            <th>External</th>
                                            <th>Credits</th>
                                        </tr>
                            
                                        <?php
                                        $fa=array();
                                        $sno=0;
                                        $tg=0;
                                        $tc=0;
                                        $sup='0';
                                        $sn=1;
                                        $fa1=0;
                                        $gpa=0;
                                        $per=0;
                                        $tog=0;
                                        $toc=0;
                                        
                                        
                                        foreach ($flag as $fa)
                                        {
                                            
                                            $sno+=1;
                                            $fsubc=$fa['Subcode'];
                                            $c=strlen($fsubc);
                                            if ($c==9){
                                                $sun=substr($fsubc,5,2);
                                            }
                                            else{
                                                $sun=substr($fsubc,3,2);
                                            }
                                            if ($sup!='0'){
                                                if ($sup!=$sun){
                                                $gpa=($tg/$tc);
                                                $gpa=sprintf('%0.2f', $gpa);
                                                $per=($gpa*10)-7.5;
                                                $tog+=$tg;
                                                $toc+=$tc;

                                                
                                                $sno=1;
                                                $tg=0;
                                                $tc=0;
                                                $sn=0;
                                            }
                                            }
                                            if ($c==9){
                                                $sup=substr($fsubc,5,2);
                                            }
                                            else{
                                                $sup=substr($fsubc,3,2);
                                            }
                                            
                                            if ($sn==0){
                                                    ?>
                                                    <center>
                                                    <tr>
                                                        <td ><center> S.G.P.A  </center></td>
                                                        <td ><center> &rarr;  </center></td>
                                                        <td><?php echo $gpa ?></td>
                                                        <td ><center> PERCENTAGE </center></td>
                                                        <td ><center> &rarr;  </center></td>
                                                        <td><?php echo $per ?> </td>
                                                    </tr>
                                                    </table>
                                                    <h3></h3>
                                                    </center>
                                                    <?php if ($c==9){
                                                            
                                                            ?>
                                                            <h3><center><?php echo $fsubc[5].'-'.$fsubc[6] ;?></center></h3>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <h3><center><?php echo $fsubc[3].'-'.$fsubc[4] ;?></center></h3>
                                                            <?php
                                                        }?>
                                                    <table class="table table-striped">
                                                    <tr>
                                                        <th>Sno</th>
                                                        <th>Sem</th>
                                                        <th>Subcode</th>
                                                        <th>Subname</th>
                                                        <th>External</th>
                                                        <th>Credits</th>
                                                    </tr>
                                                    <?php
                                                    $sn=1;
                                                } 
                                                ?>
                                                
                                                    <tr>
                                                        <td><center><?php echo $sno?></center></td>
                                                        <?php if ($c==9){
                                                            
                                                            ?>
                                                            <td><center><?php echo $fsubc[5].'-'.$fsubc[6] ;?></center></td>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <td><center><?php echo $fsubc[3].'-'.$fsubc[4] ;?></center></td>
                                                            <?php
                                                        }
                                                        if( substr($fsubc,1,2)=='19')
                                                        {
                                                            $tg+=($g19[$fa['Grade']]*$fa['Credits']);
                                                            $tc+=$fa['Credits'];
                                                        }
                                                        else{
                                                            $tg+=($g20[$fa['Grade']]*$fa['Credits']);
                                                            $tc+=$fa['Credits'];

                                                        }

                                                        ?>

                                                        <td><center><?php echo $fa['Subcode'];?></center></td>
                                                        <td><?php echo $fa['Subname'];?></td>
                                                        <?php if($fa['Grade']=='F' OR $fa['Grade']=='ABSENT' OR $fa['Grade']=='AB')
                                                                { $bc+=1;
                                                                    ?>
                                                                    <td style="background-color:red !important;"><center ><?php echo $fa['Grade'] ?></center></td>
                                                                    <?php
                                                                }else
                                                                {
                                                                    ?>
                                                                <td><center><?php echo $fa['Grade'] ?></center></td>
                                                                    <?php
                                                                }
                                                        ?>
                                                        
                                                        <td><center><?php echo $fa['Credits'];?></center></td>
                                                    </tr>
                                                    </center>
                                                <?php
                                                $fa1+=1;
                                                                    
                                        }
                                        
                                        if ($fa1==count($flag)){
                                            $gpa=($tg/$tc);
                                            $gpa=sprintf('%0.2f', $gpa);
                                            $per=($gpa*10)-7.5;
                                            $tog+=$tg;
                                            $toc+=$tc;
                                            ?>
                                            <center>
                                            <tr>
                                                <td ><center> S.G.P.A  </center></td>
                                                <td ><center> &rarr;  </center></td>
                                                <td><?php echo $gpa ?> </td>
                                                <td ><center> PERCENTAGE </center></td>
                                                <td ><center> &rarr;  </center></td>
                                                <td><?php echo $per ?></td>
                                            </tr>
                                            </center>
                                            <?php
                                            $sn=1;
                                        } 
                                        
                                        ?>
                                    </table>
                                    <br>
                                        <?php
                                        $gpa=($tog/$toc);
                                        $gpa=sprintf('%0.2f', $gpa);
                                        $per=($gpa*10)-7.5;
                                        $ps=$fa1-$bc;
                                        echo "<table class=\"table table-striped\" > ";
                                        echo "<tr><td><h2>Total CGPA:</h2></td><td><h2> $gpa </h2></td></tr>";
                                        echo "<tr><td><h2>Total Percentage:</h2></td><td><h2> $per </h2></td></tr>";
                                        echo "<tr><td><h2>Total Credits:</h2></td> <td><h2> $toc </h2></td></tr>";
                                        echo "<tr><td><h2>Total subjects:</h2></td> <td><h2> $fa1 </h2></td></tr>";
                                        echo "<tr><td><h2>Total subjects pass:</h2></td> <td><h2> $ps </h2></td></tr>";
                                        echo "</table>";
                                        if($bc!=0)
                                        {
                                            echo "<center><h2> No.of Backlogs: ".$bc."</h2></center>";
                                        }
                                        else
                                        {
                                            echo "<center> <h2>All Pass </h2> </center>";
                                        }
                    }
                ?>
                </center>
                
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
            </div>
            </div>

    </div>
    
  </div>
</div>
<br>
</body>
<footer class='noprint'>
  <span style="color: rgba(0, 0, 0, 0); font-size:0.10vw;">P.DILIP VENKATESH</span><p>@Designed by R19 CSE (2019-23 Batch)  </p>
  <p>Dedicated to the <b>GEC College</b> </p>
  <p>If any error will occur or you noticed send an email to <u>support@pdilipvenkatesh.in</u></p>
</footer>
</html>