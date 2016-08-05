<!DOCTYPE html>
<html>
<head>
    <title>{{ trans('member.signin_titile')}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link href="{{ asset('css/base.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{ asset('js/man.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/calendar.js') }}"></script>
</head>

<body>
<div class="am-header">
    <p>{{ trans('member.signin_titile')}}</p>
</div>
<form id="form" class="loginin" method="post" action="/member/dosignin">
    <div>
        <span class="important"><label>{{ trans('member.signin_form_label_usr')}}</label></span>
                <span class="tag am-clickable">
                <input type="text" placeholder="{{ trans('member.signin_form_placeholder_usr')}}" name="username" id="username" maxlength="11"/>
                </span>
    </div>
    <div>
        <span class="important"><label>{{ trans('member.signin_form_label_pwd')}}</label></span>
                <span class="tag">
                <input placeholder="{{ trans('member.signin_form_placeholder_pwd')}}" name="password" id="password" type="password" maxlength="20"/>
                <span class="btn am-clickable slidePassword"><span class="icon" id="ribit" onclick="javascript:ribit();">
                </span></span></span>
    </div>
    <div><input type="checkbox" name="auto_login" id="potoco_check">
        <span class="spantext">{{ trans('member.signin_form_rememberme30days')}}</span>
    </div>
    <span>
        @if (isset($code) && $code === 0)
            {{ trans('member.signin_form_button_gotoregister') }}
        @endif
    </span>
    <div>
        <spane  class="btn am-clickable submit" onclick="javascript:login();">{{ trans('member.signin_form_button_login')}}</spane>
    </div>
    <div>
        <a href="/member/register"><spane  class="btn am-clickable submit">{{ trans('member.signin_form_button_gotoregister')}}</spane></a>
    </div>

    <div>
        <span class="title">{{trans('member.signin_info')}}
        </span>
    </div>
    {{ csrf_field() }}
</form>
</body>
</html>