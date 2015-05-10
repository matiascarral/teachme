<?php

use Faker\Generator;
use TeachMe\Entities\User;

class UserTableSeeder extends BaseSeeder {

    /**
     * @return User
     */
    protected function getModel()
    {
        return new User();
    }

    protected function getDummyData(Generator $faker)
    {
        return [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('123456')
        ];
    }

    public function run()
    {
        $this->createAdmin();

        $this->createMultiple(50);
    }

    private function createAdmin()
    {
        $this->create([
            'name' => 'Administrator',
            'email' => 'matiascarral@gmail.com',
        ]);
    }
}