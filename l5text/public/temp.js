//$('#_1').validater();
	    //console.log($('#con').offset());
	    //console.log(valid.successIcon);
	    /*
	    valid.form().find('.submit').click(function(){ 
	    	var result = valid.submit();
	    	console.log(result+'all');
	    	if(result ) {
	    		console.log(' i can submit');
	    		var scroll = scroller({ 'target':$('#con'),'scr':$('#progress') });
	            scroll.start();
	            
	            $.post(
	            	'{{url('user/register')}}' ,
	            	$('#_1').serialize(),
	            	function(data) {
	            		scroll.close();
	            		if(data===0) {
	            			$('#_1').append('<div class="alert alert-danger " role="alert">出现错误！请刷新后操作！</div>');
	            		} else {
	            			var str = '<div class="alert alert-success"><h1>注册成功！请到您的邮箱激活！</h1></div>';
	            			$('form').empty().parent('.panel-body').append(str);
	            		}
	            	});
	    	} 
	
	            //scroll.close();
        });
	});
	*/
	/*
	$(document).bind('scroll' , function(){
		console.log('ssss');
	} );*/

//$(document).ready(function(){
	//var width = $('.float').parents('.float-parent').width();
	//console.log(width);
	//console.log(width);

	//var t = $('.row')[0];
	//console.log(t.style.top );
	//console.log($('.row')[1]);

	/*
	var $obj = $('.panel-body'),
        wid = $obj.width(),
        hei = $obj.height();
        console.log(hei);*/
	  //  objStyle = $obj[0].style;
	    //width = objStyle.width,
	    //height = objStyle.height;

	  //  console.log(wid+','+hei);
	   // console.log(height+','+width);
	  //  objStyle.position = "relative";
	  //  console.log($('.pro'));
/*
	    $('.pro').removeClass('hidden').css(
	    {
	    	"width":wid/2+"px",
	    	"height":hei/2+"px",
	    	"position":"absolute",
	    	"top":hei/2+"px",
	    	"left":wid/4+"px",
	    	"display":"block",
	    	"z-index":10,
	    	"opacity":1
	    }).clone().prependTo($obj);
*/
	    /*
	    $obj.append(hh).find('.progress').css(
	    {
	    	"width":width,
	    	"height":height,
	    	"position":absolute,
	    	"top":0;
	    	"left":0
	    });*/
	    

	//$('form').find('input').each(valid);
	/*
	function valid(){
	    errorIcon = '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>' ,

		$('form').delegate('input' , 'keyup' ,function(){
		   var ele = $(this);
           eleParent = ele.parents('.form-group');
            var jj = eleParent.removeClass('has-error has-feedback').find('.alert , .glyphicon');
                        jj.remove();
            console.log(jj);

           //eleParent.find('.glyphicon').remove();
           val = ele.val();
           //console.log(val);
           validType = ele.attr('validType');
           if(val === ''){
           	ele.after(errorIcon);
           	//console.log(eleParent.find('.col-md-6') );
            eleParent.addClass('has-error has-feedback');
           	ele.after('<div class="alert alert-danger hidden" role="alert">错误</div>' );
           }
		});
	}
	valid();
	/*

	var text = function(params) {
        var ff = 'i am a text',
        that ;
        that = {
        	jj: function() {
        		console.log('i am the func');
        		console.log(ff);
        	},

        	pp:function() {
        		//that.jj;
        		that.jj();
        	}

        };

        return that;

	};

	var textpro = function(name) {
		var that = text();
		console.log(that);
		that.actio = function() {
			return 'i mmm'+name;
		};
		return that;
	};
	//var hhh = text().pp() ;
	var kk = textpro('ming').actio();
	console.log(kk);
	//kk.actio();*/

	/*
          submit: function() {
            //form.find('[name="email"]').trigger('keyup');
             // submitButton = $(this);
              //if(result){
                
                 allInput.each(function(){
                 // console.log(allInput);
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
                      //console.log(can);
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
         // },