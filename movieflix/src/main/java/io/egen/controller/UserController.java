package io.egen.controller;



import java.util.List;

import javax.servlet.http.HttpSession;

import io.egen.entity.BrowseList;
import io.egen.entity.User;
import io.egen.service.BrowseService;
import io.egen.service.UserService;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.validation.BindingResult;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.SessionAttributes;
import org.springframework.web.servlet.ModelAndView;

@Controller
@SessionAttributes("personObj")
public class UserController {

	@Autowired
	private UserService service;
	
	@Autowired
	private BrowseService serviceBrowse;
	
	
	@RequestMapping(value="/signin", method=RequestMethod.GET)
	public String login() {
		return "login/login";
	}
	@RequestMapping(value="/signup", method=RequestMethod.GET)
	public String signup() {
		return "signup/signUp";
	}

//	@RequestMapping(value="/login", method=RequestMethod.POST)
//	public String createsession(@ModelAttribute User user, ModelMap model) {
//		if(service.validate(user))
//			return "signup/success";
//		else
//			return "redirect:/signin";
//	}
	 @RequestMapping(value ="/login", method = RequestMethod.POST)
	 public String  doLogin(@Validated @ModelAttribute User user, BindingResult bindingresult,HttpSession session ) {
		 if(!bindingresult.hasErrors()){
			 if(!service.validate(user)){
				return "login/incorrectlogin";
			 }
			 else{
				 user = service.getdetails(user);
	             session.setAttribute("user", user); 
	        }
		 }
		 return "redirect:/browse";
	 }
	 
	 @RequestMapping(value="/", method=RequestMethod.GET)
		public ModelAndView serieslist(HttpSession session) {
			ModelAndView view = new ModelAndView("index");
			User u = (User) session.getAttribute("user");
			if(u!=null){
				if(!service.validate(u)){
					return new ModelAndView("index");
				}
				else{
					List<BrowseList> b = serviceBrowse.findAll(1);
					view.addObject("browseList", b);
					view.setViewName("browse/browse");
				}
			}
			return view;
		}
	 
	 @RequestMapping("/logout")
     public String logout(HttpSession session ) {
        session.invalidate();
        return "redirect:/signin";
     }
	
	@RequestMapping(value="/create", method=RequestMethod.POST)
	public String createUser (@ModelAttribute User user, ModelMap model) {
		service.create(user);
		model.addAttribute("user", user);
		return "signup/success";
	}
	
}
