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
$names[] = 'Walton';
$names[] = 'Lara';
$c = 1;
foreach ($names as $name) {
  echo $c . ' ' . $name . '<br>';
  $c++;
}
?>