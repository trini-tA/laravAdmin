@extends('layouts.adminlte')

@section('main')
    <form action="{{ $permission? route('permission.update', ['permission' => $permission->id ]): route( 'permission.store') }}" method="POST">
        @csrf
        @method( $permission? 'PUT' : 'POST' )
       
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
                        <h3 class="card-title">{{ __('permission') }}</h3>
                        <div class="card-tools d-none">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                            <label for="name">{{ __('name') }}</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old( 'name', $permission? $permission->name: '' )}}" {{ $permission? 'readonly': '' }} required>
                        </div>
                        <div class="form-group">
                            <label for="display_name">{{ __('display_name') }}</label>
                            <input type="display_name" id="display_name" name="display_name" class="form-control" value="{{ old( 'display_name',  $permission? $permission->display_name: '' )}}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('description') }}</label>
                            <input type="description" id="description" name="description" class="form-control" value="{{ old( 'description',  $permission? $permission->description: '' )}}" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 offset-md-3 mb-2">
                <a href="{{ route( 'permission.index' ) }}" class="btn btn-secondary">{{ __('cancel') }}</a>
                <input type="submit" value="{{ $permission? __('Save'): __('Create') }}" class="btn btn-success float-right">
            </div>
        </div>

    </form>       
@endsection
