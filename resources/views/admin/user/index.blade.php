@extends('layouts.adminlte')

@section('main')
    <a class="btn btn-primary btn-add-user" href="{{ route( 'user.create' ) }}">{{ __('New user') }}</a>
    <table id="users-list" class="common-datatable table table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>{{ __('id') }}</th>
                <th>{{ __('name') }}</th>
                <th>{{ __('email') }}</th>
                <th>{{ __('roles') }}</th>
                <th>{{ __('updated_at') }}</th>
                <th>{{ __('actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $users as $user )
                <tr >
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <ul>
                            @foreach( $user->roles as $role )
                                <li>{{ $role->display_name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <div class="float-right">
                            <button class="btn btn-primary btn-sm btn-reset-user" data-href="{{ route( 'password.email') }}" data-email="{{ $user->email }}">
                                <i class="fas fa-folder"></i>&nbsp;{{ __('Reset email') }}
                            </button>
                            <a class="btn btn-info btn-sm" href="{{ route( 'user.edit', ['user' => $user->id]) }}">
                                <i class="fas fa-pencil-alt"></i>&nbsp;{{ __('edit') }}
                            </a>
                            <button class="btn btn-danger btn-sm btn-delete-user" data-href="{{ route( 'user.destroy', ['user' => $user->id ]) }}" data-user-id="{{ $user->id }}">
                                <i class="fas fa-trash"></i>&nbsp;{{ __('delete') }}
                            </button>
                            <a class="btn btn-info btn-sm" href="{{ route( 'user.token', ['user' => $user->id] ) }}"><i class="fas fa-pencil-alt"></i>&nbsp;{{ __('token')}}</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('id') }}</th>
                <th>{{ __('name') }}</th>
                <th>{{ __('email') }}</th>
                <th>{{ __('roles') }}</th>
                <th>{{ __('updated_at') }}</th>
                <th>{{ __('actions') }}</th>
            </tr>
        </tfoot>
    </table>

@endsection
