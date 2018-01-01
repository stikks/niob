<?php
/**
 * Created by PhpStorm.
 * User: stikks
 * Date: 8/4/16
 * Time: 6:10 PM
 */
$pdo = new PDO('mysql:dbname=niob;host=localhost;user=root;password=');
//    $pdo = new PDO('mysql:dbname=lagosnio_niob;host=localhost;user=lagosnio_admin;password=UpR}8cl-u$wb');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$list = array();
$users = "CREATE TABLE IF NOT EXISTS users (
    id serial,
	username varchar (50) PRIMARY KEY,
	password varchar (255) NOT NULL,
	is_admin BOOL DEFAULT FALSE,
	updated_at date DEFAULT NULL,
	created_at date DEFAULT NULL
	);";

array_push($list, $users);

$info = "CREATE TABLE IF NOT EXISTS niob_info(
  id serial PRIMARY KEY,
  surname varchar (255) NOT NULL,
  other_names TEXT NOT NULL,
  title varchar (255) NOT NULL,
  gender varchar (255) NOT NULL,
  religion varchar (255) NOT NULL,
  phone varchar (255) NOT NULL,
  email varchar (255) NOT NULL,
  address TEXT NULL,  
  membership_cadre varchar (255) NOT NULL,
  member_registration_number varchar (255) NOT NULL,
  niob_admission_date varchar (10) NOT NULL,
  
  status VARCHAR (50) NOT NULL,
  corbon_number varchar (255) NULL,
  dob date DEFAULT NULL,
  school TEXT NOT NULL,
  highest_acad_qual varchar (100) NOT NULL,
  year_education varchar (10) NOT NULL,
  current_employer TEXT NOT NULL,
  position_held TEXT NOT NULL,
  additional_info TEXT NOT NULL,
  passport TEXT NOT NULL,
  updated_at date DEFAULT NULL,
  created_at date DEFAULT NULL,
  FOREIGN KEY (phone) REFERENCES users(username)
);";

array_push($list, $info);

$bk = "CREATE TABLE IF NOT EXISTS accounts(
  id serial PRIMARY KEY,
  bank VARCHAR (255) NOT NULL,
  account_name TEXT NOT NULL,
  account_number VARCHAR (20) NOT NULL,
  account_code VARCHAR (50) NOT NULL,
  updated_at date DEFAULT NULL,
  created_at date DEFAULT NULL
);";

array_push($list, $bk);


$text = "CREATE TABLE IF NOT EXISTS payment_types(
  id serial PRIMARY KEY,
  name TEXT NOT NULL,
  code varchar (255) NOT NULL,
  account_id INT NOT NULL,
  price FLOAT DEFAULT 0.0
);";

array_push($list, $text);

$grd = "CREATE TABLE IF NOT EXISTS cadres(
  id serial PRIMARY KEY,  
  class VARCHAR (255) NOT NULL,
  name TEXT NOT NULL,
  price FLOAT DEFAULT 0.0
);";

array_push($list, $grd);

$pq = "CREATE TABLE IF NOT EXISTS payment_reference(
  id serial PRIMARY KEY,
  username VARCHAR (255) NOT NULL,
  amount FLOAT DEFAULT 0.0,
  reference TEXT NOT NULL,
  description TEXT NOT NULL,
  status BOOL DEFAULT FALSE,
  updated_at datetime DEFAULT NULL,
  created_at DATETIME DEFAULT NULL
);";

array_push($list, $pq);

foreach ($list as $data) {
    $pdo->exec($data);
}

$et = "INSERT INTO users
  (username , password, is_admin, created_at, updated_at)
VALUES
  ('admin', '21232f297a57a5a743894a0e4a801fc3', TRUE, CURRENT_DATE, CURRENT_DATE);";

$obj = $pdo->prepare($et);
$obj->execute();

$accounts = array(
    array('bank'=>'Access Bank', 'account_number'=>'0017947842', 'account_name'=>'Nigerian institute of Building  Lagos State chapter',
        'account_code'=>'ACCT_vyyfxz4hseldlw3'),
    array('bank'=>'Access Bank', 'account_number'=>'0690231342', 'account_name'=>'Nigerian Institute of Building AGM ACCT',
        'account_code'=>'ACCT_n8mcxm4s0zlizfm')
);

foreach ($accounts as $act) {
    $bank = $act['bank'];
    $acct_name = $act['account_name'];
    $bank_acct = $act['account_number'];
    $acct_code = $act['account_code'];

    $et = "INSERT INTO accounts (bank , account_name, account_number, account_code, created_at, updated_at) VALUES ('$bank', '$acct_name', '$bank_acct', '$acct_code' ,CURRENT_DATE, CURRENT_DATE);";
    $obj = $pdo->prepare($et);
    $obj->execute();
}

