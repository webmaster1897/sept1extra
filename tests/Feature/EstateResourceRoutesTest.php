<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class EstateResourceRoutesTest extends TestCase
{
    public function test_estate_resource_routes_are_registered(): void
    {
        $this->get('/users')->assertOk();
        $this->get('/property-types')->assertOk();
        $this->get('/properties')->assertOk();
        $this->get('/units')->assertOk();
        $this->get('/listings')->assertOk();
        $this->get('/bids')->assertOk();
    }

    public function test_image_upload_route_accepts_images(): void
    {
        Storage::fake('public');

        $response = $this->postJson('/upload/image', [
            'image' => UploadedFile::fake()->image('property.jpg', 1200, 900),
        ]);

        $response->assertOk()
            ->assertJsonPath('success', true)
            ->assertJsonPath('message', 'Image uploaded successfully.');

        $this->assertNotNull($response->json('path'));
    }
}
