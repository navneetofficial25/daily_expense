<?php 
$conn = mysqli_connect('64.20.38.219', 'namecom_eniac', '@navneet1', 'namecom_eniac');
$host = $_REQUEST['message_id'];
$url = $_REQUEST['url'];
$sql = "UPDATE send_report SET clicked_by = (SELECT clicked_by FROM send_report WHERE message_id=$host) + 1 WHERE message_id=$host";

if ($conn->query($sql) === TRUE) {
  echo '<script>window.location.href = "'.$url.'"</script>';
} else {
  echo '<script>window.location.href = "'.$url.'"</script>';
}



?>