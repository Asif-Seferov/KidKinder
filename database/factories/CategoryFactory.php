<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text,
            'status' => $this->faker->boolean,
            'feature_status' =>$this->faker->boolean,
            'order' => random_int(0, 10),
            'seo_description' => $this->faker->text,
            'seo_keywords' => Str::slug($this->faker->address, ", "),
        ];
    }
}
