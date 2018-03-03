package wget;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;

import wget.Download;

public class Wget {
	
	private static String read_from = "urls.txt";
	private static boolean a_flag = false;
	private static boolean zip_flag = false;
	private static boolean gz_flag = false;
	
	public static void main(String[] args){
		
		for(int i=0;i<args.length;i++){
			
			if(args[i].equals("-f")){
				System.out.println("Flag detected: -f");
				int a = 0;
				while(!args[a].endsWith(".txt") && a<args.length){
					a++;
				}
				if(args[a].endsWith(".txt")){
					read_from = args[a];
					System.out.println("Reading URL from: " + args[a]);
				}	
			}else if(args[i].equals("-a")){
				System.out.println("Flag detected: -a ::flag in development");
				a_flag = true;
			}else if(args[i].equals("-z")){
				System.out.println("Flag detected: -z ::flag in development");
				zip_flag = true;
			}else if(args[i].equals("-gz")){
				System.out.println("Flag detected: -gz ::flag in development");
				gz_flag = true;
			}
			
		}
		
		try {
			
			File text_file = new File(read_from);
			FileReader fileReader = new FileReader(text_file);
			BufferedReader bufferedReader = new  BufferedReader(fileReader);
			String line;
			Download download;
			
			while ((line = bufferedReader.readLine()) != null) {
				
				download = new Download(line, a_flag, zip_flag, gz_flag);
				download.start();

			}
			
			fileReader.close();
			
		} catch(IOException e){
			
			e.printStackTrace();
			
		}
		
	}	
	
}
