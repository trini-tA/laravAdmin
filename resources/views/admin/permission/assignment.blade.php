@extends('layouts.adminlte')

@section('main')
<form action="{{ route( 'assignment.store') }}" method="POST">
    @csrf
    @method( 'POST' )
   
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
    <table>
        <thead>
            <tr>
                <th class="w-50">&nbsp;</th>
                @foreach( $roles as $role )
                    <th class="text-center" data-id="{{ $role->id }}" data-name="{{ $role->name }}">{{ $role->display_name }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach( $permissions as $permission )
                <tr>
                    <td class="w-50 " data-id="{{ $permission->id }}" data-name="{{ $permission->name }}">
                        {{ $permission->display_name }}
                        <small>{{ $permission->decription }}</small>
                    </td>
                    @foreach( $roles as $role )
                        <td class="w-25 text-center" data-id="{{ $role->id }}" data-name="{{ $role->name }}">
                            <input name="permissions[{{$role->id}}][{{$permission->id}}][]" type="checkbox" class="minimal" {{ $role->hasPermission( $permission->name )? 'checked' : '' }}>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>&nbsp;</th>
                @foreach( $roles as $role )
                    <th class="text-center" data-id="{{ $role->id }}" data-name="{{ $role->name }}">{{ $role->display_name }}</th>
                @endforeach
            </tr>
        </tfoot>
    </table>
    <div class="col-md-12 mb-2">
        <a href="{{ route( 'admin' ) }}" class="btn btn-secondary">{{ __('cancel') }}</a>
        <input type="submit" value="{{ __('Save') }}" class="btn btn-success float-right">
    </div>
</form>
@endsection
