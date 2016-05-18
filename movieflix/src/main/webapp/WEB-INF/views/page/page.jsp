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
		<link rel="stylesheet" href="<c:url value="resources/page/style.css" />">
        <link href="<c:url value="resources/page/home.css"/>" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<c:url value="resources/page/drop.css" />">
        <script src="<c:url value="/resources/page/drop.js" />"></script>
        <link rel="stylesheet" href="<c:url value="resources/page/searchstyle.css"/>">
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
			</div>             
            <div class="container">
            <div>
            <div class="movieflix-front-list-listing movieflix-front-list-soon no-margin">
            
            <c:if test="${browseList!= null}">
            <c:forEach var="b" items="${browseList}">
            
 			<table colspan="2" >
 			<tr>
 			<td>
            <div>
            <a href="${b.imdbId}">
            <img src="${b.poster}"></a><div>
            <a href="${b.imdbId}" class="internal-home movieflix-front-to-list-link">
            <h3 class="movieflix-list-card-name">${b.title}</h3></a>
            </div></div>
           	<div>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Plot:- </a>
            </div>
           	<div>
           	 		<a style ="color:#E1EAF1;font-size: 10pt;
            		font-family:sans-serif;">${b.plot}</a>
            </div>
            <div>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Director:- </a>
            
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.director}</a>
            </div>
            <div>
            <form id="envselection" action="page/${b.imdbId}"  method="post" class="rating">
		                <input type="radio" id="star5" name="rating" value="5" onclick="postToController();" /><label for="star5" title="Super !!"></label>    
		                <input type="radio" id="star4" name="rating" value="4" onclick="postToController();" /><label for="star4" title="Geil"></label>
		                <input type="radio" id="star3" name="rating" value="3" onclick="postToController();" /><label for="star3" title="Gut"></label>
		                <input type="radio" id="star2" name="rating" value="2" onclick="postToController();" /><label for="star2" title="So gut wie"></label>
		                <input type="radio" id="star1" name="rating" value="1" onclick="postToController();" /><label for="star1" title="Schlecht"></label>
		    </form> 
		    <script>function postToController() {
			        for (i = 0; i < document.getElementsByName('rating').length; i++) {
			                if(document.getElementsByName('rating')[i].checked == true) {
			                    var ratingValue = document.getElementsByName('rating')[i].value;
			                    break; 
			                }
			        }
			        document.getElementById("envselection").submit();
			}</script>
		    </div>
		    <div></div>
		    <div>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Avg User Rating:- </a>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${avg}</a>
            </div>
		    
			
            </td>
            <td>
            <table>
            	<tr>
            	<h2 class = "h2">Details:</h2>
            	</tr>
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Title :- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.title}</a>
            		</td>
            	</tr>
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Actors:- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.actors}</a>
            		</td>
            	</tr>
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">IMDB-Id:- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.imdbId}</a>
            		</td>
            	</tr>
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Actors:- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.actors}</a>
            		</td>
            	</tr>
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Awards:- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.awards}</a>
            		</td>
            	</tr>
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Country:- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.country}</a>
            		</td>
            	</tr>
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Genre:- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.genre}</a>
            		</td>
            	</tr>
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Language:- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.language}</a>
            		</td>
            	</tr>
            	
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Metascore:- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.metascore}</a>
            		</td>
            	</tr>
            	
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Rated:- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.rated}</a>
            		</td>
            	</tr>
            	
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Released:- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.released}</a>
            		</td>
            	</tr>
            	
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Runtime:- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.runtime}</a>
            		</td>
            	</tr>
            	
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Type:- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.type}</a>
            		</td>
            	</tr>
            	
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Writer:- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.writer}</a>
            		</td>
            	</tr>
            	
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">Year:- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.year}</a>
            		</td>
            	</tr>

            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">IMDB -Rating:- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.imdbRating}</a>
            		</td>
            	</tr>
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">IMDB-Votes:- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${b.imdbVotes}</a>
            		</td>
            	</tr>
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">IMDB-link:- </a>
            		</td>
           	 		<td>
           	 		<a href = "http://www.imdb.com/title/${b.imdbId}" style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">Click Here</a>
            		</td>
            	</tr>
            </table>
            </td>
            </tr>
            </table>
            
            <table>
            	<tr>
            	<h2 class = "h2">Comments:</h2>
            	</tr>
           <c:forEach var="c" items="${b.comments}"> 	
            	<tr>
            		<td>
            		<a style ="color:#0367b0;font-size: 14pt;
            		font-family:sans-serif;">${c.name} :- </a>
            		</td>
           	 		<td>
           	 		<a style ="color:#E1EAF1;font-size: 12pt;
            		font-family:sans-serif;">${c.comment}</a>
            		</td>
            	</tr>
            </c:forEach>   	
            </table>
            <div>
	        <form name="login" action="${b.imdbId}" method="post">
				<table>
				<tr>
				<td><input rows="4" cols="150" type="text" placeholder="Write Your Comments!!!" name="comment" ></td>
				<td colspan="2" align="center">	<input type="submit" name="submit" value="submit"/></td>
				</tr>
				</table>
			</form>
			
		    
		   	

			
			
			
			
            </div>
            </c:forEach>   
            </c:if>
            
            </div>
            </div>
            <div class="movieflix-endpage"></div>
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