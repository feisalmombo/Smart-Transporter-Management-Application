<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use DB;
use Auth;
use App\ActivityLog;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('view_company')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $users = Auth::user()->id;

        $companyData = DB::table('companies')
            ->join('users', 'companies.user_id', '=', 'users.id')

            ->select('companies.id', 'companies.company_name', 'companies.tin', 'companies.vrn', 'companies.phone_number', 'companies.email', 'companies.website_link', 'companies.company_logo', 'companies.address',
             'users.first_name', 'users.middle_name', 'users.last_name', 'companies.created_at')
             ->where('companies.user_id', '=', $users)->get();

        // return json_encode($companyData);


        return view('manageCompany.viewCompany')->with('companyDatas', $companyData);

    }


    public function allcompanies()
    {
        $companyData = DB::table('companies')
            ->join('users', 'companies.user_id', '=', 'users.id')

            ->select('companies.id', 'companies.company_name', 'companies.tin', 'companies.vrn', 'companies.phone_number', 'companies.email', 'companies.website_link', 'companies.company_logo', 'companies.address',
             'users.first_name', 'users.middle_name', 'users.last_name', 'companies.created_at')->get();

        // return json_encode($companyData);


        return view('manageCompany.viewAllCompany')->with('companyDatas', $companyData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('create_company')) {
                return $next($request);
            }
            return redirect()->back();
        });

        return view('manageCompany.createCompany');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('create_company')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'company_name' => 'required|string|max:255',
            'tin' => 'required|numeric|digits:9',
            'phone_number' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'company_logo' => 'required|mimes:jpeg,png,jpg,gif,svg,doc,docx,pdf,txt|max:2048',
            'address' => 'required|string|max:255',
        ]);

        $company = new Company();
        $company->company_name = $request->company_name;
        $company->tin = $request->tin;
        $company->vrn = $request->vrn;
        $company->phone_number = $request->phone_number;
        $company->email = $request->email;
        $company->website_link = $request->website_link;
        $company->company_logo = $request->company_logo->store('companieslogo', 'public');
        $company->address = $request->address;
        $company->user_id = Auth::user()->id;
        $st = $company->save();

        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert Company data');
        } else {
            return redirect()->back()->with('message', 'Company is successfully added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('edit_company')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $company = company::findOrFail($id);

        //return $Company;

        return view('manageCompany.editCompany')->with('companies', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('edit_company')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $company = company::findOrFail($id);
        $this->validate(request(), [
            'company_name' => 'required|string|max:255',
            'tin' => 'required|numeric|digits:9',
            'phone_number' => 'required|numeric|digits:10',
            'email' => 'required',
            'company_logo' => 'required|mimes:jpeg,png,jpg,gif,svg,doc,docx,pdf,txt|max:2048',
            'address' => 'required|string|max:255',
        ]);

        $company->company_name = $request->company_name;
        $company->tin = $request->tin;
        $company->vrn = $request->vrn;
        $company->phone_number = $request->phone_number;
        $company->email = $request->email;
        $company->website_link = $request->website_link;
        $company->company_logo = $request->company_logo->store('companieslogo', 'public');
        $company->address = $request->address;
        $company->user_id = Auth::user()->id;
        $st = $company->save();

        if (!$st) {
            return redirect()->back()->with('message', 'Failed to Update Company data');
        } else {
            return redirect('/view/companies')->with('message', 'Company is successfully updated');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('delete_company')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $uid = \Auth::id();
        $company = Company::findOrFail($id);
        $company->delete();
        ActivityLog::where('changetype', 'Delete Company')->update(['user_id' => $uid]);


        $request->session()->flash('message', 'Company is successfully deleted');
        return back();
    }
}
