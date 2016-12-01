<?php namespace Protestwit\Frontend\Http\Requests\Group;

use Illuminate\Foundation\Http\FormRequest;

class ShowRequest extends FormRequest
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