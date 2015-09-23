
<!DOCTYPE html>
<html>
<head>
    <title>my filereader text</title>
   <meta charset="utf-8" /> 
   <script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>


<script type="text/javascript">  
        function showPreview(source) { 
        console.log(this); 
            var file = source.files[0];  
            if(window.FileReader) {  
                var fr = new FileReader();  
                fr.onloadend = function(e) {  
                    document.getElementById("portrait").src = e.target.result;  
                };  
                fr.readAsDataURL(file);  
            }  
        }  
    </script>
<style type="text/css">
    .drop{
        width: 400px;
        height: 400px;
        border: 1px solid red;
        border-radius: 11px 20px;
        box-shadow: 5px 10px 10px black;
    }
</style>




</head>
<body   ondragstart ="return false" oncontextmenu="return false">
  
   <!--<input type="file" name="file" onchange="showPreview(this)" /> 
   <img id="portrait" src="" width="70" height="75">  -->
   <input type='file' name='file[]' id='file_1' onchange='get(this)' class="" multiple />
    <input id="hide" type="hidden" name="_token" value="{{ csrf_token() }}">
   <div id='DropZone' class="drop">
   </div>
   <hr />
   <img src='' id='m' title="" width="300px"  height=auto />


   <script >

//禁止浏览器监听
$(function(){ 
    //阻止浏览器默认行。 
    $(document).on({ 
        dragleave:function(e){    //拖离 
            e.preventDefault(); 
        }, 
        drop:function(e){  //拖后放 
            e.preventDefault(); 
        }, 
        dragenter:function(e){    //拖进 
            e.preventDefault(); 
        }, 
        dragover:function(e){    //拖来拖去 
            e.preventDefault(); 
        } 
    }); 

}); 



    function get(souce) {

    //console.log(this);
   // console.log(souce);
    //var f= $('#file_1');
   // console.log(f);
    //var files=souce.files;
    var files=document.getElementById('file_1').files;  //这样就可以取得文件列表，与jquery的不一样

   // console.log(files[1]);//所取得文件的实例，包括了一些文件的相关信息,此对象继承于blob，包括了文件的大小，类型，等信息
    console.log('我');
    //var out=[];//创建一个输出的数组
    for(var i=0,file ; file=files[i] ; i++)
    {
        if(!/image\/\w+/.test(file.type)) {  
          alert("请确保文件为图像类型");  
          return false;  
        }  
        if(window.FileReader) {
            var fr = new FileReader;
           fr.onloadend = function() {
               document.getElementById("m").src=fr.result;
              // console.log(fr.result);

           };//在readAsDataURl后调用
            fr.readAsDataURL(file);//必须先注册onloadend(),然后result中存的是一个data：可以用来显示,上传图片

        
        }

       
    }
            xhr = new XMLHttpRequest();
            xhr.open("post", "file", true);
            xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            
            var fd = new FormData();
            fd.append('ff', files[0]);
            //fd.append( 'fff' , files[1]);

           // var value=$('#hide').val();
           // console.log(value);
        fd.append( '_token' , value);
        xhr.send(fd);
}


//---------------
function fileDrop(e) {  
    e = e || window.event;  
       
    e.stopPropagation(); // 阻止冒泡  
    e.preventDefault();  //阻止默认行为  
       
    var files = e.dataTransfer.files;   //FileList  
    console.log(files[0]);
       
    var output = [];  
       
    for(var i = 0, f; f = files[i]; i++) {  
        output.push('<li><strong>' + f.name + '</strong>(' + f.type + ') - ' + f.size +' bytes</li>');  
    }  
       
    document.getElementById('m').innerHTML = '<ul>' + output.join('') + '</ul>';  
};  
   
function dragOver(e) {  
    e = e || window.event;  
       
    e.stopPropagation();  
    e.preventDefault();  
    e.dataTransfer.dropEffect = 'copy'; //指定拖放视觉效果  
}; 

var d = document.getElementById('DropZone');  
   
try {  
    d.addEventListener('dragover', dragOver, false);  
    d.addEventListener('drop', fileDrop, false)  
} catch(ex) {  
    document.write('something must be wrong!');  
}  


 </script>





</body>
</html>