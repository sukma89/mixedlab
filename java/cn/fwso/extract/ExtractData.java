/**
 * ExtractData.java
 * Created: 2010-1-3 下午08:58:01
 * @author James Tang
 * @copyright (C) 2010 James Tang.
 */
package cn.fwso.extract;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Iterator;
import java.util.Set;
import java.util.HashSet;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 * @author James Tang
 * 
 */
public class ExtractData {

	private File txtFile;
	private Pattern pattern;
	private Matcher macher = null;
	private Set<String> data = null;
	private int groupId = 0;

	public ExtractData(File txtFile, String pattern) {
		this.txtFile = txtFile;
		this.pattern = Pattern.compile(pattern);
	}
	
	public ExtractData(File txtFile, String pattern, int groupId) {
		this(txtFile, pattern);
		this.groupId = groupId;
	}

	public Set<String> extract() {
		this.data = new HashSet<String>();

		try {

			BufferedReader br = new BufferedReader(new FileReader(this.txtFile));
			
			String line;
			
			while ( ( line = br.readLine() ) != null) {
				
				this.macher = this.pattern.matcher(line);
				
				while (this.macher.find()) {
					//this.macher.groupCount();
					//System.out.println( this.macher.groupCount() + "\t" + this.macher.group(this.groupId) );
					this.data.add(this.macher.group(this.groupId));
					
				}
			}
			
			br.close();
			
		} catch (IOException ex) {
			
			ex.printStackTrace();
			
		}

		return data;
	}
	
	public static void storeData (File sFile, Set<String> data) {
		
		if (data == null || data.isEmpty()) {
			return;
		}
		
		try {
			
			BufferedWriter bw = new BufferedWriter (new FileWriter (sFile) );
			
			Iterator<String> ds = data.iterator();
			
			bw.append("Count:");
			bw.append( Integer.toString(data.size()) );
			bw.newLine();
			
			while ( ds.hasNext() ) {
				
				bw.append(ds.next());
				bw.newLine();
				
			}
			
			bw.flush();
			bw.close();
			
		} catch (IOException ex) {
			ex.printStackTrace();
		}
		
	}

	/**
	 * @param args
	 */
	public static void main(String[] args) {

		System.out.println("Start...");
		
		String p = "<([\\w\\.]+@[\\w-\\.]+\\.[a-zA-z]{2,4})>";

		System.out.println("Pattern: " + p);
		
		String file = "F:\\backup\\20100105\\maillist\\maillist.txt";
		
		ExtractData ed = new ExtractData(new File(file), p, 1);
		
		ExtractData.storeData(new File("maillist_v1.0.txt"), ed.extract());
		
		System.out.println("Done.");
	}

}
