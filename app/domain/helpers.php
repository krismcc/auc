<?php

function errors_for($attribute, $errors){ 
    
    return $errors->first($attribute, '<span class="error">:message</span>');
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

