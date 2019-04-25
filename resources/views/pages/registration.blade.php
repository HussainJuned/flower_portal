@extends('layouts.master')

@section('title', 'Registration Page')

@section('content')
  <div class="container">
      <main>
  
      	<form action="" method="post" class="w-50 m-auto">
      		<h2 class="mt-5 mb-30">Register</h2>
      		<div class="form-group mb-30">
      		    <label for="email">Your Email address</label>
      		    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="you@example.com">
      		  </div>
      		  <div class="form-group mb-30">
      		    <label for="password">Choose Your New Password</label>
      		    <input type="password" class="form-control" id="password" placeholder="secret@12345">
      		  </div>
      		  <div class="form-group mb-30">
      		    <label for="password_confirm">Retype The Password</label>
      		    <input type="password" class="form-control" id="password_confirm" placeholder="retype">
      		  </div>
      		  <div class="form-group mb-30 form-check">
      		    <input type="checkbox" class="form-check-input" id="exampleCheck1">
      		    <label class="form-check-label" for="exampleCheck1">I agree to the terms and conditions</label>
      		  </div>
      		  <button type="submit" class="btn j_btn">Submit</button>
      	</form>
      </main>
  </div>
@endsection