<?php

use Faker\Factory as Faker;
use App\Models\About;
use App\Repositories\AboutRepository;

trait MakeAboutTrait
{
    /**
     * Create fake instance of About and save it in database
     *
     * @param array $aboutFields
     * @return About
     */
    public function makeAbout($aboutFields = [])
    {
        /** @var AboutRepository $aboutRepo */
        $aboutRepo = App::make(AboutRepository::class);
        $theme = $this->fakeAboutData($aboutFields);
        return $aboutRepo->create($theme);
    }

    /**
     * Get fake instance of About
     *
     * @param array $aboutFields
     * @return About
     */
    public function fakeAbout($aboutFields = [])
    {
        return new About($this->fakeAboutData($aboutFields));
    }

    /**
     * Get fake data of About
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAboutData($aboutFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'subtitle' => $fake->text,
            'content' => $fake->text,
            'important' => $fake->word,
            'user_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $aboutFields);
    }
}
