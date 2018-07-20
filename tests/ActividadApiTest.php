<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActividadApiTest extends TestCase
{
    use MakeActividadTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateActividad()
    {
        $actividad = $this->fakeActividadData();
        $this->json('POST', '/api/v1/actividads', $actividad);

        $this->assertApiResponse($actividad);
    }

    /**
     * @test
     */
    public function testReadActividad()
    {
        $actividad = $this->makeActividad();
        $this->json('GET', '/api/v1/actividads/'.$actividad->id);

        $this->assertApiResponse($actividad->toArray());
    }

    /**
     * @test
     */
    public function testUpdateActividad()
    {
        $actividad = $this->makeActividad();
        $editedActividad = $this->fakeActividadData();

        $this->json('PUT', '/api/v1/actividads/'.$actividad->id, $editedActividad);

        $this->assertApiResponse($editedActividad);
    }

    /**
     * @test
     */
    public function testDeleteActividad()
    {
        $actividad = $this->makeActividad();
        $this->json('DELETE', '/api/v1/actividads/'.$actividad->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/actividads/'.$actividad->id);

        $this->assertResponseStatus(404);
    }
}
