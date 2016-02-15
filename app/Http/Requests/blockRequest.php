<?php

namespace TeamQilin\Http\Requests;

use TeamQilin\Http\Requests\Request;

class blockRequest extends Request
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
            'symbol'        => 'required',
            'exchange_id'   => 'required',
            'discount'      => 'required',
            'number_shares' => 'required',
            'need_id'       => 'required',
            'custodian_id'  => 'required',
            'rep_id'        => 'required'
        ];
    }
}
