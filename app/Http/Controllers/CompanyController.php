<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('id')->get();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:companies,email',
            'address' => 'required|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100',
        ]);
        $path = Storage::putFile('logos', $request->file('logo'));
        try {
            Company::create(['name' => $request->name,
                            'email' => $request->email,
                            'address' => $request->address,
                            'logo' => $path]);
        } catch (QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return redirect()->route('companies.index')->with('error', "При создании записи произошла ошибка: $errorInfo.");
        }
        return redirect()->route('companies.index')->with('success', 'Запись успешно создана.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'email' => 'unique:companies,email,' . $company->id,
            'address' => 'required|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100',
        ]);

        if (Storage::exists($company->logo)) {
            Storage::delete($company->logo);
        }

        $path = Storage::putFile('logos', $request->file('logo'));
        try {
            $company->fill(['name' => $request->name,
                            'email' => $request->email,
                            'address' => $request->address,
                            'logo' => $path])
                            ->save();
        } catch (QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return redirect()->route('companies.index')->with('error', "При обновлении записи произошла ошибка: $errorInfo.");
        }
        return redirect()->route('companies.index')->with('success', 'Запись была успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        try {
            $company->delete();
        } catch (QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return redirect()->route('companies.index')->with('error', "При удалении записи произошла ошибка: $errorInfo.");
        }
        return redirect()->route('companies.index')->with('success', 'Запись была успешно удалена');
    }
}
