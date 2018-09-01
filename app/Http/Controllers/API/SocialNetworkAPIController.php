<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSocialNetworkAPIRequest;
use App\Http\Requests\API\UpdateSocialNetworkAPIRequest;
use App\Models\SocialNetwork;
use App\Repositories\SocialNetworkRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SocialNetworkController
 * @package App\Http\Controllers\API
 */

class SocialNetworkAPIController extends AppBaseController
{
    /** @var  SocialNetworkRepository */
    private $socialNetworkRepository;

    public function __construct(SocialNetworkRepository $socialNetworkRepo)
    {
        $this->socialNetworkRepository = $socialNetworkRepo;
    }

    /**
     * Display a listing of the SocialNetwork.
     * GET|HEAD /socialNetworks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->socialNetworkRepository->pushCriteria(new RequestCriteria($request));
        $this->socialNetworkRepository->pushCriteria(new LimitOffsetCriteria($request));
        $socialNetworks = $this->socialNetworkRepository->all();

        return $this->sendResponse($socialNetworks->toArray(), 'Social Networks retrieved successfully');
    }

    /**
     * Store a newly created SocialNetwork in storage.
     * POST /socialNetworks
     *
     * @param CreateSocialNetworkAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSocialNetworkAPIRequest $request)
    {
        $input = $request->all();

        $socialNetworks = $this->socialNetworkRepository->create($input);

        return $this->sendResponse($socialNetworks->toArray(), 'Social Network saved successfully');
    }

    /**
     * Display the specified SocialNetwork.
     * GET|HEAD /socialNetworks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SocialNetwork $socialNetwork */
        $socialNetwork = $this->socialNetworkRepository->findWithoutFail($id);

        if (empty($socialNetwork)) {
            return $this->sendError('Social Network not found');
        }

        return $this->sendResponse($socialNetwork->toArray(), 'Social Network retrieved successfully');
    }

    /**
     * Update the specified SocialNetwork in storage.
     * PUT/PATCH /socialNetworks/{id}
     *
     * @param  int $id
     * @param UpdateSocialNetworkAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSocialNetworkAPIRequest $request)
    {
        $input = $request->all();

        /** @var SocialNetwork $socialNetwork */
        $socialNetwork = $this->socialNetworkRepository->findWithoutFail($id);

        if (empty($socialNetwork)) {
            return $this->sendError('Social Network not found');
        }

        $socialNetwork = $this->socialNetworkRepository->update($input, $id);

        return $this->sendResponse($socialNetwork->toArray(), 'SocialNetwork updated successfully');
    }

    /**
     * Remove the specified SocialNetwork from storage.
     * DELETE /socialNetworks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SocialNetwork $socialNetwork */
        $socialNetwork = $this->socialNetworkRepository->findWithoutFail($id);

        if (empty($socialNetwork)) {
            return $this->sendError('Social Network not found');
        }

        $socialNetwork->delete();

        return $this->sendResponse($id, 'Social Network deleted successfully');
    }
}
