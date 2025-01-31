<?php
  $input1 = fopen("input1.txt", 'r');
  $input2 = fopen("input2.txt", 'r');
  $output1 = fopen("output1.txt", 'w');
  $output2 = fopen("output2.txt", 'w');
  
  if (!$input1 || !$input2 || !$output1 || !$output2) {
    die("Error opening files");
  }

  function read_next_line($input) {
    return trim(fgets($input), "\n\r");
  }
  
  $line1 = read_next_line($input1);
  $line2 = read_next_line($input2);

  while ($line1 != false && $line2 != false) {
    if ($line1 === $line2) {
      $line1 = read_next_line($input1);
      $line2 = read_next_line($input2);
    } elseif ($line1 < $line2) {
      fwrite($output1, $line1."\n");
      $line1 = read_next_line($input1);
    } elseif ($line1 > $line2) {
      fwrite($output2, $line2."\n");
      $line2 = read_next_line($input2);
    }
  }

  while ($line1 != false) {
    fwrite($output1, $line1."\n");
    $line1 = read_next_line($input1);
  }

  while ($line2 != false) {
    fwrite($output2, $line2."\n");
    $line2 = read_next_line($input2);
  }

  fclose($input1);
  fclose($input2);
  fclose($output1);
  fclose($output2);
?>
