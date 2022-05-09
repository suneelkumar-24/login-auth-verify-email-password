<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use PhpParser\Node\Stmt\Return_;

class StorePostRequest extends FormRequest
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

        $rules =  User::VALIDATION_RULES;
        // if($this->getMethod()=='POST')
        // {
            return $rules+=['password' => 'required', 'string', 'min:11', 'confirmed'];
        // }
        // else
        // {
        //     return $rules;
        // }
        // return [
        //     'name' => ['required', 'string', 'max:255'],
        //     'phone_number' => ['string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:10', 'confirmed'],
        // ];
    }
}
