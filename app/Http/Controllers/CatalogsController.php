<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CatalogsCreateRequest;
use App\Http\Requests\CatalogsUpdateRequest;
use App\Repositories\CatalogsRepository;
use App\Validators\CatalogsValidator;

/**
 * Class CatalogsController.
 *
 * @package namespace App\Http\Controllers;
 */
class CatalogsController extends Controller
{
    /**
     * @var CatalogsRepository
     */
    protected $repository;

    /**
     * @var CatalogsValidator
     */
    protected $validator;

    /**
     * CatalogsController constructor.
     *
     * @param CatalogsRepository $repository
     * @param CatalogsValidator $validator
     */
    public function __construct(CatalogsRepository $repository, CatalogsValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $catalogs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $catalogs,
            ]);
        }

        return view('catalogs.index', compact('catalogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CatalogsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CatalogsCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $catalog = $this->repository->create($request->all());

            $response = [
                'message' => 'Catalog created.',
                'data'    => $catalog->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalog = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $catalog,
            ]);
        }

        return view('catalogs.show', compact('catalog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalog = $this->repository->find($id);

        return view('catalogs.edit', compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CatalogsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CatalogsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $catalog = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Catalog updated.',
                'data'    => $catalog->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Catalog deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Catalog deleted.');
    }
}
