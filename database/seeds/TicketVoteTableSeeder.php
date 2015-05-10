<?php

use TeachMe\Entities\TicketVote;

class TicketVoteTableSeeder extends BaseSeeder{

    protected function getModel()
    {
        return new TicketVote();
    }

    protected function getDummyData(\Faker\Generator $faker)
    {
        return [
            'user_id'   => $this->getRandom('User')->id,
            'ticket_id' => $this->getRandom('Ticket')->id
        ];
    }

    public function run()
    {
        $this->createMultiple(200);
    }
}