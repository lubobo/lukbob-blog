<?php

use Illuminate\Database\Seeder;

class tagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag=new \App\Tag();
        $tag->name='laravel';
        $tag->save();

        $tag=new \App\Tag();
        $tag->name='php5';
        $tag->save();

        $tag=new \App\Tag();
        $tag->name='ubuntu';
        $tag->save();

        $tag=new \App\Tag();
        $tag->name='陈奕迅';
        $tag->save();
    }
}
