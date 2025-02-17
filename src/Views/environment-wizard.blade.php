@extends('installer::layouts.master')

@section('template_title')
    {{ trans('installer_messages.environment.wizard.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-magic fa-fw" aria-hidden="true"></i>
    {!! trans('installer_messages.environment.title') !!}
@endsection

@section('container')
    <div class="tabs tabs-full">

        <input id="tab1" type="radio" name="tabs" class="tab-input" checked />
        <label for="tab1" class="tab-label">
            <i class="fa fa-cog fa-2x fa-fw" aria-hidden="true"></i>
            <br />
            {{ trans('installer_messages.environment.wizard.tabs.environment') }}
        </label>

        <input id="tab2" type="radio" name="tabs" class="tab-input" />
        <label for="tab2" class="tab-label">
            <i class="fa fa-database fa-2x fa-fw" aria-hidden="true"></i>
            <br />
            {{ trans('installer_messages.environment.wizard.tabs.database') }}
        </label>

        <form method="post" action="{{ route('LaravelInstaller::environmentSaveWizard') }}" class="tabs-wrap">
            <div class="tab" id="tab1content">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group {{ $errors->has('app_name') ? ' has-error ' : '' }}">
                    <label for="app_name">
                        {{ trans('installer_messages.environment.wizard.form.app_name_label') }}
                    </label>
                    <input type="text" name="app_name" id="app_name"
                           value="{{ old('app_name') ?? $envConfig->get('APP_NAME') }}"
                           placeholder="{{ trans('installer_messages.environment.wizard.form.app_name_placeholder') }}"
                    />
                    @if ($errors->has('app_name'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_name') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('app_url') ? ' has-error ' : '' }}">
                    <label for="app_url">
                        {{ trans('installer_messages.environment.wizard.form.app_url_label') }}
                    </label>
                    <input type="url" name="app_url" id="app_url"
                           value="{{ old('app_url') ?? $appUrl}}"
                           placeholder="{{ trans('installer_messages.environment.wizard.form.app_url_placeholder') }}"
                    />
                    @if ($errors->has('app_url'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_url') }}
                        </span>
                    @endif
                </div>

                <div>
                    <button type="button" class="collapsible">Дополнительные настройки</button>
                    <div class="collapse_block">
                        <div class="form-group {{ $errors->has('environment') ? ' has-error ' : '' }}">
                            <label for="environment">
                                {{ trans('installer_messages.environment.wizard.form.app_environment_label') }}
                            </label>
                            <select name="environment" id="environment">
                                <option value="local"
                                        @if(old('environment') == 'local' || $envConfig->get('APP_ENV') == 'local') selected @endif>
                                {{ trans('installer_messages.environment.wizard.form.app_environment_label_local') }}
                                </option>

                                <option value="development"
                                        @if(old('environment') == 'development' || $envConfig->get('APP_ENV') == 'development') selected @endif>
                                {{ trans('installer_messages.environment.wizard.form.app_environment_label_developement') }}
                                </option>

                                <option value="production"
                                        @if(old('environment') == 'production' || $envConfig->get('APP_ENV') == 'production') selected @endif>
                                {{ trans('installer_messages.environment.wizard.form.app_environment_label_production') }}
                                </option>
                            </select>

                            @if ($errors->has('app_name'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('app_name') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('app_debug') ? ' has-error ' : '' }}">
                            <label for="app_debug">
                                {{ trans('installer_messages.environment.wizard.form.app_debug_label') }}
                            </label>
                            <label for="app_debug_true">
                                <input type="radio" name="app_debug" id="app_debug_true" value=true checked />
                                {{ trans('installer_messages.environment.wizard.form.app_debug_label_true') }}
                            </label>
                            <label for="app_debug_false">
                                <input type="radio" name="app_debug" id="app_debug_false" value=false />
                                {{ trans('installer_messages.environment.wizard.form.app_debug_label_false') }}
                            </label>
                            @if ($errors->has('app_debug'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('app_debug') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('app_log_level') ? ' has-error ' : '' }}">
                            <label for="app_log_level">
                                {{ trans('installer_messages.environment.wizard.form.app_log_level_label') }}
                            </label>
                            <select name="app_log_level" id="app_log_level">
                                <option value="debug"
                                        @if(old('app_log_level') == 'debug' || $envConfig->get('LOG_LEVEL') == 'debug') selected @endif>
                                {{ trans('installer_messages.environment.wizard.form.app_log_level_label_debug') }}
                                </option>

                                <option value="info"
                                        @if(old('app_log_level') == 'info' || $envConfig->get('LOG_LEVEL') == 'info') selected @endif>
                                {{ trans('installer_messages.environment.wizard.form.app_log_level_label_info') }}
                                </option>

                                <option value="notice"
                                        @if(old('app_log_level') == 'notice' || $envConfig->get('LOG_LEVEL') == 'notice') selected @endif>
                                {{ trans('installer_messages.environment.wizard.form.app_log_level_label_notice') }}
                                </option>

                                <option value="warning"
                                        @if(old('app_log_level') == 'warning' || $envConfig->get('LOG_LEVEL') == 'warning') selected @endif>
                                {{ trans('installer_messages.environment.wizard.form.app_log_level_label_warning') }}
                                </option>

                                <option value="error"
                                        @if(old('app_log_level') == 'error' || $envConfig->get('LOG_LEVEL') == 'error') selected @endif>
                                {{ trans('installer_messages.environment.wizard.form.app_log_level_label_error') }}
                                </option>

                                <option value="critical"
                                        @if(old('app_log_level') == 'critical' || $envConfig->get('LOG_LEVEL') == 'critical') selected @endif>
                                {{ trans('installer_messages.environment.wizard.form.app_log_level_label_critical') }}
                                </option>

                                <option value="alert"
                                        @if(old('app_log_level') == 'alert' || $envConfig->get('LOG_LEVEL') == 'alert') selected @endif>
                                {{ trans('installer_messages.environment.wizard.form.app_log_level_label_alert') }}
                                </option>

                                <option value="emergency"
                                        @if(old('app_log_level') == 'emergency' || $envConfig->get('LOG_LEVEL') == 'emergency') selected @endif>
                                {{ trans('installer_messages.environment.wizard.form.app_log_level_label_emergency') }}
                                </option>
                            </select>
                            @if ($errors->has('app_log_level'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('app_log_level') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="buttons">
                    <button class="button" onclick="showDatabaseSettings();return false">
                        {{ trans('installer_messages.environment.wizard.form.buttons.setup_database') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="tab" id="tab2content">

                <div class="form-group {{ $errors->has('database_hostname') ? ' has-error ' : '' }}">
                    <label for="database_hostname">
                        {{ trans('installer_messages.environment.wizard.form.db_host_label') }}
                    </label>
                    <input type="text" name="database_hostname" id="database_hostname"
                           value="{{ old('database_hostname') ?? $envConfig->get('DB_HOST') }}"
                           placeholder="{{ trans('installer_messages.environment.wizard.form.db_host_placeholder') }}"
                    />
                    @if ($errors->has('database_hostname'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_hostname') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_port') ? ' has-error ' : '' }}">
                    <label for="database_port">
                        {{ trans('installer_messages.environment.wizard.form.db_port_label') }}
                    </label>
                    <input type="number" name="database_port" id="database_port"
                           value="{{ old('database_port') ?? $envConfig->get('DB_PORT') }}"
                           placeholder="{{ trans('installer_messages.environment.wizard.form.db_port_placeholder') }}"
                    />
                    @if ($errors->has('database_port'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_port') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_name') ? ' has-error ' : '' }}">
                    <label for="database_name">
                        {{ trans('installer_messages.environment.wizard.form.db_name_label') }}
                    </label>
                    <input type="text" name="database_name" id="database_name"
                           value="{{ old('database_name') ?? $envConfig->get('DB_DATABASE') }}"
                           placeholder="{{ trans('installer_messages.environment.wizard.form.db_name_placeholder') }}"
                    />
                    @if ($errors->has('database_name'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_name') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_username') ? ' has-error ' : '' }}">
                    <label for="database_username">
                        {{ trans('installer_messages.environment.wizard.form.db_username_label') }}
                    </label>
                    <input type="text" name="database_username" id="database_username"
                           value="{{ old('database_username') ?? $envConfig->get('DB_USERNAME')}}"
                           placeholder="{{ trans('installer_messages.environment.wizard.form.db_username_placeholder') }}" />
                    @if ($errors->has('database_username'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_username') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_password') ? ' has-error ' : '' }}">
                    <label for="database_password">
                        {{ trans('installer_messages.environment.wizard.form.db_password_label') }}
                    </label>
                    <input type="password" name="database_password" id="database_password" value="" placeholder="{{ trans('installer_messages.environment.wizard.form.db_password_placeholder') }}" />
                    @if ($errors->has('database_password'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_password') }}
                        </span>
                    @endif
                </div>

                <div class="buttons">
                  <button class="button" type="submit">
                    {{ trans('installer_messages.environment.wizard.next') }}
                    <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                  </button>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function showDatabaseSettings() {
            var tab2 = document.getElementById('tab2');
            if (tab2) {
                tab2.checked = true;
            }
        }

        var coll = document.getElementsByClassName('collapsible');
        
        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight){
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }
    </script>
@endsection
