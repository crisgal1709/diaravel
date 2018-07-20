<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateActividadRequest;
use App\Http\Requests\UpdateActividadRequest;
use App\Repositories\ActividadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ActividadController extends AppBaseController
{
    /** @var  ActividadRepository */
    private $actividadRepository;

    public function __construct(ActividadRepository $actividadRepo)
    {
        $this->actividadRepository = $actividadRepo;
    }

    /**
     * Display a listing of the Actividad.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->actividadRepository->pushCriteria(new RequestCriteria($request));
        $actividads = $this->actividadRepository->all();

        // return view('actividads.index')
        //     ->with('actividads', $actividads);

        return view('front.layout');
    }

    /**
     * Show the form for creating a new Actividad.
     *
     * @return Response
     */
    public function create()
    {
        return view('actividads.create');
    }

    /**
     * Store a newly created Actividad in storage.
     *
     * @param CreateActividadRequest $request
     *
     * @return Response
     */
    public function store(CreateActividadRequest $request)
    {
        $input = $request->all();

        $actividad = $this->actividadRepository->create($input);

        Flash::success('Actividad saved successfully.');

        return redirect(route('actividads.index'));
    }

    /**
     * Display the specified Actividad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $actividad = $this->actividadRepository->findWithoutFail($id);

        if (empty($actividad)) {
            Flash::error('Actividad not found');

            return redirect(route('actividads.index'));
        }

        return view('actividads.show')->with('actividad', $actividad);
    }

    /**
     * Show the form for editing the specified Actividad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $actividad = $this->actividadRepository->findWithoutFail($id);

        if (empty($actividad)) {
            Flash::error('Actividad not found');

            return redirect(route('actividads.index'));
        }

        return view('actividads.edit')->with('actividad', $actividad);
    }

    /**
     * Update the specified Actividad in storage.
     *
     * @param  int              $id
     * @param UpdateActividadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActividadRequest $request)
    {
        $actividad = $this->actividadRepository->findWithoutFail($id);

        if (empty($actividad)) {
            Flash::error('Actividad not found');

            return redirect(route('actividads.index'));
        }

        $actividad = $this->actividadRepository->update($request->all(), $id);

        Flash::success('Actividad updated successfully.');

        return redirect(route('actividads.index'));
    }

    /**
     * Remove the specified Actividad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $actividad = $this->actividadRepository->findWithoutFail($id);

        if (empty($actividad)) {
            Flash::error('Actividad not found');

            return redirect(route('actividads.index'));
        }

        $this->actividadRepository->delete($id);

        Flash::success('Actividad deleted successfully.');

        return redirect(route('actividads.index'));
    }
}
