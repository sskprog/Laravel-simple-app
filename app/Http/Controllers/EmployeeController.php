<?php
namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('id')->get();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::orderBy('name')->pluck('name', 'id');
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'emp_name' => 'required|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|max:255',
        ]);
        try {
            Employee::create($request->post());
        } catch (QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return redirect()->route('employees.index')->with('error', "При создании записи произошла ошибка: $errorInfo[2].");
        }
        return redirect()->route('employees.index')->with('success', 'Запись успешно создана.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::orderBy('name')->pluck('name', 'id');
        return view('employees.edit', compact('companies', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'emp_name' => 'required|max:255',
            'email' => 'required|email|unique:employees,email',
            'email' => 'unique:employees,email,' . $employee->id,
            'phone' => 'required|max:255',
        ]);
        $employee->fill($request->post());
        try {
            $employee->save();
        } catch (QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return redirect()->route('employees.index')->with('error', "При создании записи произошла ошибка: $errorInfo[2].");
        }
        return redirect()->route('employees.index')->with('success', 'Запись успешно создана.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
        } catch (QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return redirect()->route('employees.index')->with('error', "При удалении записи произошла ошибка: $errorInfo[2].");
        }
        return redirect()->route('employees.index')->with('success', 'Запись была успешно удалена');
    }
}
