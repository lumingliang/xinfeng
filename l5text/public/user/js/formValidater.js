/*
;(function($) {
	$.fn.validater = function() {
// 表单验证器
*/
	   var validForm = function (params) {
	       var result = true,
	           can = true,
             canSubmit = false,
             ajaxCan = false, 
	           form = params.form ,
             captcha = form.find('#captcha'),
             captchaCheck =false,
	           submitButton,
	           successIcon = ' <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>' ,
	           errorIcon = '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>' ,
	           element, //某个需要验证的元素
	           elementVal,
             elementCheck = false,
	           validTpye,
	           pwdVal,//备份密码值
	           flag = 1,
	           that,
             lvele,//密码强弱父元素
	           elementParent,
	           allInput = form.find('input'),
             total = allInput.length,//如果某一input验证成功，-1，不成功+1.
	           ajaxUrl,
             ajaxEle;//备份ajaxEle

	        that = {
	        	/*
	           addVaildListien: function() {
	           element = $(this) ;
	           // console.log(element.val());
	           form.delegate( element ,'click' , that.valid );
	           },*/

             

               valid: function() {
               
	           validType = element.attr('data-validType');
               switch(validType){
                 case "require" :{
                  // that.clear();
                   that.require();
                   break;
                 }
                 case 'email' :{
                    that.email();
                    break;
                 }
                 case 'pwd' :{
                 	 pwdVal = elementVal;//备份密码值
                   that.pwd();
                   break;
                 }
                 case 'pwd2' :{
                 	 if(that.require() )
                 	 {
                 	 	that.clear();

                 	 if(elementVal != pwdVal ) {
                 	 	that.validFalse();
                 	 	that.addAlert('两次输入的密码不一样');
                 	 	element.siblings('.alert').removeClass('hidden');
                 	 }else{
                 	 that.validSuccess();
                 	 }

                 	}

                 	 break;
                 }
                 case 'captcha' : {
                    
                      if(!captchaCheck) {
                        if(elementVal.length == 5 ) {
                          $.post(
                             element.attr('data-url'),
                            { captcha: elementVal },
                             that.captchaAjax 
                            );
                        }
                      
                    }else {

                       that.validSuccess();
                    }
                }
                 default:
                 return;


               }
	        },
	        
	        validFalse: function() {
               element.data('check',false);
	             element.after(errorIcon);
               elementParent.addClass('has-error has-feedback');
               //result = false;
	        },

	        validSuccess: function() {
             element.data('check', true);
	           element.after(successIcon);
	           elementParent.addClass('has-success has-feedback');
	           //result = true;
	        },

	        addAlert: function(string) {
	            element.after('<div class="alert alert-danger hidden" role="alert">'+string+'</div>' );
	        },

	        clear: function() {
	           elementParent.removeClass('has-success has-error').find('.glyphicon, .alert').remove();
	        },

	        require: function() {

	        	if(elementVal === '' ){
                      that.validFalse();
                      that.addAlert('不能为空');
                      return false;
                   }else{
                      that.validSuccess();
                      return true;
                   }
	        },

	        email: function() {

	        	if(!(/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/).test(elementVal) ){
                       that.validFalse();
                       that.addAlert('请输入正确的邮箱');
                       return false;
                    }else{
                       that.validSuccess();
                       return true;
                    }
	        },

	        submit: function() {
	        	//form.find('[name="email"]').trigger('keyup');
             // submitButton = $(this);
              //if(result){
                
                 allInput.each(function(){
                 //	console.log(allInput);
                // if($(this).hasClass(z))
                    $(this).trigger('keyup');
                    //console.log($(this).data('check'));
                 });
                // allInput.each.trigger('keyup');
                 

                 form.find('.alert').removeClass('hidden');
                 //form.find('.check').trigger('blur');
                 allInput.each(function(){
                    if($(this).data('check')!=1 ){
                      can = false;
                      console.log(can);
                      return can;
                    }
                 });
                 can = ajaxCan;
                 return can ;
                 //console.log('text return');
                 //return result;
                 /*
                 if(result){
                   return;
                 }else{
                   canSubmit = false;
                 }
             // }else{
                // canSubmit = false;
               //  return;
             // }*/
             // console.log(result+'i am result');
	        },

	        start: function() {
	           //$.each(allInput , function(){ that.addVaildListien(); });
	           //allInput.each(that.addVaildListien );
	           //allInput = form.find('input'); //缓存所有的表单元素
            // console.log(total);
            //绑定验证监听
	           form.delegate('input' , 'keyup click' , function() {
              console.log(2);
                 element = $(this);
                 element.data('check' , false);                
                 elementVal = element.val();
                 elementParent = element.parents('.form-group');
                 lvele=elementParent.next();
                 that.clear();
                 that.valid();
	           });//为一般表单元素绑定keyup实时验证
              // form.find('.submit').click(function(){ that.submit(); } );// 为提交元素绑定
               //that.checkbox();//实现大复选框

               //实现ajax检测值是否存在
               form.delegate('.check' , 'blur' , function() {
               	   element = $(this);
                   ajaxEle =element;
                   element.data('check' , false);
               	   elementVal = element.val();
	                 elementParent = element.parents('.form-group');
               	   ajaxUrl = element.attr('data-url');
                   that.clear();
                   console.log(1);

               	   if(  that.email() ) {
	               $.post(
                      ajaxUrl,
                      {email:elementVal},
                      that.ajaxFun
		               );
                 }

               });
              
               // 产生验证码 
               if(captcha) {

                  captcha.bind('click' , function() {
                        $url = $(this).attr('src');
                        $url = $url + 1;
                        console.log($url);
                        $(this).attr('src' , $url);
                  });
                }
              //绑定提交按钮 
              form.find('#submit').click(function() {
               var submitUrl=$(this).attr('data-submitUrl');
               console.log( $(allInput.get(0)).data('check') );


              for(var i=0; i<total; i++) {
                 
                  if($(allInput.get(i) ).data('check')!=true ) {
                 // return;
                 console.log(i );
                  canSubmit=false;
                  console.log(canSubmit);
                 return;
               }
                // }
                console.log(canSubmit+'iii');
                 canSubmit=true;
                }
                if(canSubmit){
                  $('#load').css('display' , '');

                  $.post(
                     submitUrl,
                     $('#_1').serialize(),
                     function(data) {
                  $('#load').css('display' , 'none');
                  if(data===0) {
                    $('#_1').append('<div class="alert alert-danger " role="alert">出现错误！请刷新后操作！</div>');
                  } else {
                    var str = '<div class="alert alert-success"><h1>注册成功！请到您的邮箱激活！</h1></div>';
                    $('form').empty().parent('.panel-body').append(str);
                  } 
                                  
                    
                 });
                }
              });
               
              /*
              form.submit(function(e) {
              	e.preventDefault();
              	that.submit();
              });
               /*
	           setTimeout(function() {
	           	form.find('#submit').click(function(){ that.submit(); } );
	           }, 100);*/
               
	        },
/*
	        checkbox: function() {
	        	
	        	form.find('.checkbox').toggle(
	        		function() {
	        		  //  $(this).find('.glyphicon').addClass('glyphicon-star');
	        		    console.log('i am checkbox');
	        	    },
	        	    function() {
	        	    	//$(this).find('.glyphicon').removeClass('glyphicon-star').html('&nbsp');
	        	    	console.log('i am checkbox e');
	        	    }
	        	);
                form.find('.checkbox').click(function() {
                	//$(this).find('input:checkbox').trigger('click');
                 // console.log( $(this).siblings('input:checkbox') );
                 $(this).siblings('input:checkbox').trigger('click');

                	if(flag==1) {
                		//$(this).find('.glyphicon').addClass('glyphicon-star').html('');
                		$(this).empty().append('<span class="glyphicon glyphicon-star"></span>');
                		flag = 0;

                		//console.log(flag);
                	} else {
                		//$(this).find('.glyphicon').removeClass('glyphicon-star').html('&nbsp');
                		$(this).empty().html('&nbsp&nbsp&nbsp');
                		flag=1;
                		//console.log(flag);
                	}
                });
	        },*/



          option: function( options) {
            ajaxCan = options.ajaxCan
          },
          form: function() {
            return form;
          },

          ajaxFun: function(data) {
                         
                         console.log(3);
                         element = ajaxEle;
                         elementParent = element.parents('.form-group');
                         that.clear();
                         if(data==1) {

                          that.validFalse();
                          that.addAlert('已经存在，请用其他值');
                          elementParent.find('.alert').removeClass('hidden');
                         } else {
                         
                          that.validSuccess();
                          //ajaxCan = true;
                          that.addAlert('可以使用');
                          elementParent.find('.alert').removeClass('hidden');
                         }
                      },

          captchaAjax: function(data) {
               that.clear();
               if(data==1) {
                  that.validSuccess();
                  captcha.unbind('click');
                  captchaCheck=true;//验证成功后不再提交
                  element.attr('disabled' , true);//成功后禁用该元素
               } else {
                that.validFalse();
                that.addAlert('验证码错误');
                //elementParent.find('.alert').removeClass('hidden');
               }

          },

          pwd: function() {
              
              //console.log(lvele);
              lvele.removeClass('hidden');
              if(elementVal.length<6 ) {
                that.pwdLvreset();
                return;
              }
              that.validSuccess(); 
              var lv = -1;//密码强度水平
              if (elementVal.match(/[a-z]/ig)){lv++;}  
              if (elementVal.match(/[0-9]/ig)){lv++;}  
              if (elementVal.match(/(.[^a-z0-9])/ig)){lv++;}  
              if (elementVal.length < 6 && lv > 0){lv--;}
              switch(lv) {   
                  case 0:  
                  that.level0();  
                  break;  
                  case 1:  
                  that.level1();  
                  break;  
                  case 2:  
                  that.level2();  
                  break;  
                  default:  
                  that.pwdLvreset(); 
                }
          } ,

          pwdLvreset: function() {
              lvele.find('.progress-bar').addClass('progress-bar-danger').css('width','30%');
              that.validFalse();
              that.addAlert('不能少于6个字符');
              elementParent.find('.alert').removeClass('hidden');
          },
          level0: function() {
              lvele.find('.progress-bar').removeClass('progress-bar-danger').css('width','30%');
          },
          level1:function() {
            lvele.find('.progress-bar').removeClass('progress-bar-danger').css('width','60%');
          },
          level2:function() {
            lvele.find('.progress-bar').removeClass('progress-bar-danger').css('width','90%');
          },
          wating: function() {
            $('#load').css('display' , '');
          }
        

	   } //end that

	     


	        return that;
         var ajaxFun=params.ajaxFun||that.ajaxFun(),// ajax处理回调函数
             submitFun=params.submitFun||that.submitFun(),
             captchaAjax=params.captchaAjax||that.captchaAjax();

	   }; //end formvalidater

//	option = $.extend({},$.fn.validater.defaults,option );
/*
	return $(this).each(function(){
		var $form = $(this);
		//console.log($form);
		 valid = validForm({ form:$form });
    valid.start();
	});
*/
/*
	$.fn.validateter.defaults = {
           
	};*/
/*
  };
})(jQuery);
*/
/*
$('form #submit').click(function(){

	$.post("{{ url('/auth/register') }}", $(".form").serialize());
});

$('form ')
如果可以提交，则发送ajax请求到服务器，并对返回数据进行处理。
1,检验数据是否正确
2.检验数据是否在服务器存在
3，把数据发送到服务器并更新文档
4，把数据发送到服务器，服务器跳转。

if(result) {
	$.post(
       url,
       form.serialize(),
       function(data) {
          k 
       },

		);
}*/