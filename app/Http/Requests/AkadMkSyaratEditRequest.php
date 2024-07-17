<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AkadMkSyaratEditRequest extends FormRequest
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
            
				"id_prodi" => "filled|numeric",
				"kode_mk_main" => "filled|string",
				"kode_mk_syarat" => "filled|string",
				"nil_mk_syarat" => "filled",
				"nil_angka_mk_syarat" => "filled|numeric",
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
