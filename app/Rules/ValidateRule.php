<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($valid)
    {
        $this->valid = $valid;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

if($this->valid=='validate_rep_price'){


    $b =  str_replace( ",","" , $value);


    $pattern = "/^[0-9]*$/";
    $patt=preg_match($pattern, $b);
         return $patt === 1;




            }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {

        if($this->valid=='validate_rep_price'){
            return 'لطفا :attribute را به فرمت صحیح عددی وارد نمایید';

        }

    }
}
