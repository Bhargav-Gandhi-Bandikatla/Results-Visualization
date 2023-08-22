<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Results Visualization</title>
   
    
</head>
<body>
    <div class="noprint" >
        <div id="mySidenav" class="noprint">
            <a href="/consolidate.php" id="home">Semwise Data</a>
            <a href="/conf.php" id="consem">Yearwise Data</a>
        </div>
        <center>
            <img src="gec.png" alt="" width=100% hight=100%>
            
        
            <h1>Results Visualization</h1>
        </center>
        <div id="form">
            <center>
                <form action="" method="POST">
                    <label for="Htno">Roll No:</label>
                    <input type="text" id="Htno" class="btn" name="Htno" >      &nbsp;
                    <br><br>
                    <button class="bt"type="submit" name="search" class="btn" value="seach by roll">
                        submit
                    </button>
                </form>
                </center>
        </div>
        

        <?php
        require('db_config.php');
        if(!isset($_POST['search']))
        {
            ?>
            <hr>
            <center><img class="h" src="ge.jpeg" /></center>
            <?php
        }
        ?>
    </div>
    <div>
        <?php 
        //$connection = mysqli_connect("localhost","root","");
        //$db = mysqli_select_db($connection,'sdata19jk');
        if(isset($_POST['search']))
        {
        
            $Htno = strtoupper($_POST['Htno']);
            
            $query="SELECT * FROM student where Htno='$Htno' ";
            $query_run=$mysqli->query($query);
            $query1="SELECT image FROM image where image like '%$Htno%' ";
            $query_run1=$mysqli->query($query1);
            $row1=mysqli_fetch_array($query_run1);
            while($row=mysqli_fetch_array($query_run))
            {
                ?>
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
        <div id="mySidenav" class="sidenav">
                <a href="/consolidate.php" id="home">SemWise Data</a>
                <a href="/conf.php" id="consem">Yearwise Data</a>
            </div>
        <hr>

        </table>
    </div>
    <div id="main">
    <center>

        <?php 
            echo "<h1>Name: $name</h1>" ;
            $flag=array();
            //$months=array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAY','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OCT','11'=>'NOV','12'=>'DEC','RS'=>'Regular/supply','RV'=>'Revaluation/recounting');
            //$connection = mysqli_connect("localhost","root","");
            //$db = mysqli_select_db($connection,'sdata19jk');
            if(isset($_POST['search']))
            {
            
                $Htno = strtoupper($_POST['Htno']);
                $bc=0;
                echo "<h1>".strtoupper($Htno)."</h1>";
                $query="SELECT * FROM results where Htno='$Htno' order by exam ";
                $query_run=$mysqli->query($query);
                $row=mysqli_fetch_array($query_run);
                // $query="show TABLES; ";
                // $query_run=$mysqli->query($query);
                $x=array();
                // while($ro=mysqli_fetch_array($query_run))
                // {
                //     if ($ro['Tables_in_sdata19jk']=="student")
                //     {
                //         continue;
                //     }
                //     array_push($x,$ro['Tables_in_sdata19jk']);
                // }
                // foreach ($x as $k)
                //{

                


                    //$connection = mysqli_connect("localhost","root","");
                    //$db = mysqli_select_db($connection,'sdata19jk');
                    if(isset($_POST['search']))
                    {
                        
                        
                        // $query="SELECT * FROM ".$k." where Htno='$Htno' ";
                        
                        // $query_run=$mysqli->query($query);
                        // $row=mysqli_fetch_array($query_run);

                        if($row!= NULL)
                        {
                            //$k=strtoupper($k);
                            //$m=substr($k,0,2);
                            //$r=substr($k,-2);
                            //echo "<h3>".$k[0].'-'.$k[1]."  ".$months[$m]."  ".substr($k,-6,-2)."  ".$months[$r]."</h3>";
                            $g19=array('O'=>10,'S'=>9,'A'=>8,'B'=>7,'C'=>6,'D'=>5,'F'=>0,'COMPLETED'=>0,'COMPLE'=>0);
                            $g20=array('A+'=>10,'A'=>9,'B'=>8,'C'=>7,'D'=>6,'E'=>5,'F'=>0);
                        
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
                            <table>
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
                                                <td ><center> G.P.A  </center></td>
                                                <td ><center> &rarr;  </center></td>
                                                <td><?php echo $gpa ?></td>
                                                <td ><center> PERCENTAGE </center></td>
                                                <td ><center> &rarr;  </center></td>
                                                <td><?php echo $per ?> </td>
                                            </tr>
                                            <tr style="height: 20px;"></tr>
                                            </center>
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
                                                            <td bgcolor= "red"><center><?php echo $fa['Grade'] ?></center></td>
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
                                        <td ><center> G.P.A  </center></td>
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
                                echo "<b>Total CGPA: $gpa </b><br>";
                                echo "<b>Total Percentage: $per </b><br>";
                                echo "<b>Total CGPA: $gpa </b><br>";
                                echo "<b>Total sub: $fa1 </b><br>";
                                if($bc!=0)
                                {
                                    echo "<b> No:of Backlogs: ".$bc."</b>";
                                }
                                else
                                {
                                    echo "<b>All Pass </b>";
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
</body>
<footer>
<span style="color: #2C3539; font-size:0.10vw;">P.DILIP VENAKTESH</span><p>@Designed by R19 CSE (2019-23 Batch)  </p>
  <p>Detecated to the <b>GEC College</b> </p>
  <p>If any error will occur or you noticed send an email to <u>support@pdilipvenkatesh.in</u></p>
</footer>


</html>

