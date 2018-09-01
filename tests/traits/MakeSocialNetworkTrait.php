<?php

use Faker\Factory as Faker;
use App\Models\SocialNetwork;
use App\Repositories\SocialNetworkRepository;

trait MakeSocialNetworkTrait
{
    /**
     * Create fake instance of SocialNetwork and save it in database
     *
     * @param array $socialNetworkFields
     * @return SocialNetwork
     */
    public function makeSocialNetwork($socialNetworkFields = [])
    {
        /** @var SocialNetworkRepository $socialNetworkRepo */
        $socialNetworkRepo = App::make(SocialNetworkRepository::class);
        $theme = $this->fakeSocialNetworkData($socialNetworkFields);
        return $socialNetworkRepo->create($theme);
    }

    /**
     * Get fake instance of SocialNetwork
     *
     * @param array $socialNetworkFields
     * @return SocialNetwork
     */
    public function fakeSocialNetwork($socialNetworkFields = [])
    {
        return new SocialNetwork($this->fakeSocialNetworkData($socialNetworkFields));
    }

    /**
     * Get fake data of SocialNetwork
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSocialNetworkData($socialNetworkFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'icon' => $fake->text,
            'link' => $fake->text,
            'status' => $fake->word,
            'user_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $socialNetworkFields);
    }
}
