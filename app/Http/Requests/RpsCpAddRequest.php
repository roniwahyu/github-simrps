<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RpsCpAddRequest extends FormRequest
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
            
				"row.*.id_prodi" => "nullable|numeric",
				"row.*.kode_cp" => "nullable|string",
				"row.*.nama_cp" => "nullable",
				"row.*.deskripsi" => "nullable",
				"row.*.id_jenis_cp" => "nullable",
            
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
