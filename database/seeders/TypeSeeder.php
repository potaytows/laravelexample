<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TodoType;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds=[
            ["typeName"=>"ธรรมดา"],
            ["typeName"=>"สำคัญ"],

            
        ];
        foreach($seeds as $key => $value){
            TodoType::create($value);
        }
    }
}
