<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Services\ClientService;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    private $repository;
    private $clientService;

    public function __construct(ClientRepository $repository, ClientService $clientService){
        $this->repository = $repository;
        $this->clientService = $clientService;
    }
    public function index(){
        $clients = $this->repository->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }

    public function create(){
        return view('admin.clients.create');
    }

    public function store(AdminClientRequest $request){

        $data = $request->all();

        $this->clientService->create($data);

        return redirect()->route('admin.clients.index');
    }

    public function edit($id){

        $client = $this->repository->find($id);

        return view('admin.clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(AdminClientRequest $request, $id){

        $data = $request->all();

        $this->clientService->update($data,$id);

        return redirect()->route('admin.clients.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id,$status)
    {
        $client = $this->repository->find($id);
        $client->status = !$status;
        $client->save();
        return redirect()->route('admin.clients.index');
    }
}
