<?php

namespace Test\Contactform\Components;

use Cms\Classes\ComponentBase;
use October\Rain\Exception\ValidationException;

class ContactForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            "name" => "Contact form",
            "description" => "Test contact form component"
        ];
    }


    public function onSend()
    {
        $data = \Input::only([
            "first_name", "last_name", "email", "content"
        ]);
        $this->validate($data);

        $receiver = "ima.chislo@gmail.com";

        \Mail::send("test.contact::contact", $data, function($message) use ($receiver) {
            $message->to($receiver);
        });
    }


    protected function validate(array $data)
    {
        $rules = [
            "first_name" => "required|min:3|max:255",
            "last_name" => "required|min:3|max:255",
            "email" => "required|email",
            "content" => "required"
        ];

        $validator = \Validator::make($data, $rules);

        if ($validator->fails())
            throw new ValidationException($validator);
    }
}
