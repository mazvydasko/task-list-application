<?php

use App\Task;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++) {
            $task = new Task();
            $task->task_name = $faker->text(20);
            $task->task_description = $faker->text(100);
            $task->status_id = 3;
            $task->save();
        }
    }
}
