<?php


namespace App\Http\Controllers\Traits;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Http\Request;

trait CrudMethods
{
    protected $service;
    protected $validator;

    public function index(Request $request)
    {
        return response()->json($this->service->all($request->query->get('limit', 15)));
    }

    public function show(int $id)
    {
        return response()->json($this->service->find($id));
    }

    public function store(Request $request)
    {
        if($this->validator){
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
        }
        return $this->service->create($request->all());
    }

    public function update(Request $request, $id)
    {
        if($this->validator){
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
        }
        return $this->service->update($request->all(), $id);
    }

    public function restore($id)
    {
        return $this->service->restore($id);
    }

    public function trash($id)
    {
        return $this->service->delete($id);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }

    public function findWhere(Request $request)
    {
        return $this->service->findWhere($request->all());
    }
}

