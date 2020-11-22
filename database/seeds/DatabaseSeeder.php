<?php

use App\Keyword;
use Illuminate\Database\Seeder;
use App\Author;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User', 10)->create();
        factory('App\Journal', 5)->create();
        factory('App\Volume', 12)->create();
        factory('App\Issue', 4)->create();
        factory('App\Editor', 50)->create();
        factory('App\Lnew', 10)->create();
        factory('App\Researchtopic', 30)->create();
        factory('App\Branch', 3)->create();

        $articles = factory('App\Article', 100)->create();
        $keywords = factory('App\Keyword', 300)->create();

        foreach ($articles as $article)
        {
            $keywords_ids = [];
            $keywords_ids[] = Keyword::all()->random()->id;
            $keywords_ids[] = Keyword::all()->random()->id;
            $keywords_ids[] = Keyword::all()->random()->id;
            $keywords_ids[] = Keyword::all()->random()->id;

            $article->keywords()->sync($keywords_ids);
        }

        $authors = factory('App\Author', 300)->create();

        foreach ($articles as $article)
        {
            $authors_ids = [];
            $authors_ids[] = Author::all()->random()->id;
            $authors_ids[] = Author::all()->random()->id;
            $authors_ids[] = Author::all()->random()->id;

            $article->authors()->sync($authors_ids);
        }

        factory('App\Photo', 50)->create();
    }
}
