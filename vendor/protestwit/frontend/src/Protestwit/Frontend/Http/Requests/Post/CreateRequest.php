<?php namespace Protestwit\Frontend\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    public function authorize()
    {
        //@todo only allow credentialed people to create posts
        return true;
    }

    public function rules()
    {
        return [];
    }
}