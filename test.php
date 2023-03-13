<?php

include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Faker\Factory as Faker;

$faker = Faker::create();
$table = new UsersTable(new MySQL);
// $table->insert([
//     "name" => $faker->name,
//     "email" => $faker->email,
//     "phone" =>  $faker->phoneNumber,
//     "address" => $faker->address,
//     "password" => "password"
// ]);

print_r($table->getAll());
