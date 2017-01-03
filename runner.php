<?php

require('list_controller.php');

if (($argv[1] == 'event' || $argv[1] == 'group') && strlen($argv[2]) == 5) {
  $controller = new ListController($argv[1], $argv[2]);
  echo $controller->run();
} else if (isset($argv[1]) && strlen($argv[2]) == 5) {
  echo "Not sure we caught that correctly. Did you mean 'event' or 'group' when you typed '" . $argv[1] . "'?\n\n";
} else {
  echo "Oops, something went wrong...\n\nPlease re-enter your desired search type and five-digit zip code:\n\n 'php runner.php <event>/<group> <zip code>'\n\n";
}


?>