<?php

use App\Models\Actividad;
use App\Repositories\ActividadRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActividadRepositoryTest extends TestCase
{
    use MakeActividadTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ActividadRepository
     */
    protected $actividadRepo;

    public function setUp()
    {
        parent::setUp();
        $this->actividadRepo = App::make(ActividadRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateActividad()
    {
        $actividad = $this->fakeActividadData();
        $createdActividad = $this->actividadRepo->create($actividad);
        $createdActividad = $createdActividad->toArray();
        $this->assertArrayHasKey('id', $createdActividad);
        $this->assertNotNull($createdActividad['id'], 'Created Actividad must have id specified');
        $this->assertNotNull(Actividad::find($createdActividad['id']), 'Actividad with given id must be in DB');
        $this->assertModelData($actividad, $createdActividad);
    }

    /**
     * @test read
     */
    public function testReadActividad()
    {
        $actividad = $this->makeActividad();
        $dbActividad = $this->actividadRepo->find($actividad->id);
        $dbActividad = $dbActividad->toArray();
        $this->assertModelData($actividad->toArray(), $dbActividad);
    }

    /**
     * @test update
     */
    public function testUpdateActividad()
    {
        $actividad = $this->makeActividad();
        $fakeActividad = $this->fakeActividadData();
        $updatedActividad = $this->actividadRepo->update($fakeActividad, $actividad->id);
        $this->assertModelData($fakeActividad, $updatedActividad->toArray());
        $dbActividad = $this->actividadRepo->find($actividad->id);
        $this->assertModelData($fakeActividad, $dbActividad->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteActividad()
    {
        $actividad = $this->makeActividad();
        $resp = $this->actividadRepo->delete($actividad->id);
        $this->assertTrue($resp);
        $this->assertNull(Actividad::find($actividad->id), 'Actividad should not exist in DB');
    }
}
