package io.egen.controller;

import java.util.List;

import javax.servlet.http.HttpSession;

import io.egen.entity.User;
import io.egen.entity.BrowseList;
import io.egen.service.BrowseService;
import io.egen.service.UserService;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.SessionAttributes;
import org.springframework.web.servlet.ModelAndView;

@Controller
@SessionAttributes("personObj")
public class SortController {

	@Autowired
	private BrowseService serviceBrowse;
	
	@Autowired
	private UserService serviceUser;
	
	
	@RequestMapping(value="/showsRating", method=RequestMethod.GET)
	public ModelAndView showsRating(HttpSession session) {
		
		ModelAndView view = new ModelAndView("login/login");

		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("login/login");
			}
			else{
				List<BrowseList> b = serviceBrowse.sort("series",0);
				view.addObject("browseList", b);
				view.setViewName("browse/browseSeries");
			}
		}
		return view;
	}
	
	@RequestMapping(value="/showsVotes", method=RequestMethod.GET)
	public ModelAndView showsVotes(HttpSession session) {
		
		ModelAndView view = new ModelAndView("login/login");

		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("login/login");
			}
			else{
				List<BrowseList> b = serviceBrowse.sort("series",1);
				view.addObject("browseList", b);
				view.setViewName("browse/browseSeries");
			}
		}
		return view;
	}
	
	@RequestMapping(value="/showsYear", method=RequestMethod.GET)
	public ModelAndView showsYear(HttpSession session) {
		
		ModelAndView view = new ModelAndView("login/login");

		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("login/login");
			}
			else{
				List<BrowseList> b = serviceBrowse.sort("series",2);
				view.addObject("browseList", b);
				view.setViewName("browse/browseSeries");
			}
		}
		return view;
	}
	
	@RequestMapping(value="/showsAsc", method=RequestMethod.GET)
	public ModelAndView showsAsc(HttpSession session) {
		
		ModelAndView view = new ModelAndView("login/login");

		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("login/login");
			}
			else{
				List<BrowseList> b = serviceBrowse.sort("series",3);
				view.addObject("browseList", b);
				view.setViewName("browse/browseSeries");
			}
		}
		return view;
	}
	
	@RequestMapping(value="/showsDesc", method=RequestMethod.GET)
	public ModelAndView showsDesc(HttpSession session) {
		
		ModelAndView view = new ModelAndView("login/login");

		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("login/login");
			}
			else{
				List<BrowseList> b = serviceBrowse.sort("series",4);
				view.addObject("browseList", b);
				view.setViewName("browse/browseSeries");
			}
		}
		return view;
	}
	
	@RequestMapping(value="/moviesRating", method=RequestMethod.GET)
	public ModelAndView moviesRating(HttpSession session) {
		
		ModelAndView view = new ModelAndView("login/login");

		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("login/login");
			}
			else{
				List<BrowseList> b = serviceBrowse.sort("movie",0);
				view.addObject("browseList", b);
				view.setViewName("browse/browseMovies");
			}
		}
		return view;
	}
	
	@RequestMapping(value="/moviesVotes", method=RequestMethod.GET)
	public ModelAndView moviesVotes(HttpSession session) {
		
		ModelAndView view = new ModelAndView("login/login");

		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("login/login");
			}
			else{
				List<BrowseList> b = serviceBrowse.sort("movie",1);
				view.addObject("browseList", b);
				view.setViewName("browse/browseMovies");
			}
		}
		return view;
	}
	
	@RequestMapping(value="/moviesYear", method=RequestMethod.GET)
	public ModelAndView moviesYear(HttpSession session) {
		
		ModelAndView view = new ModelAndView("login/login");

		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("login/login");
			}
			else{
				List<BrowseList> b = serviceBrowse.sort("movie",2);
				view.addObject("browseList", b);
				view.setViewName("browse/browseMovies");
			}
		}
		return view;
	}
	
	@RequestMapping(value="/moviesAsc", method=RequestMethod.GET)
	public ModelAndView moviesAsc(HttpSession session) {
		
		ModelAndView view = new ModelAndView("login/login");

		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("login/login");
			}
			else{
				List<BrowseList> b = serviceBrowse.sort("movie",3);
				view.addObject("browseList", b);
				view.setViewName("browse/browseMovies");
			}
		}
		return view;
	}
	
	@RequestMapping(value="/moviesDesc", method=RequestMethod.GET)
	public ModelAndView moviesDesc(HttpSession session) {
		
		ModelAndView view = new ModelAndView("login/login");

		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("login/login");
			}
			else{
				List<BrowseList> b = serviceBrowse.sort("movie",4);
				view.addObject("browseList", b);
				view.setViewName("browse/browseMovies");
			}
		}
		return view;
	}
/*	@RequestMapping(value="/search", method=RequestMethod.POST)
	public ModelAndView search(@RequestParam("search") String str, HttpSession session) {
		ModelAndView view = new ModelAndView("login/login");
		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("login/login");
			}
			else{
				view.setViewName("signup/success");
				List<BrowseList> b;
				
				
				b = serviceBrowse.search(0,str);
				if(!(b.isEmpty())){
				view.addObject("titleList", b);
				}
				b = serviceBrowse.search(1,str);
				if(!(b.isEmpty())){
				view.addObject("genreList", b);
				}
				b = serviceBrowse.search(2,str);
				if(!(b.isEmpty())){
				view.addObject("directorList", b);
				}
				
				b = serviceBrowse.search(3,str);
				if(!(b.isEmpty())){
				view.addObject("actorsList", b);
				}
				b = serviceBrowse.search(4,str);
				if(!(b.isEmpty())){
				view.addObject("typeList", b);
				}
				b = serviceBrowse.search(5,str);
				if(!(b.isEmpty())){
				view.addObject("yearList", b);
				}
				view.setViewName("browse/browseSearch");
			}
		}
		return view;
	}*/
}
