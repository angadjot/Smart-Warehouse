<?php
  	require_once('includes/load.php');
  	?>
<!DOCTYPE html>
<html>
<body>

<?php

$startdate  = remove_junk($db->escape("28-11-2015"));
$start_date  = date("Y-m-d", strtotime($startdate));
echo $start_date;
?>

</body>
</html>