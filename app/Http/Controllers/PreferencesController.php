<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PreferenceCreateRequest;
use App\Http\Requests\PreferenceUpdateRequest;
use App\Repositories\PreferenceRepository;
use App\Validators\PreferenceValidator;

/**
 * Class PreferencesController.
 *
 * @package namespace App\Http\Controllers;
 */
class PreferencesController extends Controller
{
    /**
     * @var PreferenceRepository
     */
    protected $repository;

    /**
     * @var PreferenceValidator
     */
    protected $validator;

    /**
     * PreferencesController constructor.
     *
     * @param PreferenceRepository $repository
     * @param PreferenceValidator $validator
     */
    public function __construct(PreferenceRepository $repository, PreferenceValidator $validator)
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
        $preferences = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $preferences,
            ]);
        }

        return view('preferences.index', compact('preferences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PreferenceCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PreferenceCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $preference = $this->repository->create($request->all());

            $response = [
                'message' => 'Preference created.',
                'data'    => $preference->toArray(),
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
        $preference = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $preference,
            ]);
        }

        return view('preferences.show', compact('preference'));
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
        $preference = $this->repository->find($id);

        return view('preferences.edit', compact('preference'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PreferenceUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PreferenceUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $preference = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Preference updated.',
                'data'    => $preference->toArray(),
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
                'message' => 'Preference deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Preference deleted.');
    }
}
