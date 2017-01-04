<?php

require('list_controller.php');

// The runner file validates the command line options using ARGV and creates a new ListController to manage all program tasks via a master #run() method

$search_type = $argv[1];
$zip = $argv[2];

if (($search_type == 'event' || $search_type == 'group') && strlen($zip) == 5) {
  $controller = new ListController($search_type, $zip);
  echo $controller->run();

} else if (isset($search_type) && strlen($zip) == 5) {
  echo "Not sure we caught that correctly. Did you mean 'event' or 'group' when you typed '" . $search_type . "'?\n\n";

} else {
  echo "Oops, something went wrong...\n\nPlease re-enter your desired search type and five-digit zip code:\n\n 'php runner.php <event>/<group> <zip code>'\n\n";
}

?>