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
				elem.onblur = function(e) {
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
					element.title="El email es inválido!";
				}
				else
				{
					element.parentNode.parentNode.className =element.parentNode.parentNode.className.replace("has-error","");
					element.title=null;
				}
			}
			var cannot_be_blank =element.getAttribute("cannot-be-blank");
			if(cannot_be_blank!=null)
			{
				if(isNotBlank(element.value))
				{
					element.parentNode.parentNode.className =element.parentNode.parentNode.className+" has-error";
					element.title="El campo no puede estar vacio!";
				}
				else
				{
					element.parentNode.parentNode.className =element.parentNode.parentNode.className.replace("has-error","");
					element.title=null;
				}
			}
		}
		
		function validateEmail(email) { 
			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		} 
		function isNotBlank(str) {
			return (!str || /^\s*$/.test(str));
		}