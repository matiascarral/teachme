<?php

use Faker\Generator;
use TeachMe\Entities\Ticket;

class TicketTableSeeder extends BaseSeeder{

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function getModel()
    {
        return new Ticket();
    }

    protected function getDummyData(Generator $faker)
    {
        return [
            'title'     => $faker->sentence(),
            'status'    => $faker->randomElement(['open', 'open', 'closed']),
            'user_id'   => $this->getRandom('User')->id
        ];
    }

    public function run()
    {
        $this->createMultiple(20);
    }
}