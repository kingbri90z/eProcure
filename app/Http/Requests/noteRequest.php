<?php

namespace TeamQilin\Http\Requests;

use TeamQilin\Http\Requests\Request;

class noteRequest extends Request
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
            'body'      => 'required',
            'block_id'  => 'required',
        ];
    }
}