$paymentTypes = array(
    array('code'=>'mem_enrol_fees', 'name'=> 'Membership Enrollment Fees', 'account_id'=>'1',
    'grades'=>array(array('name'=>'Fellow'), array('name'=>'Corporate'), array('name'=>'Graduate'), array('name'=>'Associate'),
        array('name'=>"Licentiate"), array('name'=>'Technician'), array('name'=>'Student'), array('name'=>'Craftmen')
    )),

    array('code'=>'annual_dues', 'name'=>'Annual Dues', 'account_id'=>'1'),

    array('code'=>'late_exam_form', 'name'=>'Late Submission of Exam Form', 'account_id'=>'1'),
    array('code'=>'interview','name'=>'Interview', 'account_id'=>'1'),
    array('code'=>'donations', 'name'=>'Donations', 'account_id'=>'1'),
    array('code'=>'corp_cert', 'name'=>'Corporate Certificate', 'account_id'=>'2'),
    array('code'=>'arrears_prior_2010', 'name'=>'Arrears Prior 2010', 'account_id'=>'1'),

    array('code'=>'agm','name'=>'Annual General Meeting', 'account_id'=>'2'),

    array('code'=>'workshop', 'name'=>'Workshop', 'account_id'=>'2'),
    array('code'=>'mentoring', 'name'=>'Mentoring Program', 'account_id'=>'2'),
    array('code'=>'seminars', 'name'=>'Seminars', 'account_id'=>'2'),
    array('code'=>'proc_fee','name'=>'Membership Processing Fee', 'account_id'=>'1'),
    array('code'=>'by-law', 'name'=>'By-law', 'account_id'=>'1'),
    array('code'=>'levies_fees', 'name'=>'Levies/Fees', 'account_id'=>'1'),
    array('code'=>'annual_dues_2009', 'name' => 'Annual Dues 2009', 'account_id'=>'1'),
    array('code'=>'annual_dues_2010', 'name' => 'Annual Dues 2010', 'account_id'=>'1'),
    array('code'=>'annual_dues_2011', 'name' => 'Annual Dues 2011', 'account_id'=>'1'),
    array('code'=>'annual_dues_2012', 'name' => 'Annual Dues 2012', 'account_id'=>'1'),
    array('code'=>'annual_dues_2013', 'name' => 'Annual Dues 2013', 'account_id'=>'1'),
    array('code'=>'annual_dues_2014', 'name' => 'Annual Dues 2014', 'account_id'=>'1'),
    array('code'=>'annual_dues_2015', 'name' => 'Annual Dues 2015', 'account_id'=>'1'),
    array('code'=>'annual_dues_2016', 'name' => 'Annual Dues 2016', 'account_id'=>'1'),
    array('code'=>'annual_dues_2017', 'name' => 'Annual Dues 2017', 'account_id'=>'1'));

foreach ($paymentTypes as $pt) {
    $code = $pt['code'];
    $name = $pt['name'];
    $acct_id = $pt['account_id'];

    $det = "INSERT INTO `payment_types` (code , name, account_id) VALUES ('$code', '$name', $acct_id);";
    $obj = $pdo->prepare($det);
    $obj->execute();

//    if ($resp == true && array_key_exists('grades', $pt)) {
//        foreach ($pt['grades'] as $gd) {
//            $name = $gd['name'];
//
//            $xet = "INSERT INTO `grades` (pt_code , name) VALUES ('$code', '$name');";
//            $obj = $pdo->prepare($xet);
//            $resp = $obj->execute();
//        }
//    }
}

$grades =  array(array('name'=>'Fellow', 'class'=>'registered'), array('name'=>'Corporate', 'class'=>'registered'),
    array('name'=>'Corporate', 'class'=>'non_registered'),
    array('name'=>'Graduate', 'class'=>'non_registered'), array('name'=>'Associate', 'class'=>'non_registered'),
    array('name'=>"Licentiate", 'class'=>'non_registered'), array('name'=>'Technician', 'class'=>'non_registered'),
    array('name'=>'Student', 'class'=>'non_registered'), array('name'=>'Craftmen', 'class'=>'non_registered'));

foreach ($grades as $gd) {
    $class = $gd['class'];
    $nm = $gd['name'];
    $gte = "INSERT INTO `cadres` (class , name) VALUES ('$class', '$nm');";
    $obj = $pdo->prepare($gte);
    $obj->execute();
}


echo 'Complete';
die();