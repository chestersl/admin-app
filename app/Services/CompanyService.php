<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class CompanyService
{

    public function get(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Company::withCount('employees')
            ->orderBy('created_at', 'desc')
            ->paginate(Company::PAGINATE);
    }

    /**
     * @param $validatedCompany
     * @return Company
     */
    public function store($validatedCompany): Company
    {

        try {
            $company = new Company();

            $company->name = $validatedCompany['name'];
            $company->email = $validatedCompany['email'];
            $company->website = $validatedCompany['website'];

            if (!empty($validatedCompany['logo'])) {
                $path = $validatedCompany['logo']->store(Company::STORAGE_LOGO_PATH);
                $company->logo = '/storage/' . str_replace('public/', '', $path);
            }

            $company->save();

            return $company;

        } catch (QueryException $exception) {
            abort(404);
        }
    }

    /**
     * @param $company
     * @return void
     */
    public function destroy($company): void
    {

        if ($company->logo) {
            Storage::delete('public/' . str_replace('/storage/', '', $company->logo));
        }

        $company->employees()->delete();
        $company->delete();
    }


}
