package io.egen.service;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import java.util.UUID;

import io.egen.entity.BrowseList;
import io.egen.entity.Comments;
import io.egen.util.DBUtils;

import org.springframework.stereotype.Service;

@Service
public class BrowseService {

	public List<BrowseList> findAll(int index) {
		List<BrowseList> browse = new ArrayList<BrowseList>();
		try{
			//loading drivers for mysql
			Class.forName("com.mysql.jdbc.Driver");
			
			DBUtils db = new DBUtils();
			//creating connection with the database 
			Connection con=db.connect();
			String query="select * from movie";
			if(index==0){
				query="select * from movie";
			}
			else if(index==1){
				query="SELECT * FROM Movie WHERE type = \"movie\"";
			}
			else if(index==2){
				query="SELECT * FROM Movie WHERE type = \"series\"";
			}
			PreparedStatement ps =con.prepareStatement(query);
		    ResultSet rs =ps.executeQuery();
		    while (rs.next()) {
		    	BrowseList l = new BrowseList(rs.getString("imdbId"), rs.getString("actors"), rs.getString("awards"), rs.getString("country"), rs.getString("director"), rs.getString("genre"), rs.getString("language"),rs.getString("metascore"), rs.getString("plot"), rs.getString("poster"), rs.getString("rated"), rs.getString("released"), rs.getString("runtime"), rs.getString("title"), rs.getString("type"), rs.getString("writer"), rs.getString("year"), rs.getString("imdbrating"), rs.getString("imdbvotes"),null);
		    	browse.add(l);
		    }
		    }catch(Exception e)
		    {
		    	e.printStackTrace();
		    }
		
		return browse;
	}
	
	public String average(String id) {
		String avg = "0";
		try{
			//loading drivers for mysql
			Class.forName("com.mysql.jdbc.Driver");
			DBUtils db = new DBUtils();
			//creating connection with the database 
			Connection con=db.connect();
			String query="select avg(rating),imdbid from rating group by imdbid having imdbid = '"+id+"'";
			
			PreparedStatement ps =con.prepareStatement(query);
		    ResultSet rs =ps.executeQuery();
		    
		    while (rs.next()) {
		    	avg = rs.getString(1);
		    }
		    }catch(Exception e)
		    {
		    	e.printStackTrace();
		    }
		return avg;
	}
	
