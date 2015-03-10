<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace domain\Forms;

/**
 * Description of RegistrationForm
 *
 * @author Kris
 */
use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator {
    protected $rules = [
        'username' => 'required|unique:users',
        'email'=> 'required|unique:users',
        'password'=> 'required|confirmed'
        
    ];
    //put your code here
    
}


