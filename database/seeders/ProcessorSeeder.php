<?php

namespace Database\Seeders;

use App\Models\Processor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $processors = [
            'All Intel® Processors',
            'Intel® Core™ Ultra 5 vPro®',
            'Intel® Core™ Ultra 7',
            'Intel® Core™ Ultra 5'.
            'Intel® Core™ i5',
            'Intel® Core™ i5 vPro®',
            'Intel® Core™ i3',
            'All AMD Processors',
            'AMD Ryzen™ 5 PRO',
            'AMD Ryzen™ 5',
            'AMD Ryzen™ 3 PRO',
            'AMD Ryzen™ 3',
        ];

        foreach($processors as $processor){
            Processor::create(['name' => $processor]);
        }
    }
}
