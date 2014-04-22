<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include 'Price.php';
include 'PriceRestriction.php';

echo '<pre>';


$test_1 = new Price();
$test_1_pr = new PriceRestriction(array(
    'startTime' => '',
    'endTime' => '',
    'weekDays' => '',
));
$test_1->addPriceRestriction($test_1_pr);
$result = $test_1->checkPriceRestriction(new DateTime());


echo 'test case #1:<br/>';
print_r((array) $test_1_pr);
echo 'result: ';
echo $result ? 'true' : 'false';
echo '<br/>-------------<br/><br/><br/>';




$test_2 = new Price();
$test_2_pr = new PriceRestriction(array(
    'startTime' => '20:00',
    'endTime' => '',
    'weekDays' => '',
));
$test_2->addPriceRestriction($test_2_pr);
$result = $test_2->checkPriceRestriction(new DateTime());


echo 'test case #2:<br/>';
print_r((array) $test_2_pr);
echo 'result: ';
echo $result ? 'true' : 'false';
echo '<br/>-------------<br/><br/><br/>';




$test_3 = new Price();
$test_3_pr = new PriceRestriction(array(
    'startTime' => '18:00',
    'endTime' => '18:01',
    'weekDays' => '2',
));
$test_3->addPriceRestriction($test_3_pr);
$result = $test_3->checkPriceRestriction(new DateTime());


echo 'test case #3:<br/>';
print_r((array) $test_3_pr);
echo 'result: ';
echo $result ? 'true' : 'false';
echo '<br/>-------------<br/><br/><br/>';



$test_4 = new Price();
$test_4_pr = new PriceRestriction(array(
    'startTime' => '20:00',
    'endTime' => '19:59',
    'weekDays' => '1',
));
$test_4->addPriceRestriction($test_4_pr);
$result = $test_4->checkPriceRestriction(new DateTime());


echo 'test case #4:<br/>';
print_r((array) $test_4_pr);
echo 'result: ';
echo $result ? 'true' : 'false';
echo '<br/>-------------<br/><br/><br/>';




$test_5 = new Price();
$test_5_pr = new PriceRestriction(array(
    'startTime' => '',
    'endTime' => '',
    'weekDays' => '5',
));
$test_5->addPriceRestriction($test_5_pr);
$result = $test_5->checkPriceRestriction(new DateTime());


echo 'test case #5:<br/>';
print_r((array) $test_5_pr);
echo 'result: ';
echo $result ? 'true' : 'false';
echo '<br/>-------------<br/><br/><br/>';