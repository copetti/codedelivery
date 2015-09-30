<?php

use CodeDelivery\Models\Client;
use CodeDelivery\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@codedelivery.com',
            'password' => bcrypt(123456),
            'role' => 'admin',
            'remember_token' => str_random(10)
        ]);

        factory(User::class)->create([
            'name' => 'Entregador 1',
            'email' => 'entregador1@codedelivery.com',
            'password' => bcrypt(123456),
            'role' => 'deliveryman',
            'remember_token' => str_random(10)
        ]);

        factory(User::class)->create([
            'name' => 'Entregador 2',
            'email' => 'entregador2@codedelivery.com',
            'password' => bcrypt(123456),
            'role' => 'deliveryman',
            'remember_token' => str_random(10)
        ]);

        factory(User::class)->create([
            'name' => 'Entregador 3',
            'email' => 'entregador3@codedelivery.com',
            'password' => bcrypt(123456),
            'role' => 'deliveryman',
            'remember_token' => str_random(10)
        ]);

        factory(User::class,10)->create()->each(function($u){
            $u->client()->save(factory(Client::class)->make());
        });
    }
}
