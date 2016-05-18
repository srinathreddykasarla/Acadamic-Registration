        var flag = 0,element1;
		
		
		function selectYear()
		{
			var element1 = document.getElementById("stream");
		    var streamSelected = element1.options[element1.selectedIndex].text;
			var years = new Array("Year","First","Second","Third","Fourth");
			var para = document.getElementById("fields");
			
			var noofyears;
			switch(streamSelected)
			{
			case "BE/BTech":
			noofyears = 4;
			break;
			
			case "BCA":
			noofyears = 3;
			break;
			
			case "MCA":
			noofyears = 2;
			break;
			
			case "Diploma":
			noofyears = 3;
			break;
			}
			title = document.createElement("p");
			title.textContent = "Year";
			title.name = "yearlabel";
			title.id = "yearlabel";
			title.setAttribute("style", " color:#444;width:98px;float: left;text-align: right;margin-right: 2px;margin-top:0px;");
			para.appendChild(title);
            var element4 = document.createElement("select");
			element4.name = "year";
			element4.id = "year";
			for(var i =0; i < noofyears+1;i++)
			{
			var opts = new Option();
			opts.value = i;
			opts.text = years[i];
            element4.options.add(opts);
			}
			para.appendChild(element4);
			
			
		}
		function streamChanged() {
		
			var element1 = document.getElementById("stream");
			var element2 = document.getElementById("profession");
			var professionSelected = element2.options[element2.selectedIndex].text;
		    var streamSelected = element1.options[element1.selectedIndex].text;
			var branches = new Array("Branch","Electrical/Electronics","Computer Sciences/Information Technology");
			var para = document.getElementById("fields");
			
				   
		   var delbranch = document.getElementById("branch");
		   var delbranchlabel = document.getElementById("branchlabel");
		   
		   var delyear = document.getElementById("year");
		   var delyearlabel = document.getElementById("yearlabel");
		   
		    
		   if(delbranch && delbranchlabel){
		   delbranchlabel.parentNode.removeChild(delbranchlabel);
		   delbranch.parentNode.removeChild(delbranch);
		   }
		   
		   if(delyear && delyearlabel){
		   delyearlabel.parentNode.removeChild(delyearlabel);
		   delyear.parentNode.removeChild(delyear);
		   }
		   
			if((streamSelected == "BE/BTech") || (streamSelected == "Diploma"))
			{
			title = document.createElement("p");
			title.textContent = "Branch";
			title.name = "branchlabel";
			title.id = "branchlabel";
			title.setAttribute("style", " color:#444;width:98px;float: left;text-align: right;margin-right: 2px;margin-top:0px;");
			para.appendChild(title);
			
            var element4 = document.createElement("select");
			element4.name = "branch";
			element4.id = "branch";
			for(var i =0; i < branches.length;i++)
			{
			var opts = new Option();
			opts.value = i;
			opts.text = branches[i];
            element4.options.add(opts);
			}
			para.appendChild(element4);
			
			if(professionSelected == "Student")
			{
			element4.onchange = selectYear;
			}
			
			}
			else if(((streamSelected == "BCA") || (streamSelected == "MCA")) && (professionSelected == "Student")) 
			{
			selectYear();
			}
			
			
		
		}
		
		
        function addRow(tableID) {
            var optValue = document.getElementById("profession");
            var para = document.getElementById(tableID);
            
			
			var streams = new Array("Stream","BE/BTech","BCA","MCA","Diploma");
           
		   var deletestream = document.getElementById("stream");
		   var deletestreamlabel = document.getElementById("streamlabel");
		   
		   var delbranch = document.getElementById("branch");
		   var delbranchlabel = document.getElementById("branchlabel");
		   
		   var delyear = document.getElementById("year");
		   var delyearlabel = document.getElementById("yearlabel");
		   
		   if(deletestream && deletestreamlabel){
		   deletestreamlabel.parentNode.removeChild(deletestreamlabel);
		   deletestream.parentNode.removeChild(deletestream);
		   }
		   
		   if(delbranch && delbranchlabel){
		   delbranchlabel.parentNode.removeChild(delbranchlabel);
		   delbranch.parentNode.removeChild(delbranch);
		   }
		   
		   if(delyear && delyearlabel){
		   delyearlabel.parentNode.removeChild(delyearlabel);
		   delyear.parentNode.removeChild(delyear);
		   }
            if((optValue.value == "student") || (optValue.value == "graduate"))
			{
			title = document.createElement("p");
			title.textContent = "Stream";
			title.name = "streamlabel";
			title.id = "streamlabel";
			title.setAttribute("style", " color:#444;width:98px;float: left;text-align: right;margin-right: 2px;margin-top:0px;");
			para.appendChild(title);
			element1 = document.createElement("select");
			element1.name = "stream";
			element1.id = "stream";
			for(var i =0; i < streams.length;i++)
			{
			var opts = new Option();
			opts.value = i;
			opts.text = streams[i];
            element1.options.add(opts);
			}
			para.appendChild(element1);
			
			
			
			element1.onchange = streamChanged;
			
			
			}
          
			
			else if(optValue.value == "others")
			{
			title = document.createElement("p");
			title.textContent = "Specify Profession *";
			title.name = "proflabel";
			title.setAttribute("style", " color:#444;width:98px;float: left;text-align: right;margin-right: 2px;margin-top:0px;");
			para.appendChild(title);
            var element1 = document.createElement("input");
            element1.type = "text";
            element1.name = "specifyprofession";
			
			para.appendChild(element1);
		
			}
		
            
			}