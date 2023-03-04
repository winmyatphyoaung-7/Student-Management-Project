<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    //direct list page

    public function listPage()
    {
        $course = Course::select('courses.*')->when(request('key'), function ($query) {
            $query->where('name', 'like', '%' . request('key') . '%');
        })->orderBy('created_at', 'desc')->paginate(5);
        $course->appends(request()->all());

        return view('admin.courses.list', compact('course'));
    }

    //direct create page

    public function createPage()
    {
        $data = Category::get();
        return view('admin.courses.create', compact('data'));
    }

    //create course

    public function create(Request $request)
    {
        $this->courseValidationCheck($request, 'create');
        $data = $this->requestCourseData($request);
        $fileName = uniqid() . $request->file('courseImage')->getClientOriginalName();
        $request->file('courseImage')->storeAs('public', $fileName);

        $data['image'] = $fileName;
        Course::create($data);
        toastr()->success('Course Create Success!');
        return redirect()->route('course#listPage');
    }

    //delete course

    public function delete($id)
    {
        Course::where('id', $id)->delete();
        toastr()->warning('Course Delete Success!');
        return back();
    }

    //direct edit page

    public function editPage($id)
    {
        $data = Course::select('courses.*', 'categories.name as category_name')
        ->leftJoin('categories', 'courses.category_id', 'categories.id')
        ->where('courses.id', $id)->get();
        $category = Category::get();
        return view('admin.courses.edit', compact('data', 'category'));
    }

    //course update

    public function edit($id, Request $request)
    {
        $this->courseValidationCheck(request(), 'update');
        $updateData = $this->requestCourseData(request());
        if ($request->hasFile('courseImage')) {
            $oldImageName = Course::where('id', $request->courseId)->first();
            $oldImageName = $oldImageName->image;

            if ($oldImageName != null) {
                Storage::delete('public' . $oldImageName);
            }

            $fileName = uniqid() . $request->file('courseImage')->getClientOriginalName();
            $request->file('courseImage')->storeAs('public', $fileName);
            $updateData['image'] = $fileName;
        };

        Course::where('id', $id)->update($updateData);
        toastr()->info('Course Update Success!');
        return redirect()->route('course#listPage');
    }

    // course validation check

    private function courseValidationCheck($request, $action)
    {
        $validationRules = [
            'courseName' => 'required|min:3|unique:courses,name,' . $request->id,
            'courseDescription' => 'required|min:10',
            'courseCategory' => 'required',
            'coursePrice' => 'required',
            'courseQty' => 'required',
            'courseStartDate' => 'required',
            'courseDuration' => 'required',
        ];

        $validationRules['courseImage'] = $action == "create" ? 'required|mimes:jpg,jpeg,png,webp|file' : "mimes:jpg,jpeg,png,webp|file";

        Validator::make($request->all(), $validationRules)->validate();
    }

    //request course data

    private function requestCourseData($request)
    {
        return [
            'name' => $request->courseName,
            'description' => $request->courseDescription,
            'category_id' => $request->courseCategory,
            'price' => $request->coursePrice,
            'qty' => $request->courseQty,
            'start_date' => $request->courseStartDate,
            'duration' => $request->courseDuration,
        ];
    }
}
