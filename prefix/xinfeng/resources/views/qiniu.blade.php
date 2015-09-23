<form method="post" action="http://upload.qiniu.com/"
 enctype="multipart/form-data">
  

  <input name="token" type="hidden" value="{{ $token }}">
  <input name="file" type="file" />
  <input name="key" type="hidden" value="fon.jpg">
  <input type="submit" />
</form>