<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AssessmentsCreateRequest;
use App\Http\Requests\AssessmentsUpdateRequest;
use App\Repositories\AssessmentsRepository;
use App\Validators\AssessmentsValidator;

/**
 * Class AssessmentsController.
 *
 * @package namespace App\Http\Controllers;
 */
class AssessmentsController extends Controller
{
    /**
     * @var AssessmentsRepository
     */
    protected $repository;

    /**
     * @var AssessmentsValidator
     */
    protected $validator;

    /**
     * AssessmentsController constructor.
     *
     * @param AssessmentsRepository $repository
     * @param AssessmentsValidator $validator
     */
    public function __construct(AssessmentsRepository $repository, AssessmentsValidator $validator)
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
        $assessments = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $assessments,
            ]);
        }

        return view('assessments.index', compact('assessments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AssessmentsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(AssessmentsCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $assessment = $this->repository->create($request->all());

            $response = [
                'message' => 'Assessment created.',
                'data'    => $assessment->toArray(),
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
        $assessment = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $assessment,
            ]);
        }

        return view('assessments.show', compact('assessment'));
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
        $assessment = $this->repository->find($id);

        return view('assessments.edit', compact('assessment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AssessmentsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(AssessmentsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $assessment = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Assessment updated.',
                'data'    => $assessment->toArray(),
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
                'message' => 'Assessment deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Assessment deleted.');
    }
}
