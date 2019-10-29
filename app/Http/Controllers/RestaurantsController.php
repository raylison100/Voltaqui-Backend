<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RestaurantCreateRequest;
use App\Http\Requests\RestaurantUpdateRequest;
use App\Repositories\RestaurantRepository;
use App\Validators\RestaurantValidator;

/**
 * Class RestaurantsController.
 *
 * @package namespace App\Http\Controllers;
 */
class RestaurantsController extends Controller
{
    /**
     * @var RestaurantRepository
     */
    protected $repository;

    /**
     * @var RestaurantValidator
     */
    protected $validator;

    /**
     * RestaurantsController constructor.
     *
     * @param RestaurantRepository $repository
     * @param RestaurantValidator $validator
     */
    public function __construct(RestaurantRepository $repository, RestaurantValidator $validator)
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
        $restaurants = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $restaurants,
            ]);
        }

        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RestaurantCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(RestaurantCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $restaurant = $this->repository->create($request->all());

            $response = [
                'message' => 'Restaurant created.',
                'data'    => $restaurant->toArray(),
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
        $restaurant = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $restaurant,
            ]);
        }

        return view('restaurants.show', compact('restaurant'));
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
        $restaurant = $this->repository->find($id);

        return view('restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RestaurantUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(RestaurantUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $restaurant = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Restaurant updated.',
                'data'    => $restaurant->toArray(),
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
                'message' => 'Restaurant deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Restaurant deleted.');
    }
}
