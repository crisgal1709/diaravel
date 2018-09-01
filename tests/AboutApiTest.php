<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AboutApiTest extends TestCase
{
    use MakeAboutTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAbout()
    {
        $about = $this->fakeAboutData();
        $this->json('POST', '/api/v1/abouts', $about);

        $this->assertApiResponse($about);
    }

    /**
     * @test
     */
    public function testReadAbout()
    {
        $about = $this->makeAbout();
        $this->json('GET', '/api/v1/abouts/'.$about->id);

        $this->assertApiResponse($about->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAbout()
    {
        $about = $this->makeAbout();
        $editedAbout = $this->fakeAboutData();

        $this->json('PUT', '/api/v1/abouts/'.$about->id, $editedAbout);

        $this->assertApiResponse($editedAbout);
    }

    /**
     * @test
     */
    public function testDeleteAbout()
    {
        $about = $this->makeAbout();
        $this->json('DELETE', '/api/v1/abouts/'.$about->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/abouts/'.$about->id);

        $this->assertResponseStatus(404);
    }
}
