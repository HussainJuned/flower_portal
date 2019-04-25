@extends('layouts.master')

@section('title', 'Floral Portal')

@section('content')
  <div class="content_middle">
      <main class="text-center">
          @guest
              <h2>Welcome to the Floral Portal</h2>
              <p class="mb-5">Please Register or Sign in</p>
              <a href="{{ route('login') }}" class="btn j_btn mr-3">Login</a>
              <a href="{{ route('register') }}" class="btn j_btn">Register</a>
          @else
              <h2>Welcome to the Floral Portal</h2>
              <p class="mb-5">{{ Auth::user()->name }}</p>
              <a class="btn j_btn" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          @endguest
      </main>
  </div>
@endsection