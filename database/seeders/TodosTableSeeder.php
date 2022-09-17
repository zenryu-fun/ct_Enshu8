<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '起床',
            'user_id' => 1,
            'tag_id' => 1,
        ];
        Todo::create($param);
        $param = [
            'name' => '出勤',
            'user_id' => 1,            
            'tag_id' => 5,
        ];
        Todo::create($param);
        $param = [
            'name' => '昼休憩',
            'user_id' => 1,
            'tag_id' => 4,
        ];
        Todo::create($param);
        $param = [
            'name' => '退勤',
            'user_id' => 1,
            'tag_id' => 5,
        ];
        Todo::create($param);
        $param = [
            'name' => '就寝',
            'user_id' => 1,
            'tag_id' => 1,
        ];
        Todo::create($param);

    }
}
