<?php

use Faker\Factory as Faker;
use App\Models\Actividad;
use App\Repositories\ActividadRepository;

trait MakeActividadTrait
{
    /**
     * Create fake instance of Actividad and save it in database
     *
     * @param array $actividadFields
     * @return Actividad
     */
    public function makeActividad($actividadFields = [])
    {
        /** @var ActividadRepository $actividadRepo */
        $actividadRepo = App::make(ActividadRepository::class);
        $theme = $this->fakeActividadData($actividadFields);
        return $actividadRepo->create($theme);
    }

    /**
     * Get fake instance of Actividad
     *
     * @param array $actividadFields
     * @return Actividad
     */
    public function fakeActividad($actividadFields = [])
    {
        return new Actividad($this->fakeActividadData($actividadFields));
    }

    /**
     * Get fake data of Actividad
     *
     * @param array $postFields
     * @return array
     */
    public function fakeActividadData($actividadFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'estado' => $fake->word,
            'usuarios_relacionados' => $fake->text,
            'created_at' => $fake->word,
            'user_id' => $fake->randomDigitNotNull,
            'updated_at' => $fake->word
        ], $actividadFields);
    }
}
