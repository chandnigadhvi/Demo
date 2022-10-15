<?php
 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view ('list')->with('students', $students);
    }


    public function create()
    {
        return view('index');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric|min:10'
        ]);
        $input = $request->all();

        $fileName = time().$request->file('photo')->getClientOriginalName();

        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $input["photo"] = '/storage/'.$path;
        Student::create($input);
        return redirect('student')->with('flash_message', 'Student Addedd!');
    }


    public function show($id)
    {
        $student = Student::find($id);
        return view('show')->with('students', $student);
    }


    public function edit($id)
    {
        $student = Student::find($id);
        return view('edit')->with('students', $student);
    }


    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $input = $request->all();
        $student->update($input);
        return redirect('student')->with('flash_message', 'student Updated!');
    }


    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('student')->with('flash_message', 'Student deleted!');
    }
}
