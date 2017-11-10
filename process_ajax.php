<?php 
echo 'This is the PHP page.';
echo '<br>';
echo '<br>';
print '<b>The Second Line</b>';
print '<br>';

$names[] = 'Mark';
$names[] = 'Shaun';
$names[] = 'Hillary';
$names[] = 'Walton';
$names[] = 'Lara';
$c = 1;
foreach ($names as $name) {
  if ($_REQUEST['var1'] == $name) {
      echo $c . ' ' . $name . ' is the important Name<br><br>';
  } else {
    echo $c. ' ' . $name . '<br><br>';
  }
}

if (isset($_REQUEST['var2'])) {
  if ($_REQUEST['var2'] == '') {
    echo 'We have an empty variable, so we&apos;re unable to show you the result';    
  } else {
    echo 'We have some ' . $_REQUEST['var2'] . '. We will eat them.';
  }
} else {
  echo "Note: Something is more there but is not visible because of a variable inside it, which is actually not declared any where.";
}

?>