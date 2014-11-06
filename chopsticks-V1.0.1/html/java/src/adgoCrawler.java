/*
	Youngjun Han / single-thread web crawler
	
	Purpose of the program
	
	To crawl through the already collected urls and classify them with more strict rules.
	Such as html contains size of contents of 300*250, contains utf-8 Korean character
	
	pseudocode
	
	while(list of unvisited URLs is not empty) {
		take URL from the list
		fetch content
		set the rule and check that the content pass or not
		store if pass
		discard if not
		
*/


//freaking for mouse move
import java.awt.*;
import java.util.*;
import java.util.Date;
import java.util.zip.GZIPInputStream;
import java.io.*;	//For inputStream
import java.net.*;	//For web search purposes
import java.sql.*;  //For sql communication but will not use at the moment

import org.xml.sax.*;

//Next version might use multi-threading algorithm using runnable
public class adgoCrawler {
	
	static String input_text = "./src/top-1m.txt"; 
	static String output_text ="./src/output.txt";
	static String error_text ="./src/error.txt";
	static int options = 0; 
	
	// bit representation option value
	static boolean optMV = false;
	static boolean optCS = false;
	static boolean optKS = false;
	
					/* bit representation option value
				 	0's bit - context size search on/off
				 	1's bit - korean text search on/off
				 	2's bit
				 	3's bit
				 	4's bit
				 	5's bit
				 	6's bit
				 	7's bit
				 */
	
	public adgoCrawler(String input, String output, int o){
		this.input_text = input;
		this.output_text = output;
		this.options = o;
	}
	
	//AWTE exception for MV
	public static void main (String[] args) throws IOException, AWTException{
    	
		//freaking MV starts
		Robot hal = new Robot();
    	Random random = new Random();
		//freaking MV ends
		
		System.out.println("Adgo Crawler Starting .....");
		
		
		FileInputStream is = new FileInputStream(input_text);
		BufferedReader br = new BufferedReader(new InputStreamReader(is));
		OutputStream os = new FileOutputStream(output_text);
		OutputStream oes = new FileOutputStream(error_text);
		
		int i = 0;	// skipping first 500 line because i dont think there is one
		
		while( br.ready()){
			
			URL u = textToUrl(br.readLine());

			
			if(i > 40200){	//test purpose if
				
				String contents = getHtml(u);
				
				/*
				 * if (check error) {
				 * 	write on error
				 * else 
				 *  check valid
				 *  	write on txt
				 *  }
				 * }
				 */
				
				//if error print in error.txt
				if(contents == "error") {
					oes.write(u.toExternalForm().getBytes());
					oes.write("\n".getBytes());
				} 
				
				// otherwise print in ouput txt when the website contains korean character
				else {
					Date d = new Date();
					
					System.out.println("Searching    :" + u.toExternalForm()); //test
					System.out.println("on           :" + d.toString());							// test
					System.out.println("Korean found :  ");
					
					if(validateHtml(contents, 0)){
						byte[] bytes = u.toString().getBytes();
						os.write(bytes);
						os.write("\n".getBytes());
					
					}
				}
			}
			
			i++;
			
			/*
			 * freaking mouse mover
			 * 
			 * 
			 */
			
			if(optMV){
				int x = random.nextInt() % 640;
				int y = random.nextInt() % 480;
				hal.mouseMove(x,y);
			}
			
			
		}
		
		oes.close();
		os.close();
		br.close();
		is.close();
		
	    System.out.println("End");
	    
	}
	
	protected static boolean validateHtml(String s, int opt){
		//if else cases needed
		
		//validateContentSize(s);
		
		return validateKorean(s);
		
	}
	
	protected static boolean validateContentSize(String s){
		return false;
	}
	
	// There are couple cases that should be filtered even thought url contains korean character 
	// korean character for language option should be also filtered 
	protected static boolean validateKorean(String s){
		for ( int j = 0; j < s.length(); j++) {
			if(44032 <= s.codePointAt(j) && s.codePointAt(j) <= 55215) {
				System.out.print((char) s.codePointAt(j));	//test
				return true;
			}
			
		}
		return false;
	}

	//return error or get contents
	protected static String getHtml(URL u) {
		
		String content = "";
		
		try {
			HttpURLConnection httpcon = (HttpURLConnection)u.openConnection();
			
			
			//http header setting
			httpcon.addRequestProperty("User-Agent","Mozilla");		
			
			//SSL code ends
			BufferedReader in = new BufferedReader(new InputStreamReader(httpcon.getInputStream()));
			
			while ((in.ready())){
				content = content + in.readLine();
	
			}
			
			in.close();
			
		} catch (Exception e){
			
			return "error";
		}
		return content;
		
	}
	
	//do not need this method when you already have urls that starts with http://
	protected static URL textToUrl(String s) throws IOException{
		String url_formed = "http://" + s.trim();
		return new URL(url_formed);
	}
		
}