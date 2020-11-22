<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use App\Author;
use App\Branch;
use App\Editor;
use App\Issue;
use App\Journal;
use App\Keyword;
use App\Lnew;
use App\Photo;
use App\Researchtopic;
use App\User;
use App\Volume;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'admin' => $faker->randomElement([0, 1]),
    ];
});

$factory->define(Journal::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'issn' => $faker->sentence,
        'status' => $faker->randomElement([0, 1]),
    ];
});

$factory->define(Volume::class, function (Faker $faker) {

    //$journalid = Journal::all()->random()->id;

    return [
        'volume_no' => $faker->numberBetween(1,12),
        'year' => $faker->year,
        //'journal_id' => $journalid,
    ];
});

$factory->define(Issue::class, function (Faker $faker) {

    //$journalid = Journal::all()->random()->id;
    //$volumeid = Volume::all()->random()->id;

    return [
        'issue_no' => $faker->numberBetween(1,4),
        //'journal_id' => $journalid,
        //'volume_no' => $volumeid,
    ];
});

$factory->define(Editor::class, function (Faker $faker) {

    $journalid = Journal::all()->random()->id;

    return [
        'name' => $faker->name,
        'affiliation' => $faker->sentence,
        'chief_in_editor' => $faker->randomElement([0, 1]),
        'journal_id'  => $journalid,
    ];
});

$factory->define(Lnew::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence,
        'body'  => $faker->text,
        'author' => $faker->name,
        'publish_date' => $faker->date(),
    ];
});

$factory->define(Researchtopic::class, function (Faker $faker) {

    $journalid = Journal::all()->random()->id;

    return [
        'title' => $faker->sentence,
        'overview' => $faker->text,
        'editor1' => $faker->name,
        'editor2' => $faker->name,
        'editor3' => $faker->name,
        'editor4' => $faker->name,
        'journal_id' => $journalid,
    ];
});

$factory->define(Article::class, function (Faker $faker) {

    $journalid = Journal::all()->random()->id;
    //$volumeid = Volume::all()->random()->id;
    //$issueid = Issue::all()->random()->id;
    $rtopicid = Researchtopic::all()->random()->id;

    return [
        'title' => $faker->sentence,
        'abstract' => $faker->text,
        'publication_date' => $faker->date(),
        'link' => $faker->url,
        'doi' => $faker->url,
        'status' => $faker->randomElement([0,1]),
        'start_page' => $faker->randomDigit,
        'end_page' => $faker->randomDigit,
        'journal_id' => $journalid,
        'volume' => $faker->randomDigit,
        'issue' => $faker->randomDigit,
        'year' => $faker->year,
        'rtopic_id' => $rtopicid,
        'authors' => $faker->name,
        'keywords' => $faker->word,
    ];
});

$factory->define(Author::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'affiliation' => $faker->sentence,
    ];
});

$factory->define(Branch::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence,
        'address' => $faker->sentence,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
    ];
});

$factory->define(Keyword::class, function (Faker $faker) {

    return [
        'keyword' => $faker->word,
    ];
});

$factory->define(Photo::class, function (Faker $faker) {

    $filename = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg'];
    $journalid = Journal::all()->random()->id;
    $rtopicid = Researchtopic::all()->random()->id;
    $lnewid = Lnew::all()->random()->id;
    $photoable_id = $faker->randomElement([$journalid, $rtopicid, $lnewid]);

        if ($photoable_id == $journalid) {
             $photoable_type = 'App\Journal';
        }elseif ($photoable_id == $rtopicid) {
             $photoable_type = 'App\Researchtopic';
        }elseif ($photoable_id == $lnewid){
             $photoable_type = 'App\Lnew';
        }


    return [
        'filename' => $faker->randomElement($filename),
        'photoable_id' => $photoable_id,
        'photoable_type' => $photoable_type,
    ];
});
