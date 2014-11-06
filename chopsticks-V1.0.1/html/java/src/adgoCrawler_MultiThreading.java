import java.io.*;     // For InputStream
import java.net.*;   // For web search 
import java.util.*;   

import adgoCrawler.DBConnection;
import adgoCrawler.PageAgent;

public class adgoCrawler_MultiThreading {

	   static   DBConnection db = null; // 데이터베이스 인스탄스 생성
	   Vector   badExtList;             // 방문하지 않을 확장자를 설정한다.
	   Vector   badDirList;             // 방문하지 않을 디렉토리를 설정한다.
	   static   String host;

	   public PageAgent(int numOfAgent, String host) {
	       this.host = host;
	       db = DBConnection.getInstance();  // 데이터베이스 연결 객체를 할당받는다.
	       badUrl();                         // 읽지 않을 URL 정보를 파일에서 읽어온다.
	       db.insertPage(host);              // 새로 방문할 페이지에 호스트를 추가

	       (new Thread(this)).start();
	       try {
	           Thread.sleep(5000);
	           for (int i=1; i<numOfAgent; i++) {
	              Thread.sleep(100);
	              (new Thread(this)).start();
	           }
	       } catch(Exception e){ }
	   }

	   // 한꺼번에 몇개의 쓰레드로 검색한다.
	   public void run() {
	     String link;
	     while ((link=db.getNewLink()) != null) {
	        webCrawling(link);   // 웹 페이지를 가져오는 일을 실행함.
	     }
	   }

	   // 웹 페이지로부터 링크를 추출한다
	   protected void webCrawling(String link) {
	        String content = "";
	        URL    url     = null;
	        try {
	            url     = new URL(link);
	            content = getContentIn(url);  
	        } catch (Exception e) { }
	        if (content != null) {
	            extractLinkFrom(url , content, "<a",      "href");  // 컨텐츠에서 <A>     링크를 추출함.
	            extractLinkFrom(url , content, "<frame",   "src");  // 컨텐츠에서 <FRAME> 링크를 추출함.
	            extractLinkFrom(url , content, "<iframe",  "src");  // 컨텐츠에서 <FRAME> 링크를 추출함.
	            extractLinkFrom(url , content, "<meta",    "url");  // 컨텐츠에서 <META>  링크를 추출함.
	            extractLinkFrom(url , content, "<form", "action");  // 컨텐츠에서 <FORM>  링크를 추출함.
	            System.out.print("n-" + link); 
	            db.updatePage(link, content);   // 페이지에 내용을 업데이트 한다.
	        } else {
	            System.out.print("^"); 
	            db.updatePage(link, "*** VISITED ***");   // 페이지에 내용을 업데이트 한다.
	        }
	   }

	   // URL에 해당하는 페이지를 전송받는다.
	   protected String getContentIn(URL url) {
	       String content   = "";
	       String inputLine = null;
	       try {
	           BufferedReader in = new BufferedReader(new InputStreamReader(url.openStream()));  
	           while ((inputLine = in.readLine()) != null)  {
	               content += inputLine + "n";
	               if (content.length() > 65500)
	                   break;    
	           }
	           in.close();    
	       } catch(Exception e){ }
	       return content; // 스트링버퍼의 값을 문자열로 변환하여 리턴
	   }

	   // 현재 페이지에서 링크를 찾아낸다.
	   protected void extractLinkFrom(URL url, String content, String linkTag, String option) {
	       String lowerCaseContent = content.toLowerCase();
	       StringTokenizer st = null;
	       String newLink     = null;
	       int    index       = 0;

	       while  ((index = lowerCaseContent.indexOf(linkTag, index)) != -1  ) { 
	           if ((index = lowerCaseContent.indexOf(option,  index)) == -1  |   
	               (index = lowerCaseContent.indexOf("=",     index)) == -1  )   
	               break;
	           index++;
	           st        = new StringTokenizer(content.substring(index), "tnr"'\>#),< ");
	           newLink   = st.nextToken();
	           if (badLink(newLink)) continue;

	           // 슬래시로 시작되면 이를 빼 버림. 
	           if (newLink.startsWith("/"))
	               newLink = newLink.substring(1);

	           // URL을 확인하여 유효한 경우에만 입력한다.
	           try {
	               URL urlLink = new URL(url, newLink);
	               newLink = urlLink.toString();
	               if (newLink != null &&
	                   newLink.length() < 200 && newLink.length() > 20 &&   // 링크의 길이 점검
	                   newLink.indexOf(host)               != -1     )  {   // 현재 호스트만 검색
	                   db.insertPage(newLink);                                 // 새로 발견한 페이지 목록에 추가
	               }
	           } catch (MalformedURLException e) {  }    
	       }
	   }

	   // 방문을 기피하는 링크인지 확인한다.
	   public boolean badLink(String link) {
	       boolean bad = false;
	       link = link.trim().toLowerCase();
	       if(link.startsWith("mail") || link.startsWith("javascript"))
	          bad = true;

	       for (int i=0; i<badExtList.size(); i++) 
	            if (link.endsWith((String) badExtList.elementAt(i))) 
	                bad = true;

	       for (int i=0; i<badDirList.size(); i++) 
	            if (link.indexOf ((String) badDirList.elementAt(i)) != -1) 
	                bad = true;
	       return bad;
	   }

	   public void badUrl() {
	       // 읽어오지 않을 확장자를 설정한다.
	       badExtList = new Vector();
	       try {
	          BufferedReader in = new BufferedReader(new FileReader("conf\badExtList.txt"));
	          String ext;
	          while ((ext = in.readLine() ) != null) {
	                  badExtList.addElement(ext); 
	          }
	          in.close();
	       }  catch (Exception e) { }

	       // 읽어오지 않을 확장자를 설정한다.
	       badDirList = new Vector();
	       try {
	          BufferedReader in = new BufferedReader(new FileReader("conf\badDirList.txt"));
	          String dir;
	          while ((dir = in.readLine() ) != null) {
	                  badDirList.addElement(dir); 
	          }
	          in.close();
	       }  catch (Exception e) { }
	   }

	   // 여기서부터 시작된다.
	   public static void main (String[] args) {
	      int numOfAgent = 10;  // 검색 로봇의 개수
	      System.out.println("Page Agent Started .....(Hwang, Insoo)");
	      System.out.println("--------------------------------------");
	      new PageAgent(numOfAgent, args[0]);
	   }
}
