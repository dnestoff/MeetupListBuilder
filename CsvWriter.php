<?php

// The CsvWriter class saves instances of the list class to a CSV file

class CsvWriter
{

  public function __construct($file) 
  {
    $this->file = $file;
  }

  public function save($array) {
    $file_name = fopen($this->file, 'w');

    $headers = array_keys((array) $array[0]);
    fputcsv($file_name, $headers);    
    foreach ($array as $item) {
      $object_array = (array) $item;
      fputcsv($file_name, $object_array);
    }
    
    fclose($file_name);
    return;
  }

}

?>