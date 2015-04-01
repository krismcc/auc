<?php

use domain\Forms\LoginForm;

class SessionsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /sessions
	 *
	 * @return Response
	 */
        protected $loginForm;
         
        function __construct(LoginForm $loginForm){ 
            $this->loginForm = $loginForm;
        }
        
	public function index()
	{
            return View::make('sessions.index');

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
            return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{
            
            $this->loginForm->validate($input = Input::only('email', 'password'));
            
            if(Auth::attempt($input))
            { 
               return Redirect::intended('/');
            }
            
            return Redirect::back()->withInput()->withFlashMessage('Incorrect Email/Password');
	}

	/**
	 * Display the specified resource.
	 * GET /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
            return View::make('sessions.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /sessions/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            return View::make('sessions.edit');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
        
       // to operate this restfully a delete request should be sent to seessions/userid opr something like that
	public function destroy($id = null)
	{
            Auth::logout();
            
            return Redirect::home();
	}

}