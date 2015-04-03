@extends('main')

@section('content')
<div class="container-fluid">
    <div class="front-login">

        <div class="row">

            <div class="col-md-6">
                <div class="login-container">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Incorrect login data</strong><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="/auth/login">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h2>My account</h2>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">Password</label>
                           <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="register-container">
                    <form method="post">
                        <h2>Create account</h2>
                         <div class="form-group">
                           <div class="form-group-line register-firstname-field">
                               <label for="FirstNameInput">Firstname</label>
                               <input type="text" class="form-control" id="FirstNameInput" placeholder="firstname">
                           </div>
                           <div class="form-group-line register-lastname-field">
                               <label for="LastNameInput">Lastname</label>
                               <input type="text" class="form-control" id="LastNameInput" placeholder="lastname">
                           </div>
                         </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="email">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">Password</label>
                           <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                          <label class="checkbox-inline">
                            <input name="gender" type="radio" id="inlineCheckbox1" value="male"> Male
                          </label>
                          <label class="checkbox-inline">
                            <input name="gender" type="radio" id="inlineCheckbox2" value="female"> Female
                          </label>
                        </div>
                        <button type="submit" class="btn btn-default">Create account</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection