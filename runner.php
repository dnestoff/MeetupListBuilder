<?php

require('list_controller.php');

if (isset($argv[1]) && strlen($argv[2]) == 5) {
  $controller = new ListController($argv[1], $argv[2]);
  echo $controller->run();  
} else {
  echo "\n\n You haven't entered enough information, please enter your desired command (search type and zipcode):\n\n 'php runner.php <event>/<group> <zip code>'\n\n";
}


?>