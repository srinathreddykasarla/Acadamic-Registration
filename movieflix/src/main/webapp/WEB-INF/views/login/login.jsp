<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@taglib uri="http://www.springframework.org/tags" prefix="s"%>
<!DOCTYPE html>
<html>
<head>
	<title>Movieflix</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="content-language" content="en" />
	<link rel="icon" type="image/png" href="<c:url value="resources/icon.png"/>" sizes="16x16">
	<title>Sign In</title>
	<link rel="stylesheet" href="<c:url value="resources/signin/style.css" />">
</head>
<body>
	<div class = "h1">
	<a href="/movieflix" class="icon-logoUpdate nfLogo signupBasicHeader" >
	<span class="screen-reader-text">MOVIEFLIX</span></a>
	</div>
	<div><section class="loginform cf" >
	<form name="login" action="login" method="post">
		<table>
		<tr>
		<td colspan="2" align="left"><div><h2 class="title">Sign In</h2></div></td></tr>
			<tr>
			<td>Email</td>
			</tr>
			<tr>
			<td><input type="text" placeholder="email" name="email" ></td>
			</tr>
			<tr>
			<td>Password</td><tr>
			<tr><td><input type="password" placeholder="Password" name="password" ></td></tr>
			<tr>
			<td colspan="2" align="center">	<input type="submit" name="submit" value="Login"/></td>
			</tr>
			<tr>
			<td>New to Movieflix?<a href="signup">Sign up now</a></td>
			</tr>
		</table>
	</form>
	</section></div>
</body>
</html>