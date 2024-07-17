<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AkadPtAddRequest extends FormRequest
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
            
				"kode_pt" => "required|string",
				"nm_pt" => "required|string",
				"tgl_pt" => "required|date",
				"sk_pt" => "required|string",
				"tgl_sk_pt" => "required|date",
				"almt_pt" => "required|string",
				"kota_pt" => "required|string",
				"kodepos_pt" => "required|string",
				"telp_pt" => "required|string",
				"fax_pt" => "required|string",
				"email_pt" => "required|email",
				"web_pt" => "required|string",
				"logo_pt" => "required|string",
            
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
