<!DOCTYPE html>
<html>
<head>
    <title>{{ trans('member.bind_title')}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link href="{{ asset('css/base.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{ asset('js/man.js') }}"></script>
</head>

<body>
<div class="am-header">
    <div class="btn left am-clickable am-backbutton" onclick="javascript:history.go(-1);"></div>
    <p>{{ trans('member.bind_title')}}</p>
</div>
<div class="register">
    <div>
        <span class="line">
            <p>{{ trans('member.bind_info') }}</p>
        </span>
    </div>
    <div>
        <form id="form_bind" method="post" action="/member/dobind">

            @if(isset($username))
                <input type="hidden" name="username" value="{{ $username }}">
            @endif

            <a href="javascript:document.getElementById('form_bind').submit();"><spane  class="btn am-clickable submit">{{ trans('member.bind_button_dobind')}}</spane></a>
            {{ csrf_field() }}
        </form>
    </div>
</div>
</body>
</html>