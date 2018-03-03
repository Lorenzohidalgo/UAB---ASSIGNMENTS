package wget;

import java.io.FilterInputStream;
import java.io.IOException;
import java.io.InputStream;

public class HtmlToAsciiInputStream extends FilterInputStream{
	
	protected HtmlToAsciiInputStream(InputStream in) {
		super(in);
	}
	
	public int read() {
	    int chr = -1;
	    int counter = 0;
	    
	    try{
	    	if((chr = super.read()) == '<'){
		    	while((chr = super.read()) != '>' && counter != 0){
		    		if(chr == '>'){
		    			counter++;
		    		}else if(chr == '>'){
		    			counter--;
		    		}
		    	}
		    	
		    	chr = this.read();
		    }	
	    }catch (IOException e) {
			e.printStackTrace();
		}
	    
	    return chr;
	}

}
