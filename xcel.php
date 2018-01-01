<?php
/**
 * Created by PhpStorm.
 * User: stikks
 * Date: 12/12/17
 * Time: 3:03 PM
 */
require (__DIR__.'/vendor/autoload.php');
include(__DIR__.'/dbconnect.php');


class EmptyFilter implements PHPExcel_Reader_IReadFilter {
    public function readCell($column, $row, $worksheetName = '')
    {
        // TODO: Implement readCell() method.
        foreach ($row->getCellIterator() as $item) {
            if ($item->getValue()) {
                return true;
            }
        }
        return false;
    }
}

$reader = PHPExcel_IOFactory::createReaderForFile("books.xls");
$reader->setReadDataOnly();
$reader->setLoadAllSheets();

//$filter = new EmptyFilter();
//$reader->setReadFilter($filter);

$data = $reader->load("books.xls");

$sheets = $data->getSheetNames();
//
$dataArray = array();

foreach ($sheets as $name) {
    $data->setActiveSheetIndexByName($name);
    $wkData = array();
    $worksheet = $data->getActiveSheet();
    $title = $worksheet->getTitle();

//    switch ($title) {
//
//        case 'Registerd':
//            $contactColumn = 'H';
//            break;
//        case 'Fellowship':
//            $contactColumn = 'F';
//            break;
//        case in_array($title, array('Graduate', 'Non_Registered', 'Associate', 'Sheet1')):
//            $contactColumn = 'E';
//            break;
//        case in_array($title, array('Licentiates', 'Student')):
//            $contactColumn = 'D';
//            break;
//        default:
//            $contactColumn = 'H';
//    };
//
//    foreach ($worksheet->toArray(null, true, true, true) as $item) {
//        if (isset($item[$contactColumn])) {
//            if (!in_array($item[$contactColumn], array('CONTACT', 'PHONE NO'))) {
//                $wkData[] = $item;
//            }
//        }
//    }
    $dataArray[] = $worksheet->toArray(null, true, true, true);
}

$infoData = array();
foreach ($dataArray as $eachData) {
    foreach ($eachData as $cd) {
        $phone = trim($cd['A'], " ");
        $userQuery = mysqli_query($connection, "SELECT * FROM `users` WHERE username = '$phone'");
        if(!$userQuery->fetch_row()) {
            $pw = uniqid('MNIOB');
            $pass = md5($pw);
            $infoData[] = array('phone'=>$phone, 'password'=>$pw);
            $query = mysqli_query($connection, "INSERT INTO `users` (username, password, created_at, updated_at) VALUES ('$phone', '$pass', CURRENT_DATE , CURRENT_DATE)");
            var_dump(mysqli_error($connection));
        }
    }
}
file_put_contents('info.json', json_encode($infoData));
exit();
