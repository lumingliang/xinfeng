function uploadFun() {
var j = 0;
function fun() {
if (uploadImgArr.length > 0 && !isUpload) {
var singleImg = uploadImgArr[j];
var xhr = new XMLHttpRequest();
if (xhr.upload) {
//进度条(见http://www.css119.com/archives/1476)
xhr.upload.addEventListener("progress",
function(e) {
if (e.lengthComputable) {
progress.value = (e.loaded / e.total) * 100;
percent.innerHTML = Math.round(e.loaded * 100 / e.total) + "%";
//计算网速
var nowDate = new Date().getTime();
var x = (e.loaded) / 1024;
var y = (nowDate - startDate) / 1000;
uploadSpeed.innerHTML = "网速：" +(x / y).toFixed(2) + " K/S";
} else {
percent.innerHTML = "无法计算文件大小";
}
},
false);
// 文件上传成功或是失败
xhr.onreadystatechange = function(e) {
if (xhr.readyState == 4) {
if (xhr.status == 200 && eval("(" + xhr.responseText + ")").status == true) {
info.innerHTML += singleImg.name + "上传完成; ";
//因为progress事件是按一定时间段返回数据的，所以单独progress不可能100%的，在这设置传完后强制设置100%
progress.value = 100;
percent.innerHTML = "100%";
isUpload = true;
} else {
info.innerHTML += singleImg.name + "上传失败; ";
}
//上传成功（或者失败）一张后，再次调用fun函数，模拟循环
if (j < uploadImgArr.length - 1) {
j++;
isUpload = false;
fun();
}
}
};
var formdata = new FormData();
formdata.append("FileData", singleImg);
// 开始上传
xhr.open("POST", "upload.php", true);
xhr.send(formdata);
var startDate = new Date().getTime();
}
}
}
fun();
}