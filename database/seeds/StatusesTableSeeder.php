<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

            $status1 = new Status();
            $status1->name = 'Delayed';
            $status1->save();

            $status2 = new Status();
            $status2->name = 'Completed';
            $status2->save();

            $status3 = new Status();
            $status3->name = 'Not Completed';
            $status3->save();

    }
}
