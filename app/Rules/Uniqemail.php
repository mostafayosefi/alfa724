<?php

namespace App\Rules;

use App\Models\Admin;
use App\Models\User;
use App\Models\Contact;
use App\Models\Nameserver;
use Illuminate\Contracts\Validation\Rule;
use phpDocumentor\Reflection\Types\Null_;

class Uniqemail implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($name_table , $attr , $id)
    {
        $this->attr = $attr;
        $this->id = $id;
        $this->name_table = $name_table;
    }
    public $id;


    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value )
    {

        if($this->name_table=='users'){ $model=  User::query(); } 
        if($this->name_table=='pages'){ $model=  User::query(); }

        $count =$model->where([
            [$attribute , '=' , $value],
            ['id' , '<>' , $this->id] ,
            ])->count();
    return $count == 0;


    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if($this->attr=='username'){
           return 'این نام کاربری قبلا در سیستم ثبت شده است.';
        }
        if($this->attr=='email'){
           return 'این ایمیل قبلا در سیستم ثبت شده است.';
        }
        if($this->attr=='tell'){
           return 'این شماره تلفن قبلا در سیستم ثبت شده است.';
        }
        if($this->attr=='nikname'){
           return 'این Nikname قبلا در سیستم ثبت شده است.';
        }
        if($this->attr=='domain_id'){
           return 'این دامنه قبلا برای تنظیمات یک Namesever دیگر ثبت شده است';
        }

    }
}
