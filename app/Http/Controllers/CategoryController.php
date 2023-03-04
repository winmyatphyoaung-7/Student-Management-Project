<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //direct list page

    public function listPage(){
        $data = Category::when(request('key'),function($query){
            $query->where('name','like','%'. request('key') .'%');
        })->orderBy('created_at','desc')->paginate(5);
        $data->appends(request()->all());
        return view('admin.category.list',compact('data'));
    }

    //category create page
    public function createPage(){
        return view('admin.category.create');
    }

    //category create
    public function create(Request $request){
        $this->checkValidationCreate($request);
        Category::create([
            'name' => $request->categoryName
        ]);
        return redirect()->route('category#listPage');
    }

    //category delete
    public function delete($id){
        Category::where('id',$id)->delete();
        toastr()->warning('Category Deleted Successfully!');
        return redirect()->route('category#listPage');
    }

    //category edit page
    public function editPage($id){
        $dataEdit = Category::where('id',$id)->get();
        return view('admin.category.edit',compact('dataEdit'));
    }

    //category edit
    public function edit(Request $request,$id){
        $this->checkValidationCreate($request);
        Category::where('id',$id)->update([
            'name' => $request->categoryName
        ]);
        toastr()->success('Category updated Successfully!');
        return redirect()->route('category#listPage');
    }



    private function checkValidationCreate($request){
        Validator::make($request->all(),[
            'categoryName' => 'required|min:3|unique:categories,name,'.$request->id,
        ])->validate();
    }
}
