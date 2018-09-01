<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SocialNetworkApiTest extends TestCase
{
    use MakeSocialNetworkTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSocialNetwork()
    {
        $socialNetwork = $this->fakeSocialNetworkData();
        $this->json('POST', '/api/v1/socialNetworks', $socialNetwork);

        $this->assertApiResponse($socialNetwork);
    }

    /**
     * @test
     */
    public function testReadSocialNetwork()
    {
        $socialNetwork = $this->makeSocialNetwork();
        $this->json('GET', '/api/v1/socialNetworks/'.$socialNetwork->id);

        $this->assertApiResponse($socialNetwork->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSocialNetwork()
    {
        $socialNetwork = $this->makeSocialNetwork();
        $editedSocialNetwork = $this->fakeSocialNetworkData();

        $this->json('PUT', '/api/v1/socialNetworks/'.$socialNetwork->id, $editedSocialNetwork);

        $this->assertApiResponse($editedSocialNetwork);
    }

    /**
     * @test
     */
    public function testDeleteSocialNetwork()
    {
        $socialNetwork = $this->makeSocialNetwork();
        $this->json('DELETE', '/api/v1/socialNetworks/'.$socialNetwork->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/socialNetworks/'.$socialNetwork->id);

        $this->assertResponseStatus(404);
    }
}
