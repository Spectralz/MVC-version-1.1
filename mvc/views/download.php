<?php

try{
    $obj = new \classes\CSV($_POST['file']);
    $file = $obj ->fileDownload($_POST['extension']);
}
catch (\classes\Logger $e)
{
    echo 'Mess:'.$e->getMessage();
    $e->log();
}
catch (\Throwable $e)
{
    echo $e->getMessage();
    \classes\Logger::traceLog($e->getMessage(), $e->getTraceAsString());
}

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    exit;
}