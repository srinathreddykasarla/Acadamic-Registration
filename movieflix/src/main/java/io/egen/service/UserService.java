package io.egen.service;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import io.egen.entity.User;

import org.springframework.stereotype.Service;

import io.egen.util.DBUtils;

@Service
public class UserService {
	
	public void create(User user) {
		String query = "insert into user values ('"+user.getEmail()+"','"+user.getPassword()+"','"+user.getFirstName()+"','"+user.getLastName()+"','"+user.getPhone()+"')";
	        	// System.out.println(query);
			//System.out.println(query);
		Connection con = DBUtils.connect();
		Statement st = null;
		try {
			st = con.createStatement(); 
				st.executeUpdate(query);
		} catch (SQLException e) {
			e.printStackTrace();
		} finally {
			try {
				if (st != null) {
					st.close();
				}
				
				if (con != null) {
					con.close();
				}
			} catch (SQLException e) {
				e.printStackTrace();
			}
		}
	}
	public User getdetails(User user){
		try{

			 //loading drivers for mysql
		         Class.forName("com.mysql.jdbc.Driver");
		         DBUtils db = new DBUtils();
		 	 //creating connection with the database 
		         Connection con=db.connect();
		         PreparedStatement ps =con.prepareStatement("select * from user where email='"+user.getEmail()+"' and password='"+user.getPassword()+"'");
		         ResultSet rs =ps.executeQuery();
		         while (rs.next()) {
		         user.setFirstName(rs.getString("firstname"));
		         user.setLastName(rs.getString("lastname"));
		         user.setPhone(rs.getString("phone"));
		         }
		      }catch(Exception e)
		      {
		          e.printStackTrace();
		      }
		      return user;
	}
	public Boolean validate(User user){
	      boolean st =false;
	      try{

		 //loading drivers for mysql
	         Class.forName("com.mysql.jdbc.Driver");
	         DBUtils db = new DBUtils();
	 	 //creating connection with the database 
	         Connection con=db.connect();
	         PreparedStatement ps =con.prepareStatement("select email from user where email='"+user.getEmail()+"' and password='"+user.getPassword()+"'");
	         ResultSet rs =ps.executeQuery();
	         st = rs.next();
	      }catch(Exception e)
	      {
	          e.printStackTrace();
	      }
	      return st;
	}
}
