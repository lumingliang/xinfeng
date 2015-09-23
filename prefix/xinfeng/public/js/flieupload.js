//定义hidde变量




//定义全局变量



//禁止浏览器监听
$(function() {
    //阻止浏览器默认行。 
    $(document).on({
        dragleave: function(e) { //拖离 
            e.preventDefault();
        },
        drop: function(e) { //拖后放 
            e.preventDefault();
        },
        dragenter: function(e) { //拖进 
            e.preventDefault();
        },
        dragover: function(e) { //拖来拖去 
            e.preventDefault();
        }
    });

    $('#ff').click(function() {
        $('#file_1').trigger('click');
    });

});

$('#DropZone').delegate('a', 'click', function() {
    //alert('i am click!');

    var xhr = new XMLHttpRequest();

    //xhr.upload.addEventListener("progress", uploadProgress, false);
    xhr.open("post", "ll", true);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    console.log($('meta[name="csrf-token"]').attr('content'));
    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
    xhr.onreadystatechange = function() {

        if (xhr.readyState == 4 && xhr.status == 200) {
            var re = xhr.responseText;
            alert(re);
        }
    };

    var fd = new FormData();
    fd.append('key', $(this).data('key'));
    var _token = $('#hide').val();
    // fd.append( '_token' , _token);

    xhr.send(fd);
});


//创建元素监听

//$('#DropZone').bind( 'drop' , fileDrop(event) );
var box = document.getElementById('DropZone');
box.addEventListener("drop", fileDrop, false);

function fileDrop(e) {
    j = 0;
    flag = false;
    files = null;
    delete files;
    console.log('delete files!');

    e.preventDefault();
    e.stopPropagation();
    var files = e.dataTransfer.files;
    console.log('i am here!');
    console.log(flag);
    //$('#DropZone').children('.row').append('hhhhhhhhhhhhhhhh');
    previewAll(files);

    if (flag == true) {
        sendfiles(files);
    }
}


$('#file_1').change(function() {
    j = 0;
    flag = false;
    files = null;
    delete files;
    console.log('delete files!');
    //$('.panel-heading').empty();





    var files = this.files;

    //console.log( files.length);

    previewAll(files);

    if (flag == true) {
        sendfiles(files);
    }
});

var j = 0; //全局变量j
var flag = false;
var p = 0;

function sendfiles(files) {


    var file = files[j];
    //console.log(file);

    sendto(file);
    /*
        if(j=files.length){
          console.log('all files had send!!')
          files='';
          console.log(files+'ll');

        }*/





    function sendto(file) {

        var xhr = new XMLHttpRequest();

        xhr.upload.addEventListener("progress", uploadProgress, false);
        xhr.open("post", "http://upload.qiniu.com/", true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");



        xhr.onreadystatechange = function() {

            if (xhr.readyState == 4 && xhr.status == 200) {

                //var html='<span >'+(j)+'张图片已经上传！ </span>' ;

                //value=xhr.responseText;

                //$('.panel-heading').append(html);
                var re = xhr.responseText;

                var obj = eval("(" + re + ")");
                //console.log(obj.key);
                $('#DropZone').find('a').eq(j).data('key', obj.key);
                p = p + 1;
                j = j + 1;


                if (j < files.length) {
                    console.log(files.length);


                    sendfiles(files);

                }
            }
        }

        var fd = new FormData();
        fd.append('file', file);
        //console.log(file);

        var _token = $('#hide').val();
        var token = $('#token').val();
        //console.log(token);
        fd.append('_token', _token);
        fd.append('token', token);
        xhr.send(fd);
    }

}

function uploadProgress(evt) {
    if (evt.lengthComputable) {
        var per = Math.round(evt.loaded * 100 / evt.total); //上传字节数的百分比
        per = per + '%';
        console.log(per);
        //console.log(j);
        $('.progress-bar').eq(p).html(per).css('width', per);
        console.log(p + 'p');

    }
}




function previewAll(files) {
    var is = true;
    if (files.length > 4) {



        alert('文件数不能大于4个');
        return false;


    }
    if (p > 3) {
        alert('文件数不能大于4个');
        return false;
    }

    for (var i = 0; i < files.length; i++) //判断类型并前台显示
    {

        var error = '';
        var file = files[i];
        // console.log(file);
        if (!/image\/\w+/.test(file.type)) {
            error = '第' + (i + 1) + '个文件不是图片！';
            is = false;
            alert(error);
        }
        if (file.size > 1024 * 1000) {
            error += '第' + (i + 1) + '个文件超过大小限制\n';
            is = false;
            alert(error);
        }


        //if(!/image/i.test(files[i].type))error+='第'+(i+1)+'个文件不是图片格式\n';  


    }

    if (is) {
        flag = true;
        for (var i = 0; i < files.length; i++) //判断类型并前台显示
        {
            var file = files[i];

            viewg(file);
        }
    }




}

function viewg(file) {
    // console.log(file);
    var fr = new FileReader;
    fr.onloadend = function() {


        console.log('jjjj');
        var html = ' <div class="col-sm-6 col-md-4"><div class="thumbnail"><img src=" ';
        html += fr.result;
        html += ' " alt=""><div class="progress" ><div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;"></div></div><p><a class="btn btn-primary" role="button">删除</a></div></div> ';


        $('#DropZone').children('.row').append(html);
      <div class="panel panel-default">
      <div class="panel panel-default">
      <div class="panel panel-default">
    }; //在readAsDataURl后调用


    fr.readAsDataURL(file); //必须先注册onloadend(),然后result中存的是一个data：可以用来显示,上传图片  
    //  console.log(fr.result);     
}















//预览函数


function preview(files) {

    if (files.length > 3) {
        alert('文件数不能大于4个');
        return false;
    }
    for (var i = 0; i < files.length; i++) //判断类型并前台显示
    {
        var file = files[i];
        // console.log(file);
        if (!/image\/\w+/.test(file.type)) {
            alert("请确保文件为图像类型");
            return false;
        }

        view(file);
    }
}



function view(file) {

    var fr = new FileReader;
    fr.onloadend = function() {
        var html = "<img src=' " + fr.result + "' alt='' title=''  />";

        $('body').append(html);

    }; //在readAsDataURl后调用


    fr.readAsDataURL(file); //必须先注册onloadend(),然后result中存的是一个data：可以用来显示,上传图片  
    // console.log(fr.result);     
}
