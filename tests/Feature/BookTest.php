<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    public function testGuestCanSeeBookPage()
    {
        $response = $this->get(route('book.index'));
        $response->assertViewIs('book.index')
            ->assertStatus(200);
    }

    
}
