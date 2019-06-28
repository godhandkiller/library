<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'name'          => 'Drama',
                'description'   => 'The drama genre is strongly based in a character, or characters, that are in conflict at a crucial moment in their lives. Most dramas revolve around families and often have tragic or painful resolutions.',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Horror',
                'description'   => 'Horror stories are designed to evoke fear, fascination, or revulsion in the reader. This is done either through supernatural elements or psychological circumstances. Sometimes horror is also considered dark fantasy because the laws of nature must be violated in some way, qualifying the story as fantastic.',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Romance',
                'description'   => 'Romance genre stories involve chivalry and often adventure. The prevailing type of story in the romance genre consists of a love relationship between a man and a woman, often from the woman’s point of view. There is always conflict that hinders the relationship, but is resolved to a happy ending.',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Crime',
                'description'   => 'Crime fiction involves a crime in some way: a crime being committed, or having been committed. A crime story can also be about a criminal’s life. Often crime fiction crosses over or meshes with the suspense, thriller, detective, mystery, action, and/or adventure genres.',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Fantasy',
                'description'   => 'Fantasy genre stories revolve around magic or supernatural forces, rather than technology. Stories from the fantasy genre are set in fanciful, invented worlds or in a legendary, mythic past that rely on the outright invention of magic.',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Sci-fi',
                'description'   => 'Sci-fi is a broad genre of fiction that often involves speculations based on current or future science or technology.',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],

        ]);
    }
}
