    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">          
            <li class="active" class="navbar-brand" ><a href="/">Home</a></li>      
            <li class="active" class="navbar-brand"> <a href="auctions">Auctions</a></li>
            <li class="active" class="navbar-brand" ><a href="contact">Contact</a></li>
           <!-- <form class="navbar-form navbar-right">
                <input class="form-control" type="text" placeholder="Search..." ></input>
            </form> -->
          </ul>
            <div class='navbar-form pull-right'>
                                    <fieldset>
                                        @if (Auth::guest())
                                        <a id='btnLogin' class='btn btn-success' href='/login'> Login </a> 
                                        <a id='btnRegister' class='btn btn-success' href='/register'> Register </a>
                                        @else
                                        <a id='btnAddAuction' class='btn btn-success' href='/manageAuctions'> MyAuctions </a> 
                                        <a id='btnAddItem' class='btn btn-success' href='/manageItems'>  MyItems </a>
                                        <a id='btnLogin' class='btn btn-success' href='/logout'> Logout </a>

                                        @endif
                                    </fieldset>
                                </div>
        </div><!--/.nav-collapse -->
      </div>
    </nav>