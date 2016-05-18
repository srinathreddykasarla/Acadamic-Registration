<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@taglib uri="http://www.springframework.org/tags" prefix="s"%>
<!DOCTYPE html>
<html class="supports-svg" xmlns:fb="http://ogp.me/ns/fb#" ><head>
        <title>Movieflix</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="content-language" content="en" />
		<link rel="icon" type="image/png" href="<c:url value="resources/icon.png"/>" sizes="16x16">
		<link rel="stylesheet" href="<c:url value="resources/browse/style.css" />">
        <link href="<c:url value="resources/browse/home.css"/>" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<c:url value="resources/browse/drop.css" />">
        <script src="<c:url value="/resources/browse/drop.js" />"></script>
        <link rel="stylesheet" href="<c:url value="resources/browse/searchstyle.css"/>">
        </head>
        <body>      
        	<div class = "h1">
        	<table style="margin-top:2%; margin-left:8%;margin-bottom:2%; width:90%;">
        	<col align="left">
			<col align="left">
			<col align="right">
			<col align="right">      	
			<tr>
			<td><a href="browse" class="icon-logoUpdate nfLogo signupBasicHeader" >
			<span class="screen-reader-text">MOVIEFLIX</span></a></td>
			<td>
			<div class="dropdown">
			<button onclick="myFunction()" class="dropbtn">Browser</button>
			  <div id="myDropdown" class="dropdown-content">
			    <a href="browse">Home</a>
			    <a href="browseMovies">Movies</a>
			    <a href="browseSeries">TV Shows</a>
			  </div>
			</div>
			</td>
			<td>
			<div class="box">
			<form name="login" action="search" method="post">
				<div class="container-1">
					<span class="icon"><i class="fa fa-search"></i></span>
				    <input type="search" id="search" name="search" placeholder="Search..." />
				</div>
			</form>
			</div>
			</td>
			<td>
			<div class="dropdown">
			<button onclick="myFunction1()" class="dropbtn">${user.firstName}</button>
			  <div id="myDropdown1" class="dropdown-content">
			    <a href="browse">Manage Account</a>
			    <a href="help">Help Center</a>
			    <a href="logout">Logout</a>
			  </div>
			</div>
			</td>
			</tr>
			</table>
			
            <c:if test="${titleList!= null}">
            </div>             
            <div class="container">
            <div class="movieflix-front-sections">
            <div class="movieflix-front-courses">
            <div>
           
            <div class="movieflix-front-list-listing movieflix-front-list-soon no-margin">
            
    		<h2 class = "h2">Search results By Title:</h2>
            <c:forEach var="b" items="${titleList}">
            <div style="" class="movieflix-list-card">
            <div class="movieflix-list-card-image">
            <a href="${b.imdbId}" class="internal-home movieflix-front-to-list-link">
            <img src="${b.poster}"></a></div><div class="movieflix-list-card-details">
            <a href="${b.imdbId}" class="internal-home movieflix-front-to-list-link">
            <h3 class="movieflix-list-card-name">${b.title}</h3></a><div style="line-height:17px;">
            </div></div></div>
            </c:forEach>  
            </div>
            </div>
            </div>
            </div>
            <div class="movieflix-endpage"></div> 
            </c:if>
            
            <c:if test="${genreList!= null}">
            </div>             
            <div class="container">
            <div class="movieflix-front-sections">
            <div class="movieflix-front-courses">
            <div>
           
            <div class="movieflix-front-list-listing movieflix-front-list-soon no-margin">
            
    		<h2 class = "h2">Search results By Genre:</h2>
            <c:forEach var="b" items="${genreList}">
            <div style="" class="movieflix-list-card">
            <div class="movieflix-list-card-image">
            <a href="${b.imdbId}" class="internal-home movieflix-front-to-list-link">
            <img src="${b.poster}"></a></div><div class="movieflix-list-card-details">
            <a href="${b.imdbId}" class="internal-home movieflix-front-to-list-link">
            <h3 class="movieflix-list-card-name">${b.title}</h3></a><div style="line-height:17px;">
            </div></div></div>
            </c:forEach> 
            </div>
            </div>
            </div>
            </div>
            <div class="movieflix-endpage"></div>  
            </c:if>
            
            <c:if test="${directorList!= null}">
            </div>             
            <div class="container">
            <div class="movieflix-front-sections">
            <div class="movieflix-front-courses">
            <div>
           
            <div class="movieflix-front-list-listing movieflix-front-list-soon no-margin">
            
    		<h2 class = "h2">Search results By Director:</h2>
            <c:forEach var="b" items="${directorList}">
            <div style="" class="movieflix-list-card">
            <div class="movieflix-list-card-image">
            <a href="${b.imdbId}" class="internal-home movieflix-front-to-list-link">
            <img src="${b.poster}"></a></div><div class="movieflix-list-card-details">
            <a href="${b.imdbId}" class="internal-home movieflix-front-to-list-link">
            <h3 class="movieflix-list-card-name">${b.title}</h3></a><div style="line-height:17px;">
            </div></div></div>
            </c:forEach>  
            </div>
            </div>
            </div>
            </div>
            <div class="movieflix-endpage"></div> 
            </c:if>
            
            <c:if test="${actorsList!= null}">
            </div>             
            <div class="container">
            <div class="movieflix-front-sections">
            <div class="movieflix-front-courses">
            <div>
           
            <div class="movieflix-front-list-listing movieflix-front-list-soon no-margin">
            
    		<h2 class = "h2">Search results By Actors:</h2>
            <c:forEach var="b" items="${actorsList}">
            <div style="" class="movieflix-list-card">
            <div class="movieflix-list-card-image">
            <a href="${b.imdbId}" class="internal-home movieflix-front-to-list-link">
            <img src="${b.poster}"></a></div><div class="movieflix-list-card-details">
            <a href="${b.imdbId}" class="internal-home movieflix-front-to-list-link">
            <h3 class="movieflix-list-card-name">${b.title}</h3></a><div style="line-height:17px;">
            </div></div></div>
            </c:forEach>  
            </div>
            </div>
            </div>
            </div>
            <div class="movieflix-endpage"></div> 
            </c:if>
            
            
            <c:if test="${typeList!= null}">
            </div>             
            <div class="container">
            <div class="movieflix-front-sections">
            <div class="movieflix-front-courses">
            <div>
           
            <div class="movieflix-front-list-listing movieflix-front-list-soon no-margin">
            
    		<h2 class = "h2">Search results By Type:</h2>
            <c:forEach var="b" items="${typeList}">
            <div style="" class="movieflix-list-card">
            <div class="movieflix-list-card-image">
            <a href="${b.imdbId}" class="internal-home movieflix-front-to-list-link">
            <img src="${b.poster}"></a></div><div class="movieflix-list-card-details">
            <a href="${b.imdbId}" class="internal-home movieflix-front-to-list-link">
            <h3 class="movieflix-list-card-name">${b.title}</h3></a><div style="line-height:17px;">
            </div></div></div>
            </c:forEach>  
            </div>
            </div>
            </div>
            </div>
            <div class="movieflix-endpage"></div> 
            </c:if>
            
            
            <c:if test="${yearList!= null}">
            </div>             
            <div class="container">
            <div class="movieflix-front-sections">
            <div class="movieflix-front-courses">
            <div>
           
            <div class="movieflix-front-list-listing movieflix-front-list-soon no-margin">
            
    		<h2 class = "h2">Search results By Year:</h2>
            <c:forEach var="b" items="${yearList}">
            <div style="" class="movieflix-list-card">
            <div class="movieflix-list-card-image">
            <a href="${b.imdbId}" class="internal-home movieflix-front-to-list-link">
            <img src="${b.poster}"></a></div><div class="movieflix-list-card-details">
            <a href="${b.imdbId}" class="internal-home movieflix-front-to-list-link">
            <h3 class="movieflix-list-card-name">${b.title}</h3></a><div style="line-height:17px;">
            </div></div></div>
            </c:forEach>  
            </div>
            </div>
            </div>
            </div>
            <div class="movieflix-endpage"></div> 
            </c:if>
              
            
            </div>
            <div class="movieflix-footer" role="menubar">
            <div class="container">
            <div class="row-fluid">
            <div class="movieflix-footer-content-primary">
            <a href="" class="internal-home movieflix-footer-link">About</a>
            <a href="" class="internal-home movieflix-footer-link">Careers</a>
            <a href="" class="internal-home movieflix-footer-link">Team</a>
            <a href="" class="movieflix-footer-link">Store</a>
            <a href="" class="internal-home movieflix-footer-link">Contact</a>
            <a href="" class="internal-home movieflix-footer-link">Press</a>
            <a href="" class="internal-home movieflix-footer-link">Terms</a>
            <a href="" class="movieflix-footer-link">Help</a>
            </div><div class="movieflix-footer-content-secondary">
            <a target="_blank" href="" class="movieflix-footer-link">Google+</a>
            <a target="_blank" href="" class="movieflix-footer-link">Twitter</a>
            <a target="_blank" href="" class="movieflix-footer-link">Facebook</a>
            <a target="_blank" href="" class="movieflix-footer-link">Blog</a>
            </div></div></div></div>
</body>
</html>