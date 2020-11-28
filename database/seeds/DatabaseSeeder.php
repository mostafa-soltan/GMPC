<?php
use App\Models\Author;
use App\Models\Keyword;
use Illuminate\Database\Seeder;

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
        factory('App\Models\Journal', 3)->create();
        factory('App\Models\Volume', 1)->create();
        factory('App\Models\Issue', 4)->create();
        factory('App\Models\Editor', 50)->create();
        factory('App\Models\Lnew', 10)->create();
        factory('App\Models\Researchtopic', 30)->create();
        factory('App\Models\Branch', 3)->create();

        $articles = factory('App\Models\Article', 100)->create();
        $keywords = factory('App\Models\Keyword', 300)->create();

        foreach ($articles as $article)
        {
            $keywords_ids = [];
            $keywords_ids[] = Keyword::all()->random()->id;
            $keywords_ids[] = Keyword::all()->random()->id;
            $keywords_ids[] = Keyword::all()->random()->id;
            $keywords_ids[] = Keyword::all()->random()->id;

            $article->keywords()->sync($keywords_ids);
        }

        $authors = factory('App\Models\Author', 300)->create();

        foreach ($articles as $article)
        {
            $authors_ids = [];
            $authors_ids[] = Author::all()->random()->id;
            $authors_ids[] = Author::all()->random()->id;
            $authors_ids[] = Author::all()->random()->id;

            $article->authors()->sync($authors_ids);
        }

        factory('App\Models\Photo', 50)->create();
    }
}
