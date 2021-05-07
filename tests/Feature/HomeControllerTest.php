<?php

namespace Tests\Feature;

use App\Cat\CatService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{

    public function testGetHome()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testGetRandomCat()
    {
        // $this->mock(CatService::class, function ($mock) {
        //     $mock->shouldReceive('getCat')->andReturn('some-url');
        // });
        // Http::fake([
        //     'thatcopy.pw/*' => Http::response(['webpurl' => $fakeUrl], 200, []),
        // ]);
        $fakeUrl = 'https://i.thatcopy.pw/cat-webp/mgNSSyn.webp';
        $fakeResponseJson = '{
            "id": 23,
            "url": "https://i.thatcopy.pw/cat/mgNSSyn.jpg",
            "webpurl": "https://i.thatcopy.pw/cat-webp/mgNSSyn.webp",
            "x": 54.03,
            "y": 62.56
        }';
        Http::fakeSequence()
            ->push($fakeResponseJson, 200);

        $response = $this->get('/?action=get');
        $response->assertStatus(200);
        $response->assertViewHas('img', $fakeUrl);
    }

    public function testInvalidGetRandomCat()
    {
        $fakeResponseJson = '{
            "id": 23,
            "url": "https://i.thatcopy.pw/cat/mgNSSyn.jpg",
            "webpurl": "https://i.thatcopy.pw/cat-webp/mgNSSyn.webp",
            "x": 54.03,
            "y": 62.56
        }';
        Http::fakeSequence()
            ->push($fakeResponseJson, 500);

        $response = $this->get('/?action=get');
        $response->assertStatus(500);
    }
}
