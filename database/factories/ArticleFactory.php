<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
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
            'category_id' => random_int(1,10),
            'user_id' => random_int(1, 10),
            'slug' => Str::slug($name),
            'body' => $this->faker->text,
            'status' => $this->faker->boolean,
            'tags' => random_int(1,10),
            'seo_keywords' => Str::slug($this->faker->address, ", "),
            'seo_description' => $this->faker->text,
            'read_count' => random_int(0, 2000),
            'like_count' => random_int(1, 100),
            'view_count' => random_int(1, 100),
            'publish_date' => $this->faker->dateTime
        ];
    }
}
