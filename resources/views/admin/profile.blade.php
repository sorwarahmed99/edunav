@extends('layouts.admin')

@section('content')


	<div class="container-fluid">
	  <div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header bg-blue text-white text-center">
					<h3>Profile Info</h3> 
				</div>
				
				<div class="container">

					<div class="card o-hidden border-0 shadow-lg my-5">
					  <div class="card-body p-0">
						<div class="row">
						  <div class="col-lg-3 d-none d-lg-block p-5" align="center">
							<div class="profile-image">
								@if(Auth::user()->profile_image != '')
								<img src="{{ asset(Auth::user()->profile_image) }}" alt="profile image" class="img-profile rounded-circle" style="height:200px; width:200px;">
								@else
								<img class="img-profile rounded-circle" src="{{ asset('resource/assets/img/avatar1.png') }}" style="height:200px; width:200px;">
								@endif
								<h4><b>{{ Auth::user()->name }}</b></h4>
								<p>{{ Auth::user()->email }}</p>
								<hr>
							</div>
						  </div>
						  <div class="col-lg-9">
							<div class="p-5">
							  <div class="text-left">
								<h1 class="h4 text-gray-900 mb-4 text-center">Edit Profile</h1>
								@if(session('error'))
								<div class="alert alert-danger">
										{{ session('error') }}
								</div>
								@endif

								@if($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
							  </div>
								<form action="{{ route('profileUpdate') }}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="card-body">
										<div class="row mb-5">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="form-control-label">Name</label>
															<input name="name" class="form-control" type="text" value="{{ Auth::user()->name }}">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="form-control-label">Email Address</label>
															<input name="email" class="form-control" type="text" value="{{ Auth::user()->email }}">
														</div>
													</div>
												</div>
				
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="form-control-label">Phone</label>
															<input name="phone" class="form-control" type="text" value="{{ Auth::user()->phone }}">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="form-control-label">NID</label>
															<input name="nid" class="form-control" type="text" value="{{ Auth::user()->nid }}">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
									                  <label for="position">Gender</label>
									                  <select name="gender" class="form-control" id="position">
									                  	@if(Auth::user()->gender == 1)
									                    <option value="1">Male</option>
									                    <option value="2">Female</option>
									                    <option value="3">Other</option>
									                    @elseif(Auth::user()->gender == 2)
									                    <option value="2">Female</option>
									                    <option value="1">Male</option>
									                    <option value="3">Other</option>
									                    @elseif(Auth::user()->gender == 3)
									                    <option value="3">Other</option>
									                    <option value="1">Male</option>
									                    <option value="2">Female</option>
									                    @else
									                    <option selected disabled>Select Gender</option>
									                    <option value="1">Male</option>
									                    <option value="2">Female</option>
									                    <option value="3">Other</option>
									                    @endif
									                  </select>
									                </div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="country">Country</label>
											                <select name="country" class="form-control" id="country">
											                	@if(Auth::user()->country)
											                    <option value="Bangladesh">Bangladesh</option>
											                    @else
											                    <option selected disabled>Select country</option>
											                    <option value="Bangladesh">Bangladesh</option>
											                    @endif
											                </select>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="form-control-label">Address</label>
															<input name="address" class="form-control" type="text" value="{{ Auth::user()->address }}">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="form-control-label">Profile Image</label>
															<input name="profile_image" class="form-control" type="file">
														</div>
													</div>
												</div>

												<!-- <img src="{{ asset(Auth::user()->profile_image) }}" height="100" width="100"> -->
											</div>
										</div>
									</div>
										
									<div class="card-footer bg-light text-right">
										<button type="submit" class="btn btn-primary">Save Changes</button>
									</div>
								</form>
								<hr>

									<div class="accordion" id="accordionExample">
										<div class="card">
											<div class="card-header" id="headingFour">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
												  Change Password
												</button>
												<span class="float-right"><i class="fas fa-arrow-down"></i></span>
											  </h2>
											</div>
											<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
												  <div class="card-body">
													  @if(session('error'))
														<div class="alert alert-danger">
																{{ session('error') }}
														</div>
														@endif
														 @if($errors->any())
															<div class="alert alert-danger pt-3">
																<ul>
																	@foreach($errors->all() as $error)
																		<li>{{ $error }}</li>
																	@endforeach
																</ul>
															</div>
														@endif
													<form action="{{ route('changePassword',Auth::user()->id) }}" method="POST">
														@csrf
				
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label for="password-field" class="col-form-label">{{ __('Old Password') }}</label>
																	<input id="password-field" type="password" class="form-control @error('password') is-invalid @enderror"  autocomplete="new-password" name="password" placeholder="Enter Your Old Password">					
																	@error('password')
																		<span class="invalid-feedback" role="alert">
																			<strong>{{ $message }}</strong>
																		</span>
																	@enderror
																</div>
															</div>
															
															<div class="col-md-12">
																<div class="form-group">
																	<label for="password-field" class="col-form-label">{{ __('New Password') }}</label>
																	<input id="password-field" type="password" class="form-control @error('new_password') is-invalid @enderror" value="{{ old('new_password') }}" autocomplete="new-password" name="new_password" placeholder="Enter New Password">
				
																	@error('new_password')
																		<span class="invalid-feedback" role="alert">
																			<strong>{{ $message }}</strong>
																		</span>
																	@enderror
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<label for="password-field" class="col-form-label">{{ __('New Confirm Password') }}</label>
																	<input id="password-field" type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" value="{{ old('new_password_confirmation') }}" autocomplete="new-password" name="new_password_confirmation" placeholder="Enter New Password">
				
																	@error('new_password_confirmation')
																		<span class="invalid-feedback" role="alert">
																			<strong>{{ $message }}</strong>
																		</span>
																	@enderror
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-group mt-1 pt-3">
																	<input type="submit" value="{{ __('Save') }}" class="form-control btn btn-primary mt-2">
																</div>
															</div>
														</div>
													</form>
												  </div>
											</div>
										</div>
									</div>
								</div>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
			
@endsection