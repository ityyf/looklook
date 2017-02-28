
<form method="post" action="{{('login')}}">
    <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">
<div class="login_b_i">
<div class="login_input">
<div class="login_user"><input type="text" name="user_email" placeholder="邮箱/帐号" /><i></i></div>
<div class="login_password"><input type="password" name="user_pwd" placeholder="密码" /><i></i></div>
</div>
</div>
<input type="submit" value="登录" class="login_submit">
</form>