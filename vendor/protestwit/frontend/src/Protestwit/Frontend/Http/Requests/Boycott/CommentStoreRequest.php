<?php namespace Protestwit\Frontend\Http\Requests\Boycott;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
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