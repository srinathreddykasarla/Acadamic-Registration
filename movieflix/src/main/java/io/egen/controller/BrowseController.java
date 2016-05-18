package io.egen.controller;

import java.util.List;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;

import io.egen.entity.User;
import io.egen.entity.BrowseList;
import io.egen.service.BrowseService;
import io.egen.service.UserService;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.SessionAttributes;
import org.springframework.web.servlet.ModelAndView;

@Controller
@SessionAttributes("personObj")
public class BrowseController {

	@Autowired
	private BrowseService serviceBrowse;
	
	@Autowired
	private UserService serviceUser;
	
	
	@RequestMapping(value="/browse", method=RequestMethod.GET)
	public ModelAndView fulllist(HttpSession session) {
		ModelAndView view = new ModelAndView("login/login");
		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("login/login");
			}
			else{
				List<BrowseList> b = serviceBrowse.findAll(0);
				view.addObject("browseList", b);
				view.setViewName("browse/browse");
			}
		}
		return view;
	}
	
	@RequestMapping(value="/browseMovies", method=RequestMethod.GET)
	public ModelAndView movielist(HttpSession session) {
		ModelAndView view = new ModelAndView("login/login");
		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("login/login");
			}
			else{
				List<BrowseList> b = serviceBrowse.findAll(1);
				view.addObject("browseList", b);
				view.setViewName("browse/browseMovies");
			}
		}
		return view;
	}
	@RequestMapping(value="/browseSeries", method=RequestMethod.GET)
	public ModelAndView serieslist(HttpSession session) {
		ModelAndView view = new ModelAndView("login/login");
		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("login/login");
			}
			else{
				List<BrowseList> b = serviceBrowse.findAll(2);
				view.addObject("browseList", b);
				view.setViewName("browse/browseSeries");
			}
		}
		return view;
	}
	@RequestMapping(value="/search", method=RequestMethod.POST)
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
	}
	@RequestMapping(value="/{id}", method=RequestMethod.GET)
	public ModelAndView fulllist(@PathVariable("id") String id,HttpSession session) {
		ModelAndView view = new ModelAndView("login/login");
		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("login/login");
			}
			else{
				List<BrowseList> b = serviceBrowse.findone(id);
				String avg = serviceBrowse.average(id);
				view.addObject("avg", avg);
				view.addObject("browseList", b);
				view.setViewName("page/page");
			}
		}
		return view;
	}
	
	@RequestMapping(value="/{id}", method=RequestMethod.POST)
	public ModelAndView addComment(@PathVariable("id") String id,@RequestParam("comment") String comment, HttpSession session) {
		ModelAndView view = new ModelAndView("login/login");
		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("login/login");
			}
			else{
				serviceBrowse.addComment(u.getEmail(),id,comment);
				List<BrowseList> b = serviceBrowse.findone(id);
				String avg = serviceBrowse.average(id);
				view.addObject("avg", avg);
				view.addObject("browseList", b);
				view.setViewName("page/page");
			}
		}
		return view;
	}
	
	@RequestMapping(value="page/{id}", method=RequestMethod.POST)
	public ModelAndView rate(@PathVariable("id") String id,@RequestParam("rating") String rating, HttpSession session,HttpServletRequest request) {
		ModelAndView view = new ModelAndView("redirect:/signin");
		User u = (User) session.getAttribute("user");
		if(u!=null){
			if(!serviceUser.validate(u)){
				return new ModelAndView("redirect:/signin");
			}
			else{
				serviceBrowse.rate(u.getEmail(),id,rating);
				List<BrowseList> b = serviceBrowse.findone(id);
				view.addObject("browseList", b);
				String avg = serviceBrowse.average(id);
				view.addObject("avg", avg);
				String referer = request.getHeader("Referer");
				view.setViewName("redirect:"+referer);
			}
		}
		return view;
	}
}
