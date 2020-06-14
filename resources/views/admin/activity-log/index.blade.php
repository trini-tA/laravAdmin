@extends('layouts.adminlte')


@section('main')
    <table id="users-list" class="common-datatable table table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>{{ __('id') }}</th>
                <th>{{ __('subject_type') }}</th>
                <th>{{ __('description') }}</th>
                <th>{{ __('causer_id') }}</th>
                <th>{{ __('created_at') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $logs as $log )
                <tr >
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->subject_type }}</td>
                    <td>
                        {{ $log->description }}
                        <small>{{ $log->properties }}</small>
                    </td>
                    <td>{{ $log->causer_id }}</td>
                    <td>{{ $log->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('id') }}</th>
                <th>{{ __('subject_type') }}</th>
                <th>{{ __('description') }}</th>
                <th>{{ __('causer_id') }}</th>
                <th>{{ __('created_at') }}</th>
            </tr>
        </tfoot>
    </table>

@endsection
