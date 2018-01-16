<?php
  $file = 'jason.json';
  if(file_exists($file)) {
    $filedata = file_get_contents($file);
    $objson = json_decode($filedata, true);
      echo"<hr><code><pre>";
      print_r($objson);
      echo"</pre></code><hr>";
    }
    else echo $file . ' does not exist';

  $category = $_POST['category'];
  $course = $_POST['course'];
  $students = $_POST['students'];

  $Hcategory = $_POST['Hcategory'];
  $Hstudents = $_POST['Hstudents'];
  $Hcourse = $_POST['Hcourse'];

  $objson["school"]["Mediacollege"]["category"] = $category;
  $objson["school"]["Mediacollege"]["nr_students"] = $students;
  $objson["school"]["Mediacollege"]["courses"] = $course;

  $objson["school"]["Horizoncollege"]["category"] = $Hcategory;
  $objson["school"]["Horizoncollege"]["nr_students"] = $Hstudents;
  $objson["school"]["Horizoncollege"]["courses"] = $Hcourse;

  writeJson($objson, $file);

  function writeJson($objson, $fileOutput){
    $saveJson = json_encode($objson);
    $file = fopen($fileOutput, "w") or die ("can't open file");
    fwrite($file, $saveJson);
    fclose($file);
  }

 ?>
