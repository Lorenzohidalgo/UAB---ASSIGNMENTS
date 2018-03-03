package wget;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.net.URL;
import java.io.InputStreamReader;


public class Download implements Runnable {
	
	private Thread t;
	private String url;
	private boolean a_flag = false;
	private boolean zip_flag = false;
	private boolean gz_flag = false;
	private boolean is_text = false;
	
	Download( String given_url, boolean a, boolean z, boolean gz){
		url = given_url;
		a_flag = a;
		zip_flag = z;
		gz_flag = gz;
	}
	
	public void start(){
		if (t==null){
			t = new Thread(this, url);
			System.out.println("Starting thread: " +  url );
			t.start();
		}
	}

	
	public void run (){
		
		try{
			
			int input_byte;
			FileOutputStream out;
			int counter = 0;
			URL connection = new URL(url);
			
			if(connection.openConnection().getContentType().contains("text/*")){
				is_text = true;
			}
			if(a_flag && is_text){
				
				HtmlToAsciiInputStream input = HtmlToAsciiInputStream(connection.openStream());
				
			}else{
				InputStream input = connection.openStream();
			}
			
			File file = new File(url);
			String FileName = file.getName();
			String Name;
			String Extension;
			
			if(FileName.contains("www.")){
				Name = "index";
				Extension = ".html";
			}else{
				Name = FileName.substring(0,FileName.lastIndexOf("."));
				Extension = FileName.substring(FileName.lastIndexOf("."), FileName.length());
			}
						
			file = new File(Name+Extension);			
			
			if(!file.exists()){
				
				out = new FileOutputStream(file);
				
			}else{
				
				while (file.exists()){
					
					counter++;
					file = new File(Name+"("+counter+")"+Extension);
					
				}
				
				out = new FileOutputStream(file);
				
			}
			
			while((input_byte = input.read()) != -1){
				
				out.write(input_byte);
				
			}
			
			out.flush();
			out.close();
			
			System.out.println("Download Done: " +  url + "\nSaved as: " + file.getName());
			
		}catch (IOException ioe){
				
			System.out.println("Error Downloading: " +  url + "\nFile may not exist.");
					
		}
		
	}

}
