@extends('layouts.adminlte')

@section('main')
    <form action="{{ $role? route('role.update', ['role' => $role->id ]): route( 'role.store') }}" method="POST">
        @csrf
        @method( $role? 'PUT' : 'POST' )
       
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
            <div class="col-md-6 offset-md-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('role') }}</h3>
                        <div class="card-tools d-none">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                            <label for="name">{{ __('name') }}</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old( 'name', $role? $role->name: '' )}}" {{ $role? 'readonly': '' }} required>
                        </div>
                        <div class="form-group">
                            <label for="display_name">{{ __('display_name') }}</label>
                            <input type="display_name" id="display_name" name="display_name" class="form-control" value="{{ old( 'display_name',  $role? $role->display_name: '' )}}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('description') }}</label>
                            <input type="description" id="description" name="description" class="form-control" value="{{ old( 'description',  $role? $role->description: '' )}}" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 offset-md-3 mb-2">
                <a href="{{ route( 'role.index' ) }}" class="btn btn-secondary">{{ __('cancel') }}</a>
                <input type="submit" value="{{ $role? __('Save'): __('Create') }}" class="btn btn-success float-right">
            </div>
        </div>

    </form>       
@endsection
