<?php

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Str;

    class UsersTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $data = [
                [
                    'name' => 'admin',
                    'email' => 'a@a.ru',
                    'password' => bcrypt(12345678),
                ],
                [
                    'name' => 'user',
                    'email' => 'u@u.ru',
                    'password' => bcrypt(12345678),
                ],
                [
                    'name' => 'sasha',
                    'email' => 'admin@admin.ru8',
                    'password' => bcrypt(12345678),
                ],
                [
                    'name' => 'masha',
                    'email' => 'admin@admin.ru9',
                    'password' => bcrypt(12345678),
                ],
                [
                    'name' => 'pasha',
                    'email' => 'admin@admin.ru10',
                    'password' => bcrypt(12345678),
                ],
                [
                    'name' => 'misha',
                    'email' => 'admin@admin.ru11',
                    'password' => bcrypt(12345678),
                ],
                [
                    'name' => 'dasha',
                    'email' => 'admin@admin.ru12',
                    'password' => bcrypt(12345678),
                ],
                [
                    'name' => 'olia',
                    'email' => 'admin@admin.ru13',
                    'password' => bcrypt(12345678),
                ],
                [
                    'name' => 'kolia',
                    'email' => 'admin@admin.ru14',
                    'password' => bcrypt(12345678),
                ],
                [
                    'name' => 'oleg',
                    'email' => 'admin@admin.ru15',
                    'password' => bcrypt(12345678),
                ],
                [
                    'name' => 'ira',
                    'email' => 'admin@admin.ru16',
                    'password' => bcrypt(12345678),
                ],
                [
                    'name' => 'nastia',
                    'email' => 'admin@admin.ru17',
                    'password' => bcrypt(12345678),
                ],
            ];
            DB::table('users')->insert($data);
        }

    }
