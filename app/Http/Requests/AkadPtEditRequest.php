<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AkadPtEditRequest extends FormRequest
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
            
				"kode_pt" => "filled|string",
				"nm_pt" => "filled|string",
				"tgl_pt" => "filled|date",
				"sk_pt" => "filled|string",
				"tgl_sk_pt" => "filled|date",
				"almt_pt" => "filled|string",
				"kota_pt" => "filled|string",
				"kodepos_pt" => "filled|string",
				"telp_pt" => "filled|string",
				"fax_pt" => "filled|string",
				"email_pt" => "filled|email",
				"web_pt" => "filled|string",
				"logo_pt" => "filled|string",
            
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
