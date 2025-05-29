<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Link;

class ShortenerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_shorten_url()
    {
        $response = $this->postJson('/api/shorten', [
            'url' => 'https://example.com',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['short_url', 'code']);
    }

    public function test_redirects_and_logs_click()
    {
        $link = Link::create([
            'original_url' => 'https://example.com',
            'code' => 'ABC123',
        ]);

        $response = $this->get('/ABC123');
        $response->assertRedirect('https://example.com');
        $this->assertDatabaseHas('clicks', ['link_id' => $link->id]);
    }
}
