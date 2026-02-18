<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Resource;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resource>
 */
class ResourceFactory extends Factory
{
    protected $model = Resource::class;

    public function definition()
    {
        
        $name = $this->faker->unique()->words(3, true); 
        return [
            'steam_id' => $this->faker->optional()->numberBetween(100000, 999999), 
            'name' => $name,
            'description' => $this->faker->paragraph(2),
            'url' => $this->faker->url(),
            'release_date' => $this->faker->date(),
            'developer' => $this->faker->company(),
            'publisher' => $this->faker->company(),
            'rating' => $this->faker->numberBetween(0, 100), 
        ];
    }
    
}