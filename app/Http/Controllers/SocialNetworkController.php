<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSocialNetworkRequest;
use App\Http\Requests\UpdateSocialNetworkRequest;
use App\Repositories\SocialNetworkRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SocialNetworkController extends AppBaseController
{
    /** @var  SocialNetworkRepository */
    private $socialNetworkRepository;

    public static $name = 'Social Network';

    public function __construct(SocialNetworkRepository $socialNetworkRepo)
    {
        $this->socialNetworkRepository = $socialNetworkRepo;
    }

    /**
     * Display a listing of the SocialNetwork.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->socialNetworkRepository->pushCriteria(new RequestCriteria($request));
        $socialNetworks = $this->socialNetworkRepository->all();

        return view('social_networks.index')
            ->with('socialNetworks', $socialNetworks);
    }

    /**
     * Show the form for creating a new SocialNetwork.
     *
     * @return Response
     */
    public function create()
    {
        return view('social_networks.create');
    }

    /**
     * Store a newly created SocialNetwork in storage.
     *
     * @param CreateSocialNetworkRequest $request
     *
     * @return Response
     */
    public function store(CreateSocialNetworkRequest $request)
    {
        $input = $request->all();

        $socialNetwork = $this->socialNetworkRepository->create($input);

        Flash::success('Social Network saved successfully.');

        return redirect(route('socialNetworks.index'));
    }

    /**
     * Display the specified SocialNetwork.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $socialNetwork = $this->socialNetworkRepository->findWithoutFail($id);

        if (empty($socialNetwork)) {
            Flash::error('Social Network not found');

            return redirect(route('socialNetworks.index'));
        }

        return view('social_networks.show')->with('socialNetwork', $socialNetwork);
    }

    /**
     * Show the form for editing the specified SocialNetwork.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $socialNetwork = $this->socialNetworkRepository->findWithoutFail($id);

        if (empty($socialNetwork)) {
            Flash::error('Social Network not found');

            return redirect(route('socialNetworks.index'));
        }

        return view('social_networks.edit')->with('socialNetwork', $socialNetwork);
    }

    /**
     * Update the specified SocialNetwork in storage.
     *
     * @param  int              $id
     * @param UpdateSocialNetworkRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSocialNetworkRequest $request)
    {
        $socialNetwork = $this->socialNetworkRepository->findWithoutFail($id);

        if (empty($socialNetwork)) {
            Flash::error('Social Network not found');

            return redirect(route('socialNetworks.index'));
        }

        $socialNetwork = $this->socialNetworkRepository->update($request->all(), $id);

        Flash::success('Social Network updated successfully.');

        return redirect(route('socialNetworks.index'));
    }

    /**
     * Remove the specified SocialNetwork from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $socialNetwork = $this->socialNetworkRepository->findWithoutFail($id);

        if (empty($socialNetwork)) {
            Flash::error('Social Network not found');

            return redirect(route('socialNetworks.index'));
        }

        $this->socialNetworkRepository->delete($id);

        Flash::success('Social Network deleted successfully.');

        return redirect(route('socialNetworks.index'));
    }
}
