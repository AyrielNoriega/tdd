<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
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

        $this->assetInstanceOf(Collection::class, $user->repositories);
    }
}
