<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class ClientsController extends Controller
{
    private $repository;

    public function __construct(ClientRepository $repository, UserRepository $userRepository){
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }
    public function index(){
        $users = $this->userRepository->role('client')->paginate(10);

        return view('admin.clients.index', compact('users'));
    }

    public function create(){
        return view('admin.clients.create');
    }

    public function store(AdminClientRequest $request){

        $data = $request->all();

        //verifica se ja existe um chave com o mesmo nome
        if($this->userRepository->verifyUserEmail($data['email'])){
            $message = new MessageBag(["email" => "Já existe um usuário com esse email!"]); // Create your message

            return redirect()->back()->withInput()->withErrors($message);
        }else {

            $user = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt(123456),
                'remember_token' => str_random(10)
            ];

            $user = $this->userRepository->create($user);

            $client = [
                'user_id' => $user->id,
                'phone' => $data['phone'],
                'address' => $data['address'],
                'city' => $data['city'],
                'state' => $data['state'],
                'zipcode' => $data['zipcode']
            ];

            $this->repository->create($client);
        }
        return redirect()->route('admin.clients.index');
    }

    public function edit($id){

        $user = $this->userRepository->find($id);

        return view('admin.clients.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(AdminClientRequest $request, $id){
        $data = $request->all();

        $client = [
            'phone' => $data['phone'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipcode' => $data['zipcode']
        ];

        $this->repository->update($client,$id);

        $user = [
            'name' => $data['name'],
            'email' => $data['email']
        ];

        $this->userRepository->update($user,$data['user_id']);

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
        $client = $this->userRepository->find($id);
        $client->status = !$status;
        $client->save();
        return redirect()->route('admin.clients.index');
    }
}
