<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<title>Spring Web App</title>
</head>
<body>
<h4>Hi ${user.firstName} ${user.lastName}</h4>
<p>Thanks for registering.</p>
<p>A confirmation has been sent to your email: ${user.email}</p>
<p>To Sign in <a href="signin">Click Here</a></p>
</body>
</html>