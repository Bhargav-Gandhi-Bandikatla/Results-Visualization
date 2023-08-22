<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results Visualization</title>
</head>
<body>
    <?php
        require('db_config.php');
        $months=array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAY','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OCT','11'=>'NOV','12'=>'DEC','RS'=>'Regular/supply','RV'=>'Revaluation/recounting');
        $query="SELECT  DISTINCT exam FROM `results` ORDER by exam DESC ";
        $query_run=$mysqli->query($query);
        $html="<center><table class=\"table\" border='1'>";
        while($row=mysqli_fetch_array($query_run)){
            $exam=$row['exam'];
            $exam=strtoupper($exam);
            $m=substr($exam,-4,-2);
            $r=substr($exam,-2);
            $html.="<tr>";
            $html.="<td>".$exam[0].'-'.$exam[1].'  '.$months[$m].'  '.substr($exam,-8,-4).'  '.$months[$r]."</td>";
            $html.="<td><a href=\"./Result.php/".$exam."\">Click Here</a> </td>";
            $html.="</tr>";
        }
        $html.="</table></center>";
        echo $html;
    ?>
</body>
</html>