@extends('layouts.adminlte')

@section('main')
    <form action="{{ $user? route('user.update', ['user' => $user->id ]): route( 'user.store') }}" method="POST">
        @csrf
        @method( $user? 'PUT' : 'POST' )
       
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if( isset($success) )
            <div class="alert alert-success">
                {{ $success }}
            </div>
        @endif
        
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">{{ __('user') }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{ __('name') }}</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old( 'name', $user? $user->name: '' )}}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('email') }}</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old( 'email',  $user? $user->email: '' )}}" {{ $user? 'readonly': '' }} required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">{{ __('password') }}</label>
                        <input type="password" id="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">{{ __('password_confirmation') }}</label>
                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
                    </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Role & Permissions') }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-2">
                <a href="{{ route( 'user.index' ) }}" class="btn btn-secondary">{{ __('cancel') }}</a>
                <input type="submit" value="{{ $user? __('Save'): __('Create') }}" class="btn btn-success float-right">
            </div>
        </div>

    </form>       
@endsection