	public List<BrowseList> findone(String id) {
		List<BrowseList> browse = new ArrayList<BrowseList>();
		List<Comments> com = new ArrayList<Comments>();
		
		try{
			//loading drivers for mysql
			Class.forName("com.mysql.jdbc.Driver");
			DBUtils db = new DBUtils();
			//creating connection with the database 
			Connection con=db.connect();
			String query="SELECT * FROM `Movie` WHERE imdbid = '"+id+"'";
			
			PreparedStatement ps =con.prepareStatement(query);
		    ResultSet rs =ps.executeQuery();
		    
		    query = "SELECT u.firstname, c.comment FROM comments c,user u WHERE c.email=u.email and c.imdbid = '"+id+"'";
		
		    PreparedStatement ps1 =con.prepareStatement(query);
	        ResultSet rs1 =ps1.executeQuery();
	        while (rs1.next()) {
	        	Comments c = new Comments(rs1.getString(1), rs1.getString(2));
	        	com.add(c);
	        }
		    while (rs.next()) {
		    	BrowseList l = new BrowseList(rs.getString("imdbId"), rs.getString("actors"), rs.getString("awards"), rs.getString("country"), rs.getString("director"), rs.getString("genre"), rs.getString("language"),rs.getString("metascore"), rs.getString("plot"), rs.getString("poster"), rs.getString("rated"), rs.getString("released"), rs.getString("runtime"), rs.getString("title"), rs.getString("type"), rs.getString("writer"), rs.getString("year"), rs.getString("imdbrating"), rs.getString("imdbvotes"),com);
		        browse.add(l);
		    }
		    }catch(Exception e)
		    {
		    	e.printStackTrace();
		    }
		return browse;
	}
	public void addComment(String email,String id,String comment) {
		String query = "insert into comments values ('"+email+"','"+id+"','"+comment+"')";
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
	
	
	public void rate(String email,String id,String rating) {
		
		Connection con = DBUtils.connect();
		Statement st = null;
		String query="SELECT * FROM rating WHERE user = '"+email+"' and imdbid = '"+id+"'";
		try {
			PreparedStatement ps =con.prepareStatement(query);
		    ResultSet rs =ps.executeQuery();
		    
		    if(!rs.next()) {
		    	query = "insert into rating values ('"+email+"','"+id+"','"+rating+"')";
		    }
		    else{
		    	query = "UPDATE rating SET rating='"+rating+"' WHERE user = '"+email+"' and imdbid = '"+id+"'";
		    }
		    
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
	
	public List<BrowseList> search(int index,String str) {
		List<BrowseList> browse = new ArrayList<BrowseList>();
		try{
			//loading drivers for mysql
			Class.forName("com.mysql.jdbc.Driver");
			DBUtils db = new DBUtils();
			//creating connection with the database 
			Connection con=db.connect();
			String query="select * from movie";
			if(index==0){
				query="SELECT * FROM Movie WHERE title LIKE '%"+str+"%'";
			}
			else if(index==1){
				query="SELECT * FROM Movie WHERE genre LIKE '%"+str+"%'";
			}
			else if(index==2){
				query="SELECT * FROM Movie WHERE director LIKE '%"+str+"%'";
			}
			else if(index==3){
				query="SELECT * FROM Movie WHERE actors LIKE '%"+str+"%'";
			}
			else if(index==4){
				query="SELECT * FROM Movie WHERE type LIKE '%"+str+"%'";
			}
			else if(index==5){
				query="SELECT * FROM Movie WHERE year LIKE '%"+str+"%'";
			}
			PreparedStatement ps =con.prepareStatement(query);
		    ResultSet rs =ps.executeQuery();
		    while (rs.next()) {
		    	BrowseList l = new BrowseList(rs.getString("imdbId"), rs.getString("actors"), rs.getString("awards"), rs.getString("country"), rs.getString("director"), rs.getString("genre"), rs.getString("language"),rs.getString("metascore"), rs.getString("plot"), rs.getString("poster"), rs.getString("rated"), rs.getString("released"), rs.getString("runtime"), rs.getString("title"), rs.getString("type"), rs.getString("writer"), rs.getString("year"), rs.getString("imdbrating"), rs.getString("imdbvotes"),null);
		        browse.add(l);
		    }
		    }catch(Exception e)
		    {
		    	e.printStackTrace();
		    }
		return browse;
	}
	
	public List<BrowseList> sort(String str,int index) {
		List<BrowseList> browse = new ArrayList<BrowseList>();
		try{
			//loading drivers for mysql
			Class.forName("com.mysql.jdbc.Driver");
			DBUtils db = new DBUtils();
			//creating connection with the database 
			Connection con=db.connect();
			String query="select * from movie";
			if(index==0){
				query="SELECT * FROM Movie WHERE type = '"+str+"' order by imdbrating desc";
			}
			else if(index==1){
				query="SELECT * FROM Movie WHERE type = '"+str+"' order by imdbvotes desc";
			}
			else if(index==2){
				query="SELECT * FROM Movie WHERE type = '"+str+"' order by year desc";
			}
			else if(index==3){
				query="SELECT * FROM Movie WHERE type = '"+str+"' order by title";
			}
			else if(index==4){
				query="SELECT * FROM Movie WHERE type = '"+str+"' order by title desc";
			}
			
			PreparedStatement ps =con.prepareStatement(query);
		    ResultSet rs =ps.executeQuery();
		    while (rs.next()) {
		    	BrowseList l = new BrowseList(rs.getString("imdbId"), rs.getString("actors"), rs.getString("awards"), rs.getString("country"), rs.getString("director"), rs.getString("genre"), rs.getString("language"),rs.getString("metascore"), rs.getString("plot"), rs.getString("poster"), rs.getString("rated"), rs.getString("released"), rs.getString("runtime"), rs.getString("title"), rs.getString("type"), rs.getString("writer"), rs.getString("year"), rs.getString("imdbrating"), rs.getString("imdbvotes"),null);
		        browse.add(l);
		    }
		    }catch(Exception e)
		    {
		    	e.printStackTrace();
		    }
		return browse;
	}

}
