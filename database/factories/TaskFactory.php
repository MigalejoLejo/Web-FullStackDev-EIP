<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TaskFactory extends Factory {

    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->text,
            'list_id' => $this->faker->randomDigitNotNull,
            'checked' => false,
        ];
    }

    /**
     * Create a Task with specific title and description.
     *
     * @param string $title
     * @param string $description
     * @return \Database\Factories\TaskFactory
     */
    public function withAttributes(string $title, string $description, int $list_id): TaskFactory {
        return $this->state(function (array $attributes) use ($title, $description, $list_id) {
            return [
                'title' => $title,
                'description' => $description,
                'list_id' => $list_id,
            ];
        });
    }
}
