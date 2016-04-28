<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BeneficiaryFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        /*
        $postId = $this->route('post');

    return Gate::allows('update', Post::findOrFail($postId));
        */
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
            'first_name' => 'required'
        ];
    }
}
