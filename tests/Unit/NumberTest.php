<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Number;

class NumberTest extends TestCase
{

    use RefreshDatabase;
    /** @test */
    public function add_a_new_number_success()
    {
        Number::factory()->create();

        $this->assertCount(1, Number::all());
    }
}
