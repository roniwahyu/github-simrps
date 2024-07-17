<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuditsEditRequest extends FormRequest
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
            
				"user_type" => "nullable|string",
				"user_id" => "nullable|numeric",
				"event" => "filled|string",
				"auditable_type" => "filled|string",
				"auditable_id" => "filled|numeric",
				"old_values" => "nullable",
				"new_values" => "nullable",
				"url" => "nullable",
				"ip_address" => "nullable|string",
				"user_agent" => "nullable|string",
				"tags" => "nullable|string",
            
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
