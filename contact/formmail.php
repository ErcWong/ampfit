<?php
/**
 * FormMailer dispatcher script
 */
include_once('messages.php'); // language file
require_once('/usr/local/scripts/formmailer/src/server-wide/class.FormMailer.php'); 
$encoding = 'utf-8';
try {
    // Choose the data array depending on the request received
    // POST requests have priority over GET
    if ($_POST) {
        $data = $_POST;
    } elseif ($_GET) {
        $data = $_GET;
    } else { 
        throw new Exception(ERR_NO_DATA);
    }

    // load the data and the configuration
    $config_file_path = 'config.php';
    $formmail = new FormMailer($data, $config_file_path);
	$encoding = $formmail->encoding;
    // the heart of the matter
    $status = $formmail->process();

} catch (Exception $e) {
    // if something did not work as expected, show an error message.
	header('Content-Type: text/html; charset='.$encoding);
    echo $e->getMessage();
}
?>
