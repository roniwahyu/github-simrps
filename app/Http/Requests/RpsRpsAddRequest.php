<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RpsRpsAddRequest extends FormRequest
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
            
				"id_fakultas" => "nullable",
				"id_prodi" => "nullable",
				"id_mk" => "nullable",
				"id_otoritas1" => "nullable|numeric",
				"id_otoritas2" => "nullable|numeric",
				"deskripsi_rps" => "nullable",
            
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
