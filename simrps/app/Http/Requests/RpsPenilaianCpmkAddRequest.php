<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RpsPenilaianCpmkAddRequest extends FormRequest
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
            
				"id_subcpmk" => "nullable|numeric",
				"id_asesmen" => "nullable|numeric",
				"id_kriteria" => "nullable|numeric",
				"bobot_prosen" => "nullable|numeric",
				"date_update" => "nullable|date",
				"isactive" => "nullable",
            
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