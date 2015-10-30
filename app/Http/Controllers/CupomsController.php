<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminCupomRequest;
use CodeDelivery\Repositories\CupomRepository;
use Illuminate\Http\Request;

class CupomsController extends Controller
{
    private $repository;

    public function __construct(CupomRepository $repository){
        $this->repository = $repository;
    }
    public function index(){
        $cupoms = $this->repository->paginate(10);

        return view('admin.cupoms.index', compact('cupoms'));
    }

    public function create(){
        return view('admin.cupoms.create');
    }

    public function store(AdminCupomRequest $request){
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.cupoms.index');
    }

    public function edit($id){
        $cupom = $this->repository->find($id);

        return view('admin.cupoms.edit',compact('cupom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(AdminCupomRequest $request, $id){
        $data = $request->all();

        $this->repository->update($data,$id);

        return redirect()->route('admin.cupoms.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id,$used)
    {
        $cupom = $this->repository->find($id);
        $cupom->used = !$used;
        $cupom->save();
        return redirect()->route('admin.cupoms.index');
    }
}
