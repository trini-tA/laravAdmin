@extends('layouts.adminlte')

@section('main')
    
    <a class="btn btn-primary btn-add-user" href="{{ route( 'permission.create' ) }}">{{ __('New permission') }}</a>
    <table id="permission-list" class="common-datatable table table-bordered table-striped" style="width:100%">
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
            @foreach( $permissions as $permission )
                <tr >
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->display_name }}</td>
                    <td>
                        <div class="d-flex flex-column">
                            <label>{{ __( 'User(s): ' ) }}&nbsp;{{ $permission->users->count() }}</label>
                            <label>{{ __( 'Role(s): ' ) }}&nbsp;{{ $permission->roles->count() }}</label>
                        </div>
                    </td>
                    <td>
                        <div class="float-right">
                            <a class="btn btn-info btn-sm" href="{{ route( 'permission.edit', ['permission' => $permission->id]) }}">
                                <i class="fas fa-pencil-alt"></i>&nbsp;{{ __('edit') }}
                            </a>
                            <button class="btn btn-danger btn-sm btn-delete-laratrust" data-type="permission" data-href="{{ route( 'permission.destroy', ['permission' => $permission->id ]) }}" data-permission-id="{{ $permission->id }}">
                                <i class="fas fa-trash"></i>&nbsp;{{ __('delete') }}
                            </button>
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
