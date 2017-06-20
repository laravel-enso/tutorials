@extends('laravel-enso/core::layouts.app')

@section('pageTitle', __("Tutorials"))

@section('content')

    <section class="content-header">
        <a class="btn btn-primary" href="/system/tutorials/create">
            {{ __("Create Tutorial") }}
        </a>
        @include('laravel-enso/menumanager::breadcrumbs')
    </section>
    <section class="content">
        <div class="row" v-cloak>
            <div class="col-md-12">
                <data-table source="/system/tutorials">
                    <span slot="data-table-title">{{ __("Tutorials") }}</span>
                    @include('laravel-enso/core::partials.modal')
                </data-table>
            </div>
        </div>
    </section>

@endsection

@push('scripts')

    <script>
        let vm = new Vue({
            el: '#app',
            methods: {

                customRender: function(column, data, type, row, meta) {

                    switch(column) {
                        case 'created_at':
                        case 'updated_at':
                            return moment(data).format("DD-MM-YYYY");
                        case 'placement':
                            return '<span class="label bg-blue">' + data + '</span';
                        default:
                            toastr.warning('render for column ' + column + ' is not defined.' );
                            return data;
                    }
                }
            }
        });
    </script>

@endpush