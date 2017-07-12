<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UploadFileRequest extends Request
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
        $rules =  [
            'beneficiary_id' => 'required',
            'files' => 'required'
        ];

        $files = count($this->input('files'));
        foreach(range(0, $files) as $index) {
            $rules['photos.' . $index] = 'max:2000';
        }
        return $rules;
    }
}
