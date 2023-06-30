<?php

namespace App\Modules\User\Requests;

use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;
use Symfony\Component\Mailer\Exception\HttpTransportException;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ];
    }

    /**
     * Get the validated data from the request.
     *
     * @param string|null $key
     * @param mixed $default
     * @return mixed|array
     */
    public function validated($key = null, $default = null)
    {
        $validatedData = parent::validated();
        $validatedData['password'] = bcrypt($this->input('password'));
        return $validatedData;
    }

    protected function failedValidation(ValidationValidator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation error',
            'errors' => $validator->errors(),
        ], 403));
    }


    
}
