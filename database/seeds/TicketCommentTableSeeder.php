<?php

use Faker\Generator;
use TeachMe\Entities\TicketComment;

class TicketCommentTableSeeder extends BaseSeeder{

    protected function getModel()
    {
        return new TicketComment();
    }

    protected function getDummyData(Generator $faker)
    {
        return [
            'comment'   => $faker->paragraph(),
            'user_id'   => $this->getRandom('User')->id,
            'ticket_id' => $this->getRandom('Ticket')->id
        ];
    }

    public function run()
    {
        $this->createMultiple(100);
    }
}