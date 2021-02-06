<?php

require_once realpath('vendor/autoload.php');

use Task\Park\StreetCarPark;
use Task\Car\{Bus, LittleCar};


$park = [
    [['a1' => '*'], ['a2' => '#'], ['a3' => '#'], ['a4' => '#'], ['a5' => '#'], ['a6' => '#'], ['a7' => '#']],
    [['b1' => '*'], ['b2' => '#'], ['b3' => '#'], ['b4' => '#'], ['b5' => '#'], ['b6' => '#'], ['b7' => '#']],
    [['c1' => '*'], ['c2' => '#'], ['c3' => '#'], ['c4' => '#'], ['c5' => '#'], ['c6' => '#'], ['c7' => '#']],
    [['d1' => '#'], ['d2' => '#'], ['d3' => '#'], ['d4' => '#'], ['d5' => '#'], ['d6' => '#'], ['d7' => '#']],
    [['e1' => '#'], ['e2' => '#'], ['e3' => '#'], ['e4' => '#'], ['e5' => '#'], ['e6' => '#'], ['e7' => '#']],
    [['f1' => '#'], ['f2' => '#'], ['f3' => '#'], ['f4' => '#'], ['f5' => '#'], ['f6' => '#'], ['f7' => '#']],
    [['g1' => '#'], ['g2' => '#'], ['g3' => '#'], ['g4' => '#'], ['g5' => '#'], ['g6' => '#'], ['g7' => '#']],
    [['h1' => '#'], ['h2' => '#'], ['h3' => '#'], ['h4' => '#'], ['h5' => '#'], ['h6' => '#'], ['h7' => '*']],
];


$streetCarPark= new StreetCarPark();
$bus = new Bus(3);
$littleCar = new LittleCar(1);

$streetCarPark->setPark($park);
$bus->toPark($streetCarPark);
$littleCar->toPark($streetCarPark);

echo '<pre>';
print_r($littleCar);
echo '<br>';
print_r($bus);
echo '<br>';
print_r($streetCarPark);
echo '<br>';
echo '</pre>';
exit();
