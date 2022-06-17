<?php

use Illuminate\Database\Seeder;
use App\Tag;

class DeleteDuplicateTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $allTags = Tag::all();
        $tags = [];

        foreach($allTags as $tag){
            if(in_array($tag->name, $tags)){
                $tag->delete();
            }else{
                $tags[] = $tag->name;
            }
        }
    }
}
