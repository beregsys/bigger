<?php

namespace Tests\Feature;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class GetSingleTechniqueTest extends TestCase
{
    public function test_get_single_technique()
    {
        $response = $this->json('GET', '/api/v1/techniques/1');
        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('data.id', 1)
                ->where('data.name', '/etc/passwd and /etc/shadow')
                ->where('data.mitre_technique_id', 'attack-pattern--d0b4fcdb-d67d-4ed2-99ce-788b12f8c0f4')
                ->etc()
            );
        $response->assertStatus(200);
    }
}
