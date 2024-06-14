<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;

class CompanyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:20', 'min: 2'],
            'email' => ['nullable', 'string', 'email'],
            'website' => ['nullable', 'string'],
            'logo' => ['exclude_unless:logo,null', File::image()
                ->dimensions(
                    Rule::dimensions()
                        ->minWidth(Company::MIN_LOGO_WIDTH)
                        ->minHeight(Company::MIN_LOGO_HEIGHT)
                )
                ->max(Company::MAX_LOGO_SIZE)]
        ];
    }
}
