<!DOCTYPE html>
<html style="background:#000">
<head>
<title>Page Title</title>
</head>
<body>

<h1 style="color: #fff">Bạn phải sử dụng trình duyệt <span style="color: red">Chrome</span> hoặc <span style="color: red">Safari</span></h1>

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bowser@2.9.0/es5.js"></script>
<script>
// (B) DETECT BROWSER
// https://github.com/lancedikson/bowser 
// https://www.jsdelivr.com/package/npm/bowser
window.addEventListener("load", function() {
  // (B1) PARSE USER AGENT
  var result = bowser.getParser(navigator.userAgent).getResult();
 
  // (B2) BROWSER INFO
  alert(result.browser.name);
  alert(result.browser.version);
  alert(result.engine.name);



  // (B3) OPERATING SYSTEM
  alert(result.os.name);
  alert(result.os.version);
  alert(result.os.versionName);
 
  // (B4) PLATFORM
  console.log(result.platform.type);
});
</script>