<?php

namespace Tests\Feature\Http\Admin;

use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function testCreateSuccessStatus(): void
    {
        $response = $this->get(route('admin.news.create'));
        $response->assertStatus(200);
    }

    public function testCreateSaveSuccessData(): void
    {
        $news = News::factory()->create();

        $response = $this->post(route('admin.news.store'), $news);

        $response->assertStatus(200);
    }

    public function testValidateTitleData(): void
    {
        $data = [
            'author' => fake()->userName(),
            'description' => fake()->text(50),
        ];
        $response = $this->post(route('admin.news.store'), $data);
        $response->assertStatus(200);
    }
}
