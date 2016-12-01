<?php namespace Protestwit\Group\Http\Requests\Join;


use Illuminate\Foundation\Http\FormRequest;

class SuccessRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }

}