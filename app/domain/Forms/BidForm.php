<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace domain\Forms;

/**
 * Description of LoginForm
 *
 * @author Kris
 */
use Laracasts\Validation\FormValidator;

class BidForm extends FormValidator {
    protected $rules = [
        'bid' => 'required|email',
        'permission' => 'required'
        
    ];
    //put your code here
    
}
