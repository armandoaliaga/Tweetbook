		var typingTimer;                
		var doneTypingInterval = 650; 
		var elems = document.getElementsByClassName("form-control");
		function addErrorsHandler()
		{
			for(var i=0;i<elems.length;i++)
			{
				var elem = elems[i]
				elem.onkeyup = function(e) {
												clearTimeout(typingTimer);
                                                    typingTimer = setTimeout(function() {checkErrors(e.target)}, doneTypingInterval);
                                                  }
                        }
		}

		function checkErrors(element)
		{
		    var is_email =element.getAttribute("is-email");
			if(is_email!=null)
			{
				if(!validateEmail(element.value)==true)
				{
					element.parentNode.parentNode.className =element.parentNode.parentNode.className+" has-error";
				}
				else
				{
					element.parentNode.parentNode.className =element.parentNode.parentNode.className.replace("has-error","");
				}
			}
		}
		
		function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 