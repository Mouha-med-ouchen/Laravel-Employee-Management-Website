<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function showemployee()
{
    $employees = Employee::all(); 
    return view('form_employee', compact('employees'));
}


    public function addemployee()
    {
        return view('form_add_employee');
    }

    

public function createemployee(Request $request)
{
   $request->validate([
        'name' => 'required|string|min:3|max:255',
        'phone' => 'required|numeric',
        'email' => 'required|email|unique:employees',
        'address' => 'nullable|string|max:200',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'pdfresume' => 'nullable|mimes:pdf|max:10024',

    ], 
    [
        'name.required' => 'You must type your name please!',
        'phone.required' => 'You must type your phone please!',
        'email.required' => 'You must type your email please!',
        'address.required' => 'You must type your address please!',
        'photo.required' => 'You must upload your photo please!',
        'pdfresume.required' => 'You must upload your Cv please!',


    ]
);


    $employee = new Employee;
    $employee->name = $request->name; 
    $employee->phone = $request->phone;
    $employee->email = $request->email;
    $employee->address = $request->address;
       //photo is seet
    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $photoname = time().'.'.$image->getClientOriginalExtension();

        if (!file_exists(public_path('photoemployees'))) {
            mkdir(public_path('photoemployees'), 0777, true);
        }

        $image->move(public_path('photoemployees'), $photoname);
        $employee->photo = $photoname;
    }

    // Handle PDF Resume Upload
  if ($request->hasFile('pdfresume')) {
    $pdf = $request->file('pdfresume');
    $pdfname = time() . '.' . $pdf->getClientOriginalExtension();

    if (!file_exists(public_path('pdfresumes'))) {
        mkdir(public_path('pdfresumes'), 0777, true);
    }

    $pdf->move(public_path('pdfresumes'), $pdfname);
    $employee->pdfresume = $pdfname;
}

    
    $employee->save();
    return redirect()->route('showemployee')->with('success', 'Employee added successfully!');


}


    public function deleteemployee($id){
        $employee = Employee::find($id);

        $employee->delete();
        return redirect()->back();
    }

    public function editemployee($id){
        $employee = Employee::find($id);

        return view('form_edit_employee', compact('employee'));
    }

    public function updateemployee(Request $request, $id)
{
    // !employee:
    $employee = Employee::find($id);

    if (!$employee) {
        return redirect()->route('showemployee');
    }

    // VALIDATION. 
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|numeric',
        'email' => 'required|email|unique:employees,email,'.$id,
        'address' => 'required|nullable|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'pdfresume' => 'nullable|mimes:pdf|max:10024',

    ],
    
    [
        'name.required' => 'You must type your name please!',
        'phone.required' => 'You must type your phone please!',
        'email.required' => 'You must type your email please!',
        'address.required' => 'You must type your address please!',


    ]
    );

    // UPDATE DATA.
    $employee->name = $request->name;
    $employee->phone = $request->phone;
    $employee->email = $request->email;
    $employee->address = $request->address;

    // IMAGE IS SSET.: 
    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $photoname = time().'.'.$image->getClientOriginalExtension();

        if (!file_exists(public_path('photoemployees'))) {
            mkdir(public_path('photoemployees'), 0777, true);
        }

        if ($employee->photo && file_exists(public_path('photoemployees/' . $employee->photo))) {
            unlink(public_path('photoemployees/' . $employee->photo));
        }

        //save new photo:
        $image->move(public_path('photoemployees'), $photoname);
        $employee->photo = $photoname;
    }
    // Handle PDF Resume Upload
if ($request->hasFile('pdfresume')) {
    $pdf = $request->file('pdfresume');
    $pdfname = time().'.'.$pdf->getClientOriginalExtension();

    if (!file_exists(public_path('pdfresumes'))) {
        mkdir(public_path('pdfresumes'), 0777, true);
    }

    // Delete old resume if exists
    if ($employee->pdfresume && file_exists(public_path('pdfresumes/' . $employee->pdfresume))) {
        unlink(public_path('pdfresumes/' . $employee->pdfresume));
    }

    // Save new PDF resume
    $pdf->move(public_path('pdfresumes'), $pdfname);
    $employee->pdfresume = $pdfname;
}
    // save:
    $employee->save();

    return redirect()->route('showemployee')->with('updated', 'Employee updated successfully');
}

public function searchemployee(Request $request)
{
    $search = $request->search;

    if (empty($search)) {
        return redirect()->route('showemployee');
    }

   $employees = Employee::where('name', 'like', '%' . $search . '%')->get();


    if ($employees->isEmpty()) {
        return redirect()->route('showemployee');
    }

    return view('form_search', compact('employees'));
}

public function pdfdownloademployee($id)
{
    $pdfemployee = Employee::find($id);

    if (!$pdfemployee || !$pdfemployee->pdfresume) {
        return redirect()->route('showemployee')->with('error', 'CV not found.');
    }

    $filePath = public_path('pdfresumes/' . $pdfemployee->pdfresume);

    if (!file_exists($filePath)) {
        return redirect()->route('showemployee')->with('error', 'CV not found.');
    }

    return response()->download($filePath);
}


}
?>
