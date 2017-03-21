@extends('layouts.app')

@section('pageTitle', __("Tutorials"))

@section('content')

<section class="content-header">
    <a class="btn btn-primary" href="/system/tutorials/create">
        {{ __("Create Tutorial") }}
    </a>
    @include('partials.breadcrumbs')
</section>
<section class="content">
    <div class="row" v-cloak>
        <div class="col-md-12">
            <data-table source="/system/tutorials">
                <span slot="data-table-title">{{ __("Tutorials") }}</span>
                @include('partials.modal')
            </data-table>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('/js/system/index.js') }}"></script>
@endpush