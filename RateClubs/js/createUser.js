function validate() {
	var p1 = document.getElementById('password');
	var p2 = document.getElementById('password2');
  var first = document.getElementById('f_name');
	var last = document.getElementById('l_name');
  var email = document.getElementById('email');
  var user = document.getElementById('username');
	var q = document.getElementById("error-msg");
	var e = document.getElementById("error-msg2");
	var u = document.getElementById("error-msg3");
	var f = document.getElementById("error-msg4");
	var l = document.getElementById("error-msg5");
	q.style.display = 'none';
	e.style.display = 'none';
	u.style.display = 'none';
	f.style.display = 'none';
	l.style.display = 'none';

	console.log(p1.value);
	console.log(p2.value);

	if (p1.value == p2.value && email.value !== '' && user.value !== '' && first !== '' && last !== '')
	{
		//document.getElementById().action = "";
		//document.getElementById().method = "post";
		document.getElementById('create-form').submit();
	}
	else {
        if (p1.value !== p2.value)
            q.style.display = 'block';
        else {
            if (email.value == '')
                e.style.display = 'block';
            else {
            	if(user.value == '')
                    u.style.display = 'block';
            	else {
            		if(first.value == '')
            			f.style.display = 'block';
            		else
            			l.style.display = 'block';

				}
			}

        }

    }
};



