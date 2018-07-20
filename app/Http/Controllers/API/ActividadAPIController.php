<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateActividadAPIRequest;
use App\Http\Requests\API\UpdateActividadAPIRequest;
use App\Models\Actividad;
use App\Repositories\ActividadRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ActividadController
 * @package App\Http\Controllers\API
 */

class ActividadAPIController extends AppBaseController
{
    /** @var  ActividadRepository */
    private $actividadRepository;

    public function __construct(ActividadRepository $actividadRepo)
    {
        $this->actividadRepository = $actividadRepo;
    }

    /**
     * Display a listing of the Actividad.
     * GET|HEAD /actividads
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->actividadRepository->pushCriteria(new RequestCriteria($request));
        $this->actividadRepository->pushCriteria(new LimitOffsetCriteria($request));
        $actividads = $this->actividadRepository->all();

        return $this->sendResponse($actividads->toArray(), 'Actividads retrieved successfully');
    }

    /**
     * Store a newly created Actividad in storage.
     * POST /actividads
     *
     * @param CreateActividadAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateActividadAPIRequest $request)
    {
        $input = $request->all();

        $actividads = $this->actividadRepository->create($input);

        return $this->sendResponse($actividads->toArray(), 'Actividad saved successfully');
    }

    /**
     * Display the specified Actividad.
     * GET|HEAD /actividads/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Actividad $actividad */
        $actividad = $this->actividadRepository->findWithoutFail($id);

        if (empty($actividad)) {
            return $this->sendError('Actividad not found');
        }

        return $this->sendResponse($actividad->toArray(), 'Actividad retrieved successfully');
    }

    /**
     * Update the specified Actividad in storage.
     * PUT/PATCH /actividads/{id}
     *
     * @param  int $id
     * @param UpdateActividadAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActividadAPIRequest $request)
    {
        $input = $request->all();

        /** @var Actividad $actividad */
        $actividad = $this->actividadRepository->findWithoutFail($id);

        if (empty($actividad)) {
            return $this->sendError('Actividad not found');
        }

        $actividad = $this->actividadRepository->update($input, $id);

        return $this->sendResponse($actividad->toArray(), 'Actividad updated successfully');
    }

    /**
     * Remove the specified Actividad from storage.
     * DELETE /actividads/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Actividad $actividad */
        $actividad = $this->actividadRepository->findWithoutFail($id);

        if (empty($actividad)) {
            return $this->sendError('Actividad not found');
        }

        $actividad->delete();

        return $this->sendResponse($id, 'Actividad deleted successfully');
    }
}
