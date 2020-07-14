<?php

    use Illuminate\Database\Seeder;
    use App\Models\BlogPosts;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
            $this->call(UsersTableSeeder::class);
            $this->call(BlogCategoriesTableSeeder::class);
            factory(BlogPosts::class, 100)->create();
        }
    }
