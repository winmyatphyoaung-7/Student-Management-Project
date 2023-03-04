<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence($nbWords =2),
            'description' => $this->faker->text($maxNbChars = 50),
            'image' =>  $this->faker->imageUrl($width = 640, $height = 480),
            'category_id' => $this->faker->numberBetween($min=1, $max =5),
            'price' => $this->faker->numberBetween($min = 10000, $max = 100000),
            'qty' => $this->faker->numberBetween($min = 50, $max = 200),
            'start_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'duration' => $this->faker->numberBetween($min = 3, $max = 8)
        ];
    }
}
