<?php 
// require_once __DIR__ . '/vendor/autoload.php';
require_once 'includes/databas.php';
$conn = new Database();
$conction = $conn->getConnection();

$player = [
    'playerID'=>1,
    'NameCOM'=> 'ahmed',
    'position'=>'st',
    'rating'=>55
];

// $conn->insertRecord($conction,'players' ,$player );



$modfcatin = [
    'NameCOM'=> 'harkas',
    'position'=>'cb',
    'rating'=>55
];

// $conn->updateRecord($conction,'players' ,$modfcatin,1 );


// $conn->deleteRecord($conction,'players' ,3 );
$players = $conn->select('players');

        echo '<pre>';
        print_r($players) ;
        echo '</pre>';




