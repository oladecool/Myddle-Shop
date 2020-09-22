@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_responsive.css') }}">

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 offset-lg-1">
					<div class="contact_form_container" style="border: 3px dotted; padding: 10px;
                    box-shadow: 5px 10px 18px  #009fc9; border-radius: 25px;">
						<div class="contact_form_title text-center">Sign In </div>

					<form action="{{ route('login')}}" id="contact_form" method="POST">
							@csrf
							
                            <div class="form-group">
								<label for="exampleInputEmail1">Email or Phone</label>
								<input type="text" class="form-control @error('email') is-invalid @enderror" 
								name="email" value="{{ old('email') }}"  aria-describedby="emailHelp"  required="">
								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							    @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
								<input type="password" class="form-control @error('password') is-invalid @enderror"  
								aria-describedby="emailHelp" name="password" required="">
								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							    @enderror
							</div>
							
							<div class="contact_form_button">
								<button type="submit" class="btn btn-info btn-block">Login</button>
                            </div>
							<br>
							
                               <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-facebook-official" aria-hidden="true"></i>
                                Facebook</button>
                               <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-google" aria-hidden="true"></i>
								Google</button>
								<br>
								<a href="{{ route('password.request') }}">I forgot my Password</a>
							    <br><br>
						</form>


					</div>
                </div>
                
				<div class="col-lg-5 offset-lg-1">
					<div class="contact_form_container" style="border: 3px dotted; padding: 10px;
                    box-shadow: 5px 10px 18px  #009fc9; border-radius: 25px;">
					<div class="contact_form_title text-center">Sign Up </div>
						<form action="{{ route('register') }}" id="contact_form" method="post">
							@csrf
						 <div class="form-group">
				  			 <label for="exampleInputEmail1">Full Name</label>
				   			  <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Full Name " name="name" required="">
						</div>
			   
					   <div class="form-group">
				  			 <label for="exampleInputEmail1">Phone</label>
				  			 <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  aria-describedby="emailHelp" placeholder="Enter Your Phone " required="">
						</div>
			   
						<div class="form-group">
				   			<label for="exampleInputEmail1">Email</label>
				   			<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp" placeholder="Enter Your Email " required="">
						</div>
			   
						<div class="form-group">
				   			<label for="exampleInputEmail1">Password</label>
				  			 <input type="password" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Password " name="password" required="">
						</div>
			   
						<div class="form-group">
				  			 <label for="exampleInputEmail1">Confirm Password</label>
				   			 <input type="password" class="form-control"  aria-describedby="emailHelp" placeholder="Re-Type Password " name="password_confirmation" required="">
						</div>

						<div class="contact_form_button">
						<button type="submit" class="btn btn-info btn-block">Sign Up</button>
						</div>
					  </form>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Map -->

	<div class="contact_map">
		<div id="google_map" class="google_map">
			<div class="map_container">
				<div id="map"></div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="images/send.png" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection
