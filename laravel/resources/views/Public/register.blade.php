<div class="wrap reg_ct">
<div class="login_b_i">
<div class="login_input">
<div class="login_user"><input type="text" name="user_email" placeholder="邮箱"  id="user_email"/><i></i></div>
<div class="login_password"><input type="password" name="user_pwd" placeholder="密码" id="user_pwd"/><i></i></div>
<div class="login_password"><input type="text" name="check" placeholder="邮箱验证码" id="check" /><i></i></div>
<span id="tishi" style="color: red"></span>
</div>
</div>
<input type="button" value="获取验证码" class="login_submit"  id="but">
<br>
<input type="submit" value="注册" class="login_submit" id="sub">

</div>
<script language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
   var num=60;
   $("#but").click(function () {
	   var user_email = $("#user_email").val();
	   $.ajax({
		   type: "get",
		   url: "{{('only_name')}}",
		   data: {user_email:user_email},
		   success: function(msg){
			   if(msg == 1){
				   return false;
			   }else{
				   function  fun () {
					   num=num-1;
					   $('#but').attr({"disabled":"disabled"});
					   $('#but').val(num+'秒后可操作');
					   if(num==0){
						   $('#but').val('获取验证码');
						   $('#but').removeAttr('disabled');
						   clearInterval(set);
						   num=60;
					   }
				   }
				   var set=setInterval(fun,1000);
				   $.ajax({
					   type: "get",
					   url: "{{('add')}}",
					   data: {user_email:user_email},
					   success: function(msg){
						   if(msg == 1){
							   alert("验证码已经发送，请查收");
						   }
					   }
				   });
			   }
		   }
	   });


   });
   $("#user_email").blur(function () {
	   var user_email = $("#user_email").val();
	   var re = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/;
	   if(!re.test(user_email)){
		   $("#tishi").html("邮箱格式不对");
		   return false;
	   }else{
		   $("#tishi").html("");
	   }
	   $.ajax({
		   type: "get",
		   url: "{{('only_name')}}",
		   data: {user_email:user_email},
		   success: function(msg){
			   if(msg == 1){
				   $("#tishi").html("邮箱已注册过，换一个试试？");
			   }else{
				   $("#tishi").html("");
			   }
		   }
	   });
   })
   $("#check").blur(function () {
	   var check = $("#check").val();
	   $.ajax({
		   type: "get",
		   url: "{{('check')}}",
		   data: {check:check},
		   success: function(msg){
			   if(msg == 0){
				   $("#tishi").html("验证码错误");
				   return false;
			   }else{
				   $("#tishi").html("");
			   }
		   }
	   });
   })
	$("#sub").click(function () {
		var user_email = $("#user_email").val();
		var user_pwd = $("#user_pwd").val();
		var check = $("#check").val();
		if(user_email==''){

			$("#tishi").html("邮箱不能为空");
			return false;
		}
		if(user_pwd==''){
			$("#tishi").html("请输入密码");
			return false;
		}
		if(check==''){
			$("#tishi").html("请填写验证码");
			return false;
		}
		$.ajax({
			type: "get",
			url: "{{('only_name')}}",
			data: {user_email:user_email},
			success: function(msg){
				if(msg == 1){
					return false;
				}else{
					$.ajax({
						type: "get",
						url: "{{('register_add')}}",
						data: {user_email:user_email,user_pwd:user_pwd,check:check},
						success: function(msg){
							if(msg == 1){
								alert("注册成功");location.href="";
							}else{
								$("#tishi").html("注册失败");
							}
						}
					});
				}
			}
		});

	})
</script> 
