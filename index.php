<?php

require "autoload.php";

$logData = LogHelper::get();

echo "<table style='width:100%;'><tr><th>Date</th><th>Type</th><th>Message</th></tr>";

foreach($logData as $log){

	echo "<tr><td>".$log['date']."</td><td>".$log['type']."</td><td>".$log['message']."</td></tr>";

}

echo "</table>";