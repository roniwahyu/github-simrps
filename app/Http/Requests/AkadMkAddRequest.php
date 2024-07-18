<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AkadMkAddRequest extends FormRequest
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
            
				"kode_mk" => "required|string",
				"id_siakad_kurikulum" => "required",
				"nm_mk" => "required|string",
				"jns_mk" => "required",
				"kurikulum_mk" => "required",
				"kelompok_mk" => "required",
				"sks_mk" => "required|numeric",
				"sks_tatapmuka" => "required|numeric",
				"sks_praktikum" => "required|numeric",
				"min_mk_lulus" => "required",
				"status_mk" => "required",
				"upload_silabus_mk" => "required|string",
				"upload_sap_mk" => "required|string",
				"upload_bahan_mk" => "required|string",
				"upload_diktat_mk" => "required|string",
				"id_prodi" => "nullable",
				"isactive" => "nullable",
				"semester" => "nullable|string",
            
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
