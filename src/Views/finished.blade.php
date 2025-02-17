@extends('installer::layouts.master')

@section('template_title')
    {{ trans('installer_messages.final.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-flag-checkered fa-fw" aria-hidden="true"></i>
    {{ trans('installer_messages.final.title') }}
@endsection

@section('container')

    <p><strong>{{ trans('installer_messages.final.finished') }}</strong></p>

	<div class="final_log">
        <p class="p_log">{{ trans('installer_messages.final.log') }}</p>
        <div>
            <code class="code_log">{{ $finalStatusMessage }}</code>
        </div>
    </div>

    <div class="buttons">
        <a href="{{ url('/') }}" class="button">{{ trans('installer_messages.final.exit') }}</a>
    </div>

@endsection
