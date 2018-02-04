<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{ asset('') }}assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('') }}assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('') }}assets/css/form-elements.css">
        <link rel="stylesheet" href="{{ asset('') }}assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        {{--mousetrap--}}
        <script src="{{ asset('') }}assets/mousetrap/mousetrap.min.js"></script>
        {{--mousetrap--}}

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{ asset('') }}assets/ico/favicon.png">
        {{--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('') }}assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('') }}assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('') }}assets/ico/apple-touch-icon-72-precomposed.png">--}}
        <link rel="apple-touch-icon-precomposed" href="{{ asset('') }}assets/ico/apple-touch-icon-57-precomposed.png">
        <script src="{{ asset('') }}assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script>
            Mousetrap.bind('enter', function(event) {
                event.preventDefault();
                //alert('da');
                $('[type="submit"]').click();
            }, 'keyup');

            $(document).click(function () {
                $.ajax({
                    cache: false,
                    global: false,
                    url: "{{ url('/home') }}",
                    success: function () {
                        window.location.reload();
                    }
                });
            });
        </script>
    </head>

    <body>

		<!-- Top menu -->
		<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
			<div class="container">

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<span class="li-text">
								Put some text or
							</span> 
							<a href="#"><strong>links</strong></a> 
							<span class="li-text">
								here, or some icons: 
							</span> 
							<span class="li-social">
								<a href="#"><i class="fa fa-facebook"></i></a> 
								<a href="#"><i class="fa fa-twitter"></i></a> 
								<a href="#"><i class="fa fa-envelope"></i></a> 
								<a href="#"><i class="fa fa-skype"></i></a>
							</span>
						</li>
					</ul>
				</div>
			</div>
		</nav>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><img src="{{ asset('') }}assets/img/news_tech_logo.png"></h1>
                            <div class="description">
                            	<p>

                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                        		
                        		<fieldset>
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Login</h3>
		                            		<p>Tell us your ID Password:</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-user"></i>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				                    	<div class="">
				                    		<label class="sr-only" for="form-first-name">User ID</label>
				                        	<input type="text" name="email" placeholder="User ID" class="form-first-name form-control" id="form-first-name">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
				                        </div>
				                        </div>
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				                        <div class="">
				                        	<label class="sr-only" for="form-last-name">Password</label>
				                        	<input type="password" name="password" placeholder="Password" class="form-last-name form-control" id="form-last-name">
				                        </div>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
				                        </div>
                                            <style>
                                                a.btn {
                                                    min-width: 105px;
                                                    background: #19b9e7 none repeat scroll 0 0;
                                                    border: 0 none;
                                                    border-radius: 4px;
                                                    box-shadow: none;
                                                    color: #fff;
                                                    font-family: "Roboto",sans-serif;
                                                    font-size: 16px;
                                                    font-weight: 300;
                                                    height: 50px;
                                                    line-height: 50px;
                                                    margin: 0;
                                                    padding: 0 20px;
                                                    text-shadow: none;
                                                    transition: all 0.3s ease 0s;
                                                    vertical-align: middle;
                                                }
                                            </style>
				                        <button type="submit" class="btn btn-next">Login</button> or <a href="{{ url('/register') }}" class="btn">Registration</a>
                                        <a class="btn-link" href="{{ url('/password/reset') }}"> &nbsp;&nbsp;&nbsp; Forgot Your Password?</a>
                                    </div>
			                    </fieldset>

		                    </form>
		                    
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="{{ asset('') }}assets/js/jquery-1.11.1.min.js"></script>
        <script src="{{ asset('') }}assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ asset('') }}assets/js/jquery.backstretch.min.js"></script>
        <script src="{{ asset('') }}assets/js/retina-1.1.0.min.js"></script>
        <script src="{{ asset('') }}assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="{{ asset('') }}assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>