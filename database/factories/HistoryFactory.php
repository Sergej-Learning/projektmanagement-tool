<?php

namespace Database\Factories;

use App\Models\History;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\History>
 */
class HistoryFactory extends Factory
{
    protected $model = History::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => null,   // Wird im Seeder gesetzt
            'user_id' => null,      // Wird im Seeder gesetzt
            'action' => $this->faker->randomElement([
                'Projekt erstellt',
                'Task erstellt',
                'Status geändert',
                'Task abgeschlossen'
            ]),
        ];
    }
}
