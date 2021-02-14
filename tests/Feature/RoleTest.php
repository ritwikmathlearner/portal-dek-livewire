<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function super_admin_can_create_role()
    {
        $this->withoutExceptionHandling();

        $this->be(factory(User::class)->create());

        $this->get('/role/create')->assertRedirect();
    }
}
