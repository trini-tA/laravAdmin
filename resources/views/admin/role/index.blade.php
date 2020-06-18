@extends('layouts.adminlte')

@section('main')
    
    <a class="btn btn-primary btn-add-user" href="{{ route( 'role.create' ) }}">{{ __('New role') }}</a>
    <table id="role-list" class="common-datatable table table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>{{ __('id') }}</th>
                <th>{{ __('name') }}</th>
                <th>{{ __('display_name') }}</th>
                <th>{{ __('info') }}</th>
                <th>{{ __('actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $roles as $role )
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->display_name }}</td>
                    <td>
                        <div class="d-flex flex-column">
                            <label>{{ __( 'User(s): ' ) }}&nbsp;{{ $role->users->count() }}</label>
                            <label>{{ __( 'Permission(s): ' ) }}&nbsp;{{ $role->permissions->count() }}</label>
                        </div>
                    </td>
                    <td>
                        <div class="float-right">
                            <a class="btn btn-info btn-sm" href="{{ route( 'role.edit', ['role' => $role->id]) }}">
                                <i class="fas fa-pencil-alt"></i>&nbsp;{{ __('edit') }}
                            </a>
                            
                            @if( !in_array( $role->name, config( 'laratrust.panel.roles_restrictions')['not_deletable'] ) )
                                <button class="btn btn-danger btn-sm btn-delete-laratrust" data-type="role" data-href="{{ route( 'role.destroy', ['role' => $role->id ]) }}" data-role-id="{{ $role->id }}">
                                    <i class="fas fa-trash"></i>&nbsp;{{ __('delete') }}
                                </button>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('id') }}</th>
                <th>{{ __('name') }}</th>
                <th>{{ __('display_name') }}</th>
                <th>{{ __('info') }}</th>
                <th>{{ __('actions') }}</th>
            </tr>
        </tfoot>
    </table>

@endsection
