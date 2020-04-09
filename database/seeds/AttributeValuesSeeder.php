<?php

    use Illuminate\Database\Seeder;

    class AttributeValuesSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $data = [
                 ['value' => 'Механика с автоподзаводом', 'attr_group_id' => '1'],
                 ['value' => 'Механика с ручным заводом', 'attr_group_id' => '1'],
                 ['value' => 'Кварцевый от батарейки', 'attr_group_id' => '1'],
                 ['value' => 'Кварцевый от солнечного аккумулятора', 'attr_group_id' => '1'],
                 ['value' => 'Сапфировое', 'attr_group_id' => '2'],
                 ['value' => 'Минеральное', 'attr_group_id' => '2'],
                 ['value' => 'Полимерное', 'attr_group_id' => '2'],
                 ['value' => 'Стальной', 'attr_group_id' => '3'],
                 ['value' => 'Кожаный', 'attr_group_id' => '3'],
                 ['value' => 'Каучуковый', 'attr_group_id' => '3'],
                 ['value' => 'Полимерный', 'attr_group_id' => '3'],
                 ['value' => 'Нержавеющая сталь', 'attr_group_id' => '4'],
                 ['value' => 'Титановый сплав', 'attr_group_id' => '4'],
                 ['value' => 'Латунь', 'attr_group_id' => '4'],
                 ['value' => 'Полимер', 'attr_group_id' => '4'],
                 ['value' => 'Керамика', 'attr_group_id' => '4'],
                 ['value' => 'Алюминий', 'attr_group_id' => '4'],
                 ['value' => 'Аналоговые', 'attr_group_id' => '5'],
                 ['value' => 'Цифровые', 'attr_group_id' => '5'],

            ];
            DB::table('attribute_values')->insert($data);
        }
    }
