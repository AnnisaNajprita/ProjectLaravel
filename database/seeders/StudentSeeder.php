<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('student')->insert([
            'name'=>'Rachi',
            'student_id'=>'1',
            'address'=>'Depok',
            'created_at'=>date ('Y-m-d H:i:s')
        ]);
        DB::table('student')->insert([
            'name'=>'Debby',
            'student_id'=>'2',
            'address'=>'Jakarta',
            'created_at'=>date ('Y-m-d H:i:s')
        ]);
        DB::table('student')->insert([
            'name'=>'Ellina',
            'student_id'=>'3',
            'address'=>'Solo',
            'created_at'=>date ('Y-m-d H:i:s')
        ]);
    }
}
