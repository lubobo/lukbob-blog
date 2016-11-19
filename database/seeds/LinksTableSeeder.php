<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $link=new \App\Links();
        $link->ip='120.27.117.245';
        $link->name='lukbob';
        $link->owner='Bob';
        $link->status='小胡子陸bebe';
        $link->save();
    }
}
