<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ACtivities>
 */
class ActivitiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // Define an array of image filenames from your public assets
        $posters = [
            '1.jpg',
            '2.jpg',
            '3.jpg',  // Add as many images as you have
        ];

        // Select a random image
        $selectedPoster = $this->faker->randomElement($posters);

        $posterPath = public_path('assets/Activities/' . $selectedPoster);

        // Ensure the file exists in the public directory
        if (file_exists($posterPath)) {
            // Generate a unique filename for the storage
            $newPosterPath = 'public/posters/' . $selectedPoster;
        
            // Copy the file to the storage/app/public directory
            Storage::putFile($newPosterPath, $posterPath);
        
            // Generate the URL for the copied image
            $posterUrl = Storage::url($newPosterPath);
        } else {
            $posterUrl = null; // Handle cases where the file doesn't e
        }
        return [
            'activity_id' => $this->faker->unique()->uuid,
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'published_date' => $this->faker->dateTimeThisYear,
            'type' => $this->faker->word,
            'subject' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'poster' => $posterUrl,
            'date' => $this->faker->date,
            'start' => $this->faker->time,
            'end' => $this->faker->time,
            'publisher' => $this->faker->name,
            'is_featured' => $this->faker->boolean,
            'visible_to_list' => json_encode($this->faker->randomElements(['PEI', 'SL SEARCH', 'SL TEMPS', 'WESEARCH', 'PEI-UPSKILLS'], rand(1, 3))),
            'deleted_at' => $this->faker->optional()->dateTime,
        ];
    }
}
