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
	<link rel="stylesheet" href="<c:url value="resources/signup/style.css" />">
</head>
<body>
	<div class = "h1">
	<a href="/movieflix" class="icon-logoUpdate nfLogo signupBasicHeader" >
	<span class="screen-reader-text">MOVIEFLIX</span></a>
	</div>
	<div><section class="loginform cf" >
	<form name="login" action="create" method="post">
		<table>
		<tr>
		<td colspan="2" align="left"><div><h2 class="title">Sign Up</h2></div></td></tr>
			<tr>
			<td>Email</td>
			</tr>
			<tr>
			<td><input type="text" placeholder="Email" name="email" ></td>
			</tr>
			<tr>
			<td>Password</td><tr>
			<tr><td><input type="password" placeholder="Password" name="password" ></td>
			</tr>
			<tr>
			<td>FirstName</td><tr>
			<tr><td><input type="text" placeholder="First Name" name="firstName" ></td>
			</tr>
			<tr>
			<td>LastName</td><tr>
			<tr><td><input type="text" placeholder="Last Name" name="lastName" ></td>
			</tr>
			<tr>
			<td>Phone</td><tr>
			<tr><td><input type="text" placeholder="Phone" name="phone" ></td>
			</tr>
			<tr>
			<td><input type="submit" name="submit" value="Sign Up"/></td>
			<tr>
			<td>If You had an account! <a href="signin">Sing In now</a></td>
			</tr>
		</table>
	</form>
	</section></div>
</body>
</html>