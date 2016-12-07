<?php namespace Protestwit\Frontend\Http\Requests\Boycott;

use Illuminate\Foundation\Http\FormRequest;

class VoteDownRequest extends FormRequest
{

    public function authorize()
    {
        //@todo the user should only be able to vote once
        return true;
    }

    public function rules()
    {
        return [];
    }
}