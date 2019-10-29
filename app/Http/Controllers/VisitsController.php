<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\VisitsCreateRequest;
use App\Http\Requests\VisitsUpdateRequest;
use App\Repositories\VisitsRepository;
use App\Validators\VisitsValidator;

/**
 * Class VisitsController.
 *
 * @package namespace App\Http\Controllers;
 */
class VisitsController extends Controller
{
    /**
     * @var VisitsRepository
     */
    protected $repository;

    /**
     * @var VisitsValidator
     */
    protected $validator;

    /**
     * VisitsController constructor.
     *
     * @param VisitsRepository $repository
     * @param VisitsValidator $validator
     */
    public function __construct(VisitsRepository $repository, VisitsValidator $validator)
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
        $visits = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $visits,
            ]);
        }

        return view('visits.index', compact('visits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VisitsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(VisitsCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $visit = $this->repository->create($request->all());

            $response = [
                'message' => 'Visit created.',
                'data'    => $visit->toArray(),
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
        $visit = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $visit,
            ]);
        }

        return view('visits.show', compact('visit'));
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
        $visit = $this->repository->find($id);

        return view('visits.edit', compact('visit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  VisitsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(VisitsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $visit = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Visit updated.',
                'data'    => $visit->toArray(),
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
                'message' => 'Visit deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Visit deleted.');
    }
}
