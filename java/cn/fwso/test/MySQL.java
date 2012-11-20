package cn.fwso.test;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.ResultSet;
import java.io.Console;

public class MySQL {
	
	private String url = null;
	
	private boolean driverRegisted = false;
	private Connection conn = null;
	
	public MySQL (String host, String port, String database, String user, String passwd) {
		
		try {
			Class.forName("com.mysql.jdbc.Driver").newInstance();
			this.driverRegisted = true;
			
			this.url = "jdbc:mysql://" + host + ":" + port + 
				"/" + database + "?user=" + user + "&password=" + passwd + 
				"&useUnicode=yes&characterEncoding=UTF-8";
			
		} catch (Exception ex) {
			ex.printStackTrace();
		}
	}
	
	public Connection getConnection () {
		
		if (this.conn == null && this.driverRegisted) {
			
			try {
			
				this.conn = DriverManager.getConnection(this.url);
				
			} catch (SQLException ex) {
				//ex.printStackTrace();
				System.out.println("Error: " + ex.getMessage());
			}
		}
		
		return this.conn;
	}
	
	public void close () {
		
		if (this.conn != null) {
			try {
				this.conn.close();
			} catch (Exception ex) {
				ex.printStackTrace();
			}
		}
		
	}
	
	public static void main(String[] args) {
		
		if (args.length < 4) {
			System.out.println("Error: 4 arguments required: [host] [post] [database] [usr]");
			System.exit(0);
		}
		
		String host = args[0].trim();
		String port = args[1].trim();
		String database = args[2].trim();
		String user = args[3].trim();
		
		Console in = System.console();
		
		String passwd = new String(in.readPassword("Enter Password: "));
		
		MySQL mysql = new MySQL (host, port, database, user, passwd);
		
		Connection conn = mysql.getConnection();
		
		if (conn != null) {
			System.out.println("MySQL prepared.");
			
			Statement st = null;
			ResultSet rs = null;
			String sql = "SELECT * FROM users";
			
			try {
				
				st = conn.createStatement();
				rs = st.executeQuery(sql);
				
				while (rs.next()) {
					System.out.println("Name: " + rs.getString("name"));
					System.out.println("Email: " + rs.getString("email"));
					System.out.println("===============================");
				}	
				
			} catch (SQLException ex) {
			
				ex.printStackTrace();
				
			} finally {
				
				if (rs != null) {
					try {
						rs.close();
					} catch (SQLException ex) {
						
					}
				}
				
				if (st != null) {
					try {
						st.close();
					} catch (SQLException ex) {
						
					}
				}
				
				System.out.println("Done");
			}
			
		} else {
			System.out.println("MySQL failed to conenct.");
		}
	}
}