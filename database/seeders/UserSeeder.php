<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Skill;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = Skill::all();

        User::factory(100)
            ->create()
            ->each(
                function(User $user) use ($skills){
                    $ran = rand(1,10);
                    $user->skills()->point = rand(1,10);

                    $user->skills()->attach(
                        $skills->random($ran)->pluck("id")->toArray(),
                    );
                }
            );
    }
}
