<html>
<head>

</head>
<body>

<div id="example"></div>

<script type="text/javascript">
document.getElementById("example").innerHTML=
  "<p>Browser CodeName: " + navigator.appCodeName + "</p>"
+ "<p>Browser Name: " + navigator.appName + "</p>"
+ "<p>Browser Version: " + navigator.appVersion + "</p>"
+ "<p>Cookies Enabled: " + navigator.cookieEnabled + "</p>"
+ "<p>Platform: " + navigator.platform + "</p>"
+ "<p>User-agent header: " + navigator.userAgent + "</p>";
</script>

</body>
</html>