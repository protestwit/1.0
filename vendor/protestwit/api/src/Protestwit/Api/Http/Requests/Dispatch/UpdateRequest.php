<?php namespace Protestwit\Api\Http\Requests\Dispatch;


use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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