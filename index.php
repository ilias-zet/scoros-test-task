<?php
  $input1 = read_input("input1.txt");
  $input2 = read_input("input2.txt");

  [$output1, $output2] = find_difference($input1, $input2);
  
  write_output("output1.txt", $output1);
  write_output("output2.txt", $output2);

  function read_input(string $filename) {
    $data = file_get_contents($filename);

    if ($data) {
      return explode("\n", $data);
    } else {
      return [];
    };
  }

  function write_output(string $filename, array $array) {
    $result = implode("\n", $array);
    file_put_contents($filename, $result);
  }

  function find_difference(array $input1, array $input2) {
    $only_in_input1 = [];
    $only_in_input2 = [];

    $i = 0;
    $z = 0;

    while ($i < count($input1) && $z < count($input2)) {
      if ($input1[$i] === $input2[$z]) {
        $i++;
        $z++;
      } elseif ($input1[$i] < $input2[$z]) {
        $only_in_input1[] = $input1[$i];
        $i++;
      } elseif ($input1[$i] > $input2[$z]) {
        $only_in_input2[] = $input2[$z];
        $z++;
      }
    }

    while ($i < count($input1)) {
      $only_in_input1[] = $input1[$i];
      $i++;
    }

    while ($z < count($input2)) {
      $only_in_input2[] = $input2[$z];
      $z++;
    }

    return [$only_in_input1, $only_in_input2];
  }
?>
