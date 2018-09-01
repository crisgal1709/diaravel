<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAboutAPIRequest;
use App\Http\Requests\API\UpdateAboutAPIRequest;
use App\Models\About;
use App\Repositories\AboutRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AboutController
 * @package App\Http\Controllers\API
 */

class AboutAPIController extends AppBaseController
{
    /** @var  AboutRepository */
    private $aboutRepository;

    public function __construct(AboutRepository $aboutRepo)
    {
        $this->aboutRepository = $aboutRepo;
    }

    /**
     * Display a listing of the About.
     * GET|HEAD /abouts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->aboutRepository->pushCriteria(new RequestCriteria($request));
        $this->aboutRepository->pushCriteria(new LimitOffsetCriteria($request));
        $abouts = $this->aboutRepository->all();

        return $this->sendResponse($abouts->toArray(), 'Abouts retrieved successfully');
    }

    /**
     * Store a newly created About in storage.
     * POST /abouts
     *
     * @param CreateAboutAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAboutAPIRequest $request)
    {
        $input = $request->all();

        $abouts = $this->aboutRepository->create($input);

        return $this->sendResponse($abouts->toArray(), 'About saved successfully');
    }

    /**
     * Display the specified About.
     * GET|HEAD /abouts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var About $about */
        $about = $this->aboutRepository->findWithoutFail($id);

        if (empty($about)) {
            return $this->sendError('About not found');
        }

        return $this->sendResponse($about->toArray(), 'About retrieved successfully');
    }

    /**
     * Update the specified About in storage.
     * PUT/PATCH /abouts/{id}
     *
     * @param  int $id
     * @param UpdateAboutAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAboutAPIRequest $request)
    {
        $input = $request->all();

        /** @var About $about */
        $about = $this->aboutRepository->findWithoutFail($id);

        if (empty($about)) {
            return $this->sendError('About not found');
        }

        $about = $this->aboutRepository->update($input, $id);

        return $this->sendResponse($about->toArray(), 'About updated successfully');
    }

    /**
     * Remove the specified About from storage.
     * DELETE /abouts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var About $about */
        $about = $this->aboutRepository->findWithoutFail($id);

        if (empty($about)) {
            return $this->sendError('About not found');
        }

        $about->delete();

        return $this->sendResponse($id, 'About deleted successfully');
    }
}
