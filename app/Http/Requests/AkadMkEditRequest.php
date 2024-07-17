<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AkadMkEditRequest extends FormRequest
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
            
				"kode_mk" => "filled|string",
				"id_siakad_kurikulum" => "filled",
				"nm_mk" => "filled|string",
				"jns_mk" => "filled",
				"kurikulum_mk" => "filled",
				"kelompok_mk" => "filled",
				"sks_mk" => "filled|numeric",
				"sks_tatapmuka" => "filled|numeric",
				"sks_praktikum" => "filled|numeric",
				"min_mk_lulus" => "filled",
				"status_mk" => "filled",
				"upload_silabus_mk" => "filled|string",
				"upload_sap_mk" => "filled|string",
				"upload_bahan_mk" => "filled|string",
				"upload_diktat_mk" => "filled|string",
				"id_prodi" => "nullable",
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
