<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status=new Status;
        $status->name='PHP';
        $status->save();

        $status1=new Status;
        $status1->name='Python';
        $status1->save();

        $status2=new Status;
        $status2->name='Linux';
        $status2->save();

        $status3=new Status;
        $status3->name='JavaScript';
        $status3->save();
    }
}
