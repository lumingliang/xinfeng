<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>GetUserMedia实例</title>
</head>
<body>
    <video id="video" autoplay></video>
</body>


<script type="text/javascript">
    var getUserMedia = (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia);

   /* getUserMedia.call(navigator, {
        video: true,
        audio: true
    }, function(localMediaStream) {
        var video = document.getElementById('video');
        video.src = window.URL.createObjectURL(localMediaStream);
        video.onloadedmetadata = function(e) {
            console.log("Label: " + localMediaStream.label);
            console.log("AudioTracks" , localMediaStream.getAudioTracks());
            console.log("VideoTracks" , localMediaStream.getVideoTracks());
        };
    }, function(e) {
        console.log('Reeeejected!', e);
    });*/
    getUserMedia.call(navigator,{audio:true},onSuccess,function(e){
        console.log('something is bug');
    });



    function onSuccess(stream) {

    //创建一个音频环境对像
    audioContext = window.AudioContext || window.webkitAudioContext;
    context = new audioContext();

    //将声音输入这个对像
    audioInput = context.createMediaStreamSources(stream);
    
    //设置音量节点
    volume = context.createGain();
    audioInput.connect(volume);

    //创建缓存，用来缓存声音
    var bufferSize = 2048;

    // 创建声音的缓存节点，createJavaScriptNode方法的
    // 第二个和第三个参数指的是输入和输出都是双声道。
    recorder = context.createJavaScriptNode(bufferSize, 2, 2);

    // 录音过程的回调函数，基本上是将左右两声道的声音
    // 分别放入缓存。
    recorder.onaudioprocess = function(e){
        console.log('recording');
        var left = e.inputBuffer.getChannelData(0);
        var right = e.inputBuffer.getChannelData(1);
        // we clone the samples
        leftchannel.push(new Float32Array(left));
        rightchannel.push(new Float32Array(right));
        recordingLength += bufferSize;
    }

    // 将音量节点连上缓存节点，换言之，音量节点是输入
    // 和输出的中间环节。
    volume.connect(recorder);

    // 将缓存节点连上输出的目的地，可以是扩音器，也可以
    // 是音频文件。
    recorder.connect(context.destination); 

}
</script>


</html>
