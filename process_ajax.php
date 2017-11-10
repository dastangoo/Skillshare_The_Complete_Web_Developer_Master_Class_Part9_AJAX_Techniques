<?php 
  $countries[] = 'United States';
  $countries[] = 'United Kingdom';
  $countries[] = 'United Arab Emirates';
  $countries[] = 'Brazil';
  $countries[] = 'India';
  $countries[] = 'Pakistan';
  $countries[] = 'Srilanka';
  
  echo '<br>';
  foreach ($countries as $country) {
    // echo $country;
    if (isset($_REQUEST['var1'])) {
      if($_REQUEST['var1'] == $country) {
        echo '<div style="color: green;">' . $_REQUEST['var1'] . ' is in the list</div>';
      }
    }
  }
?>