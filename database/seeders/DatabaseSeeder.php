<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
use App\Models\TaskList;
use App\Models\Users_Tasklists;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Mario',
            'email' => 'mario@example.com',
        ]);

        User::factory()->create([
            'name' => 'Luigi',
            'email' => 'luigi@example.com',
        ]);

        User::factory()->create([
            'name' => 'Peach',
            'email' => 'peach@example.com',
        ]);

        TaskList::factory()->create([
            'name' => 'Inbox',
        ]);
        TaskList::factory()->create([
            'name' => 'Inbox',
        ]);
        TaskList::factory()->create([
            'name' => 'Inbox',
        ]);

        TaskList::factory()->create([
            'name' => 'Sacar los fantasmas de Mansión de Luigi',
        ]);

        TaskList::factory()->create([
            'name' => 'Salvar a la Princesa Peach de bowser (otra vez)',
        ]);

        TaskList::factory()->create([
            'name' => 'Conseguir novia',
        ]);

        TaskList::factory()->create([
            'name' => 'Governar el reino champiñón',
        ]);

        Users_Tasklists::factory()->create([
            'user_id' => 1,
            'list_id' => 1,
        ]);

        Users_Tasklists::factory()->create([
            'user_id' => 2,
            'list_id' => 2,
        ]);

        Users_Tasklists::factory()->create([
            'user_id' => 3,
            'list_id' => 3,
        ]);

        Users_Tasklists::factory()->create([
            'user_id' => 1,
            'list_id' => 4,
        ]);

        Users_Tasklists::factory()->create([
            'user_id' => 1,
            'list_id' => 5,
        ]);

        Users_Tasklists::factory()->create([
            'user_id' => 2,
            'list_id' => 5,
        ]);

        Users_Tasklists::factory()->create([
            'user_id' => 2,
            'list_id' => 6,
        ]);

        Users_Tasklists::factory()->create([
            'user_id' => 3,
            'list_id' => 7,
        ]);

        Task::factory()->create([
            'title' => 'Espantar a King Buu',
            'description' => 'Este fantasma esta volviendo loco a Luigi',
            'list_id' => 4,
        ]);

        Task::factory()->create([
            'title' => 'Encontrar el Barco flotante de Bowser',
            'description' => 'Un toad dijo que lo vio flotando por la senda de chocolate',
            'list_id' => 5,
        ]);

        Task::factory()->create([
            'title' => 'Encontrar una Power Star',
            'description' => 'Puede ayudar contra Bowser',
            'list_id' => 5,
        ]);

        Task::factory()->create([
            'title' => 'Hablar con Toad',
            'description' => 'Puede que tenga información sobre las estrellas',
            'list_id' => 5,
        ]);

        Task::factory()->create([
            'title' => 'Invitar a salir a Daisy',
            'description' => '',
            'list_id' => 6,
        ]);

        Task::factory()->create([
            'title' => 'Hacer reforzar la seguridad',
            'description' => 'Bowser me ha vuelto a secuestrar... que horror',
            'list_id' => 7,
        ]);
    }
}
