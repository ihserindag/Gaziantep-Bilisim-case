<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title=$this->faker->sentence(rand(1,3));
        return [
           'image'=>"https://picsum.photos/1200/350?random=".mt_rand(1, 55000),
           'title'=>$title,
           'slug'=>Str::slug($title,'-'),
           'description'=>$this->faker->text(300),
           'created_at'=>$this->faker->dateTime(),
            'updated_at'=>$this->faker->dateTime()

        ];
    }
}
