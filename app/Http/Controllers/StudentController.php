<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    //
    public function index(Request $request)
    {
        $title = 'Abc';
        $name = 'Nguyen Van A';
        // $student = DB::table('students')
        //     ->select()
        //     ->get();
        // //kiem tra xem user co bam nut ko 
        // if ($request->post() && $request->searchStudent) {
        //     $student = DB::table('students')
        //         ->select()
        //         ->where('name', 'Like', '%' . $request->searchStudent . '%')
        //         ->get();
        // }; 
        // return view('student.index', compact('title', 'name', 'student'));

        //truy vấn bằng model 
        $student = new Student();
        //Nhớ sửa $listStudent giống với biến bên student.list
        $listStudent = $student::all();
        if ($request->post() && $request->searchStudent) {
            $listStudent = $student::where('name', 'like', '%' . $request->searchStudent . '%')
                ->get();
        }
        return view('student.index', compact('title', 'name', 'listStudent'));
    }

    //chưa dạy chức năng thêm 
    public function add(StudentRequest $request)
    {
        $title = "Thêm sinh viên";

        if ($request->isMethod('POST')) {
            //add
            //Xử lý ảnh 
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $request->image = uploadfile('image', $request->file('image'));
            }
            $params = $request->except('_token'); //xóa token để tránh nhầm lẫn khi làm việc vs sql
            $params['image'] = $request->image;

            $student = Student::create($params);

            if ($student) {
                Session::flash('success', 'Thêm thành công !');
            }
        }
        return view('student.add', compact('title'));
    }

    public function edit(StudentRequest $request, $id)
    {
        $title = 'Edit Student';
        //        cách 1
        $student = DB::table('students')
            ->where('id', $id)->first();

        if ($request->isMethod('POST')) { // check xem có post hay không
            $params = $request->except('_token', 'image');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                //                Xóa ảnh cũ khi có thực hiện post ảnh mới
                $resultDL = Storage::delete('/public/' . $student->image);
                if ($resultDL) {
                    $request->image = uploadFile('image', $request->file('image'));
                    $params['image'] =  $request->image;
                }
            } else {
                //                nếu không thay hình thì ảnh sẽ là ảnh cũ
                $params['image'] = $student->image;
            }
            $result = Student::where('id', $id)->update($params);
            if ($result) {
                Session::flash('success', 'Sửa khách hàng thành công');
                //                chuyển trang sau khi thành công
                return redirect()->route('editStudent', ['id' => $id]);
            }
        }
        return view('student.edit', compact('title', 'student'));
    }

    public function delete(Request $request, $id){
        $studentDlt = Student::where('id',$id)->delete();
        if($studentDlt){
            Session::flash('success', 'Xóa khách hàng thành công');
//                chuyển trang sau khi thành công
            return redirect()->route('list-student');
        }
    }
}
