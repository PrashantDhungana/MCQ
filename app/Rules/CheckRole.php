<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Role;

class CheckRole implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $id;
//THIS IS CURRENTLY NOT IN USE 

    public function __construct($id)
    {
        $this->id= $id;
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
        $roles = Role::where('role_id');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Wrong Role Chosen';
    }
}
