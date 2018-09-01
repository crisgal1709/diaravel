<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\About;
use App\Repositories\AboutRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AboutController extends AppBaseController
{
    /** @var  AboutRepository */
    private $aboutRepository;

    public static $name = "About";

    public function __construct(AboutRepository $aboutRepo)
    {
        $this->aboutRepository = $aboutRepo;
    }

    /**
     * Display a listing of the About.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $about = About::first();

        return view('about.edit')->with('about', $about);


        $this->aboutRepository->pushCriteria(new RequestCriteria($request));
        $about = $this->aboutRepository->all();

        return view('about.index')
            ->with('about', $about);
    }

    /**
     * Show the form for creating a new About.
     *
     * @return Response
     */
    public function create()
    {
        return view('about.create');
    }

    /**
     * Store a newly created About in storage.
     *
     * @param CreateAboutRequest $request
     *
     * @return Response
     */
    public function store(CreateAboutRequest $request)
    {
        $input = $request->all();

        $about = $this->aboutRepository->create($input);

        Flash::success('About saved successfully.');

        return redirect(route('about.index'));
    }

    /**
     * Display the specified About.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $about = $this->aboutRepository->findWithoutFail($id);

        if (empty($about)) {
            Flash::error('About not found');

            return redirect(route('about.index'));
        }

        return view('about.show')->with('about', $about);
    }

    /**
     * Show the form for editing the specified About.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $about = $this->aboutRepository->findWithoutFail($id);

        if (empty($about)) {
            Flash::error('About not found');

            return redirect(route('abouts.index'));
        }

        return view('about.edit')->with('about', $about);
    }

    /**
     * Update the specified About in storage.
     *
     * @param  int              $id
     * @param UpdateAboutRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAboutRequest $request)
    {
        $about = $this->aboutRepository->findWithoutFail($id);

        if (empty($about)) {
            Flash::error('About not found');

            return redirect(route('abouts.index'));
        }

        $about = $this->aboutRepository->update($request->all(), $id);

        if ($request->has('archives')) {
            $about->setImage($request);
        }

        Flash::success('About updated successfully.');

        return redirect(route('abouts.index'));
    }

    /**
     * Remove the specified About from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $about = $this->aboutRepository->findWithoutFail($id);

        if (empty($about)) {
            Flash::error('About not found');

            return redirect(route('abouts.index'));
        }

        $this->aboutRepository->delete($id);

        Flash::success('About deleted successfully.');

        return redirect(route('abouts.index'));
    }
}
