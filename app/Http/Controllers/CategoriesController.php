<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminCategoryRequest;
use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class CategoriesController extends Controller
{
    private $repository;

    public function __construct(CategoryRepository $repository){
        $this->repository = $repository;
    }
    public function index(){
        $categories = $this->repository->paginate();

        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(AdminCategoryRequest $request){
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.categories.index');
    }

    public function edit($id){
        $category = $this->repository->find($id);

        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(AdminCategoryRequest $request, $id){
        $data = $request->all();

        //verifica se ja existe um componente com o mesmo nome
        if($this->repository->find($id)->where('name', $data['name'])->count()){
            $message = new MessageBag(["name" => "Já existe um componente com esse nome!"]); // Create your message

            return redirect()->back()->withInput()->withErrors($message);
        }else{
            $this->repository->update($data,$id);
        }

        return redirect()->route('admin.categories.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id,$status)
    {
        $category = $this->repository->find($id);
        $category->status = !$status;
        $category->save();
        return redirect()->route('admin.categories.index');
    }
}
