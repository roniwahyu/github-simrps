<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AkadMkSyaratAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
		
        return [
            
				"id_prodi" => "required|numeric",
				"kode_mk_main" => "required|string",
				"kode_mk_syarat" => "required|string",
				"nil_mk_syarat" => "required",
				"nil_angka_mk_syarat" => "required|numeric",
				"urut_syarat" => "nullable|numeric",
            
        ];
    }

	public function messages()
    {
        return [
			
            //using laravel default validation messages
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            //eg = 'name' => 'trim|capitalize|escape'
        ];
    }
}
