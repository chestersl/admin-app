<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CompanyService $companyService): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia('Dashboard/Company/Company', [
            'companies' => $companyService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia('Dashboard/Company/CompanyCreate', [
            'csrf' => csrf_token(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyStoreRequest $companyStoreRequest, CompanyService $companyService): void
    {
        $companyService->store($companyStoreRequest);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company, CompanyService $companyService): void
    {
        $companyService->destroy($company);
    }
}
