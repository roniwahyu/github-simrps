<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AkadDosenEditRequest extends FormRequest
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
            
				"nidn" => "filled|string",
				"id_prodi" => "nullable|numeric",
				"nama_lengkap" => "nullable|string",
				"nama_lengkap_gelar" => "nullable|string",
				"jkel" => "nullable",
				"id_jabfung" => "nullable|numeric",
				"isactive" => "nullable",
				"id_user" => "nullable|numeric",
            
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
