<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            $param1 = [
                'id' => 1,
                'category' => "文化"
            ],
            $param2 = [
                'id' => 2,
                'category' => "海"
            ],
            $param3 = [
                'id' => 3,
                'category' => "方言"
            ],
            $param4 = [
                'id' => 4,
                'category' => '漢字'
            ]
        ];
        foreach ($params as $param) {
            DB::table('category')->insert($param);
        }
    }
}
