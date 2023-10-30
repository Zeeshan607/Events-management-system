<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch ($this->method()){
            case "POST":
                return[
                    "title"=>["required", "string"],
                    "datetime"=>["required","date_format:Y-m-d\TH:i"],
                    "image"=>["required","image","mimes:jpeg,png,jpg","max:2048"],
                    "city"=>["required","string","max:255"],
                    "country"=>["required","string","max:255"],
                    "address"=>["required","string"],

                ];
                break;
            case "PUT":
                return[
                    "title"=>["required", "string"],
                    "datetime"=>["nullable","date_format:Y-m-d\TH:i"],
                    "image"=>["nullable","image","mimes:jpeg,png,jpg","max:2048"],
                    "city"=>["required","string","max:255"],
                    "country"=>["required","string","max:255"],
                    "address"=>["required","string"],

                ];
                break;
        }

    }
}
