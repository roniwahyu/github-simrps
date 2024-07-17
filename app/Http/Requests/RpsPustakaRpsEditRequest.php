<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RpsPustakaRpsEditRequest extends FormRequest
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
            
				"id_mk" => "nullable",
				"id_rps" => "nullable",
				"no_urut" => "nullable|numeric",
				"pustaka" => "nullable",
				"deskripsi" => "nullable",
				"jenis_pustaka" => "nullable",
				"url" => "nullable",
            
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
