@extends('layouts.adminlte')

@section('main')
    <table id="users-list" class="common-datatable table table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>{{ __('id') }}</th>
                <th>{{ __('name') }}</th>
                <th>{{ __('email') }}</th>
                <th>{{ __('updated_at') }}</th>
                <th>{{ __('actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $users as $user )
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <div class="float-right">
                            <button class="btn btn-primary btn-reset-user" data-href="{{ route( 'password.email') }}" data-email="{{ $user->email }}" >{{ __('reset email') }}</button>
                            <a class="btn btn-primary" href="{{ route( 'user.edit', ['user' => $user->id]) }}">{{ __('edit') }}</a>
                            <button class="btn btn-danger btn-delete-user" data-href="{{ route( 'user.destroy', ['user' => $user->id ]) }}" data-user-id="{{ $user->id }}">{{ __('delete') }}</button>
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
                <th>{{ __('updated_at') }}</th>
                <th>{{ __('actions') }}</th>
            </tr>
        </tfoot>
    </table>

@endsection
