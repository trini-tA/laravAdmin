@extends('layouts.adminlte')


@section('main')
    <a class="btn btn-primary btn-add-user" href="{{ route( 'user.create' ) }}">{{ __('New user') }}</a>
    <table id="notification-list" class="common-datatable table table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>{{ __('notifiable_type') }}</th>
                <th>{{ __('notifiable_id') }}</th>
                <th>{{ __('data') }}</th>
                <th>{{ __('read_at') }}</th>
                <th>{{ __('created_at') }}</th>
                <th>{{ __('updated_at') }}</th>
                <th>{{ __('actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach( auth()->user()->notifications as $notification )
                <tr data-id="{{ $notification->id }}">
                    <td>{{ $notification->notifiable_type }}</td>
                    <td>{{ $notification->notifiable_id }}</td>
                    <td>{{ json_encode( $notification->data ) }}</td>
                    <td>{{ $notification->read_at }}</td>
                    <td>{{ $notification->created_at }}</td>
                    <td>{{ $notification->updated_at }}</td>
                    <td>{{ $notification->actions }}</td>
                    <td>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('notifiable_type') }}</th>
                <th>{{ __('notifiable_id') }}</th>
                <th>{{ __('data') }}</th>
                <th>{{ __('read_at') }}</th>
                <th>{{ __('created_at') }}</th>
                <th>{{ __('updated_at') }}</th>
                <th>{{ __('actions') }}</th>
            </tr>
        </tfoot>
    </table>

@endsection
