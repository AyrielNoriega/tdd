<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Repository;

class RepositoryControllerTest extends TestCase
{

    use WithFaker, RefreshDatabase;

    public function test_guest(): void
    {
        $this->get('repositories')->assertRedirect('login');        // index
        $this->get('repositories/1')->assertRedirect('login');      // show
        $this->get('repositories/1/edit')->assertRedirect('login'); // form de edit
        $this->put('repositories/1')->assertRedirect('login');      // update
        $this->delete('repositories/1')->assertRedirect('login');   // destroy
        $this->get('repositories/create')->assertRedirect('login'); // create
        $this->post('repositories', [])->assertRedirect('login');   // save
    }

    public function test_store()
    {
        //datos de un formulario
        $data = [
            'url' => $this->faker->url,
            'description' => $this->faker->text,
        ];

        //creo un usuario
        $user = User::factory()->create();

        //me conecto con este usuario
        $this->actingAs($user)
            ->post('repositories', $data)
            ->assertRedirect('repositories');

        //validamos si la imformacion se guardo en la db
        $this->assertDatabaseHas('repositories', $data);


    }


    public function test_update()
    {
        $repository = Repository::factory()->create();
        $data = [
            'url' => $this->faker->url,
            'description' => $this->faker->text,
        ];

        $user = User::factory()->create();

        $this->actingAs($user)
            ->put("repositories/$repository->id", $data)
            ->assertRedirect("repositories/$repository->id/edit");

        $this->assertDatabaseHas('repositories', $data);


    }

    // 

    public function test_validate_store()
    {

        //creo un usuario
        $user = User::factory()->create();

        //me conecto con este usuario
        $this->actingAs($user)
            ->post('repositories', [])
            ->assertStatus(302)
            ->assertSessionHasErrors(['url', 'description']);

    }


    public function test_validate_update()
    {
        $repository = Repository::factory()->create();

        $user = User::factory()->create();

        $this->actingAs($user)
            ->put("repositories/$repository->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors(['url', 'description']);

    }
}
