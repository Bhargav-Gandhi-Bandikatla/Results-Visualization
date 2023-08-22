<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<?php


require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
require('db_config.php');


if(isset($_POST['Submit'])){

  $username=$_POST['username'];
  $password=$_POST['password'];
  //echo $_POST['password'];
  //$sem=$_POST['sem'];
  //$examyear=$_POST['year'];$exammonth=$_POST['month'];$examtype=$_POST['type'];
  $tbname= $_POST['sem'].$_POST['year'].$_POST['month'].$_POST['type'];
  $query="SELECT * FROM users where username='$username' ";
  $query_run=$mysqli->query($query);
  $row=mysqli_fetch_array($query_run);
  if(is_null($row)){
   die("You do not have permission "); 
  }
  if($username ==$row['username'] && $password==$row['password']){
  $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','text/csv'];
  //echo $_FILES["file"]["type"],"<br>";
  //print_r($mimes);
  if(in_array($_FILES["file"]["type"],$mimes)){
    
    // $tbname= $_POST['sem'].$_POST['year'].$_POST['month'].$_POST['type'];
    // echo $tbname;
    $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);


    $Reader = new SpreadsheetReader($uploadFilePath);


    $totalSheet = count($Reader->sheets());


    //echo "You have total ".$totalSheet." sheets".


    $html="<table class=\"table\" border='1'>";
    


    /* For Loop for all sheets */
    for($i=0;$i<$totalSheet;$i++){


      $Reader->ChangeSheet($i);

        $count=1;
      foreach ($Reader as $Row)
      {
        if($count==1){
          $title1=$Row;
          $count+=1;
          continue;
        }
        try
        {$html.="<tr>";
        $title = $Row;
        $description = isset($Row[1]) ? $Row[1] : '';
        foreach ($Row as $head ){
        $html.="<td>".$head."</td>";
        }
        
        $query = "insert into results(";
        foreach ($title1 as $head ){
            $query.=$head.",";
            }
        //$query=rtrim($query, ",");
        $query .="username,Uploadtime,exam) values('";
        foreach ($Row as $head ){
            $query.=$head."','";
            }
        //$query=rtrim($query, ",'");
        $query.=$username."',NOW(),'".$tbname."')";

        
        $mysqli->query($query);
        $html.="<td><i class=\"fa fa-check\"style=\"color:green\"></i></td></tr>";
      }
        
        catch (Exception $ex){
          if(str_contains($ex, 'Duplicate entry')){
            //print_r($Row);
            $html.="<td><i class=\"fa fa-close\" style=\"color:red\"></i></td></tr>";
            
          }
          else{
            echo ("Please Contact to Admin");
          }
          //echo $ex->getMessage();
        }
       }
       


    }


    $html.="</table>";
    echo "<h1>Data</h1> ";
    echo $html;
    


  }else { 
    die("<br/>Sorry, File type is not allowed. Only Excel file."); 
  }
  }
  else{
    die("<br/>Invalid Credentials"); 

  }

}


?>