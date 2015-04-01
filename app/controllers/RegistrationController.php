    <?php

    use domain\Forms\RegistrationForm;

    class RegistrationController extends BaseController {
    /**
    * @var RegistrationForm
    */
        private $registrationForm;
        /**
        * @param RegistrationForm $registrationForm
        */
        function __construct(RegistrationForm $registrationForm)
        {
             $this->registrationForm = $registrationForm;
        }
        
        /**
        * Show the form for creating a new resource.
        *
        * @return Response
        */
        public function create()
        {
            if(Auth::check()){
                return Redirect::home();
            }

        return View::make('registration.create');
        }
        
        /**
        * Store a newly created resource in storage.
        *
        * @return Response
        */
        public function store()
        {   //get the input submitted by user
            $input = Input::only('username', 'email', 'password', 'password_confirmation');
            
            //validate this info
            $this->registrationForm->validate($input);
            
            //create the user record
            $user = User::create($input);
            
            //log in the user
            Auth::login($user);
            
            return Redirect::home();
        }
    }