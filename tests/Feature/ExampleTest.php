<?php

namespace Tests\Feature;

use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetNews()
    {
        $this->assertIsArray(News::getNews());
    }
    public function testGetCategories()
    {
        $this->assertIsArray(Category::getCategories());
    }
    public function testCreateNews(){
        $response = $this->postJson('/admin/create', [
            'isPrivate' => false,
            "_token" => "C355ufr5RuuVAwC82H2I3A6udUUkkQIXmd8vhpoH",
            "title" => "Test News",
            "category_id" => "2",
            "text" => "Это тестовая новость"
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'created' => true,
            ]);
    }
}
