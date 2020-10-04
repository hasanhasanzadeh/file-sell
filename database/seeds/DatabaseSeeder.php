<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {

            DB::table('users')->insert([ //,

                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'mobile' => $faker->unique()->phoneNumber,
                'level' => "user",
                'status'=>1,
                'password'=>Hash::make(Str::random(8)),
            ]);
            DB::table('categories')->insert([
                'name'=>$faker->name,
                'meta_title'=>Str::random(20),
                'meta_keywords'=>Str::random(20),
                'meta_description'=>Str::random(20),
            ]);
            DB::table('articles')->insert([
                'title'=>$faker->title,
                'slug'=>$faker->slug,
                'body'=>Str::random(300),
                'category_id'=>1,
                'photo_id'=>1,
                'user_id'=>1,
                'description'=>Str::random(40),
                'tags'=>Str::random(20),
                'meta_title'=>Str::random(20),
                'meta_keywords'=>Str::random(20),
                'meta_description'=>Str::random(20),
            ]);
            DB::table('courses')->insert([
                'title'=>$faker->title,
                'slug'=>$faker->slug,
                'body'=>Str::random(300),
                'price'=>$faker->randomDigit,
                'type'=>'cash',
                'category_id'=>1,
                'photo_id'=>1,
                'user_id'=>1,
                'description'=>Str::random(40),
                'tags'=>Str::random(20),
                'meta_title'=>Str::random(20),
                'meta_keywords'=>Str::random(20),
                'meta_description'=>Str::random(20),
            ]);
        }
    }
}
