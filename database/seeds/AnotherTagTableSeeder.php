<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Tag;

class AnotherTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = ['naturopatia', 'zen'];
        foreach($tags as $tag){
            $newTag = new Tag();
            $newTag -> name = $tag;
            $newTag -> slug = Str::slug($tag);
            $newTag -> save();
        }

    }
}
