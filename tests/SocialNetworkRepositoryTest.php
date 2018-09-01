<?php

use App\Models\SocialNetwork;
use App\Repositories\SocialNetworkRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SocialNetworkRepositoryTest extends TestCase
{
    use MakeSocialNetworkTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SocialNetworkRepository
     */
    protected $socialNetworkRepo;

    public function setUp()
    {
        parent::setUp();
        $this->socialNetworkRepo = App::make(SocialNetworkRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSocialNetwork()
    {
        $socialNetwork = $this->fakeSocialNetworkData();
        $createdSocialNetwork = $this->socialNetworkRepo->create($socialNetwork);
        $createdSocialNetwork = $createdSocialNetwork->toArray();
        $this->assertArrayHasKey('id', $createdSocialNetwork);
        $this->assertNotNull($createdSocialNetwork['id'], 'Created SocialNetwork must have id specified');
        $this->assertNotNull(SocialNetwork::find($createdSocialNetwork['id']), 'SocialNetwork with given id must be in DB');
        $this->assertModelData($socialNetwork, $createdSocialNetwork);
    }

    /**
     * @test read
     */
    public function testReadSocialNetwork()
    {
        $socialNetwork = $this->makeSocialNetwork();
        $dbSocialNetwork = $this->socialNetworkRepo->find($socialNetwork->id);
        $dbSocialNetwork = $dbSocialNetwork->toArray();
        $this->assertModelData($socialNetwork->toArray(), $dbSocialNetwork);
    }

    /**
     * @test update
     */
    public function testUpdateSocialNetwork()
    {
        $socialNetwork = $this->makeSocialNetwork();
        $fakeSocialNetwork = $this->fakeSocialNetworkData();
        $updatedSocialNetwork = $this->socialNetworkRepo->update($fakeSocialNetwork, $socialNetwork->id);
        $this->assertModelData($fakeSocialNetwork, $updatedSocialNetwork->toArray());
        $dbSocialNetwork = $this->socialNetworkRepo->find($socialNetwork->id);
        $this->assertModelData($fakeSocialNetwork, $dbSocialNetwork->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSocialNetwork()
    {
        $socialNetwork = $this->makeSocialNetwork();
        $resp = $this->socialNetworkRepo->delete($socialNetwork->id);
        $this->assertTrue($resp);
        $this->assertNull(SocialNetwork::find($socialNetwork->id), 'SocialNetwork should not exist in DB');
    }
}
