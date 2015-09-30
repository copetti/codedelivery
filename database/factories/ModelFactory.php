<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(CodeDelivery\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10)
    ];
});

$factory->define(CodeDelivery\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->define(CodeDelivery\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'category_id' => $faker->numberBetween(1,10),
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween(10,59)
    ];
});

$factory->define(CodeDelivery\Models\Client::class, function (Faker\Generator $faker) {
    return [
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'zipcode' => $faker->postcode
    ];
});

$factory->define(CodeDelivery\Models\Order::class, function (Faker\Generator $faker) {

    $status = $faker->numberBetween(0,3);
    return [
        'client_id' => $faker->numberBetween(5,10),
        'user_deliveryman_id' => ($status>=2) ? $faker->numberBetween(2,4): null,
        'total' => $faker->numberBetween(100,300),
        'status' => $status
    ];
});

$factory->define(CodeDelivery\Models\OrderItem::class, function (Faker\Generator $faker) {
    return [
        'product_id' => $faker->numberBetween(1,60),
        'order_id' => $faker->numberBetween(1,10),
        'price' => $faker->numberBetween(10,59),
        'qtd' => $faker->numberBetween(1,10)
    ];
});