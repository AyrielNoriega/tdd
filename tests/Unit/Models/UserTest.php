<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_has_many_repositories(): void
    {
        $user = new User;

        $this->assertInstanceOf(Collection::class, $user->repositories);
    }
}
