<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\MessageBag;

class BookRequest extends FormRequest
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
            //
            'title'=>'required|min:5|max:50',
            'author'=>'required|min:5|max:30',
            'description'=>'required|min:10|max:100',
            'image'=>'required|min:5|max:20',
            'isbn'=>'required|min:5|max:20',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Title is required',
            'title.min'=>'Title is min = 5',
            'title.max'=>'Title is max = 50',
            'author.required'=>'Author is required',
            'author.min'=>'Author is min = 5 ',
            'author.max'=>'Author is max = 5 ',
            'description.required'=>'Description is required',
            'description.min'=>'Description is min = 10',
            'description.max'=>'Description is max = 100',
            'image.required'=>'image is required',
            'image.min'=>'image is min = 5',
            'image.max'=>'image is max = 20',
            'isbn.required'=>'ISBN is required',
            'isbn.min'=>'ISBN is min = 5',
            'isbn.max'=>'ISBN is max = 20',
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'Tiêu Đề',
            'author' => 'Tác Giả',
            'description' => 'Mô Tả',
        ];
    }
}
