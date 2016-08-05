<!DOCTYPE html>
<html>
<head>
    <title>{{ trans('member.register_title')}}</title>
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
    <p>{{ trans('member.register_title')}}</p>
</div>
<div class="register">
    <form id="form_register" method="post" action="/member/doregister">
    <div>
        <span class="title">{{ trans('member.register_terms_title') }}</span>
        <span class="line">
            <p>会员协议免责声明条款会员协议免责声明条款会员协议免责声明条款</p>
            <p>会员协议免责声明条款会员协议免责声明条款会员协议免责声明条款</p>
            <p>会员协议免责声明条款会员协议免责声明条款会员协议免责声明条款</p>
            <p>会员协议免责声明条款会员协议免责声明条款会员协议免责声明条款</p>
            <p>会员协议免责声明条款会员协议免责声明条款会员协议免责声明条款</p>
            <p>会员协议免责声明条款会员协议免责声明条款会员协议免责声明条款</p>
            <p>会员协议免责声明条款会员协议免责声明条款会员协议免责声明条款</p>
        </span>
    </div>
    <div>
        <input type="checkbox" name="auto_login" id="potoco_check">
        <span class="spantext">{{ trans('member.register_terms_checkbox_agree')}}</span>
    </div>
    <div>
        <a href="javascript:register();"><spane  class="btn am-clickable submit">{{ trans('member.register_button_done')}}</spane></a>
    </div>
    {{ csrf_field() }}
    </form>
</div>
</body>
</html>