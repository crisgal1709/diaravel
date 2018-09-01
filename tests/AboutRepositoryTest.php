<?php

use App\Models\About;
use App\Repositories\AboutRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AboutRepositoryTest extends TestCase
{
    use MakeAboutTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AboutRepository
     */
    protected $aboutRepo;

    public function setUp()
    {
        parent::setUp();
        $this->aboutRepo = App::make(AboutRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAbout()
    {
        $about = $this->fakeAboutData();
        $createdAbout = $this->aboutRepo->create($about);
        $createdAbout = $createdAbout->toArray();
        $this->assertArrayHasKey('id', $createdAbout);
        $this->assertNotNull($createdAbout['id'], 'Created About must have id specified');
        $this->assertNotNull(About::find($createdAbout['id']), 'About with given id must be in DB');
        $this->assertModelData($about, $createdAbout);
    }

    /**
     * @test read
     */
    public function testReadAbout()
    {
        $about = $this->makeAbout();
        $dbAbout = $this->aboutRepo->find($about->id);
        $dbAbout = $dbAbout->toArray();
        $this->assertModelData($about->toArray(), $dbAbout);
    }

    /**
     * @test update
     */
    public function testUpdateAbout()
    {
        $about = $this->makeAbout();
        $fakeAbout = $this->fakeAboutData();
        $updatedAbout = $this->aboutRepo->update($fakeAbout, $about->id);
        $this->assertModelData($fakeAbout, $updatedAbout->toArray());
        $dbAbout = $this->aboutRepo->find($about->id);
        $this->assertModelData($fakeAbout, $dbAbout->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAbout()
    {
        $about = $this->makeAbout();
        $resp = $this->aboutRepo->delete($about->id);
        $this->assertTrue($resp);
        $this->assertNull(About::find($about->id), 'About should not exist in DB');
    }
}
