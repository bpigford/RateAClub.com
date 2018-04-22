var prevSrc1 = 'images/star_empty.png';
var prevSrc2 = 'images/star_empty.png';
var prevSrc3 = 'images/star_empty.png';
var prevSrc4 = 'images/star_empty.png';
var prevSrc5 = 'images/star_empty.png';

function goToRemove() {
  window.location = "../PHP/removeRating.php";
};

function toggleEditComment(comId, text) {
  var w = document.getElementById('edit-comment-container');
  var e = document.getElementById('new-comment-container');
  if (e.style.display === "block")
  		e.style.display = "none";
     
  console.log(w);
  console.log(w.value);
  
    var q = document.getElementById('edit-comment-container');
  	if (q.style.display === "none")
  		q.style.display = "block";
  	else if (q.style.display === "block")
  		q.style.display = "none";
     
   document.getElementById('comIdE').value = comId;
   document.getElementById('commente').value = text;
};

function hovere(element) {
    switch (element.id)
    {
      case 'star-1e':
        prevSrc1 = document.getElementById('star-1e').getAttribute('src');
        document.getElementById('star-1e').setAttribute('src', 'images/star_hover.png');
        document.getElementById('star-2e').setAttribute('src', 'images/star_empty.png');
        document.getElementById('star-3e').setAttribute('src', 'images/star_empty.png');
        document.getElementById('star-4e').setAttribute('src', 'images/star_empty.png');
        document.getElementById('star-5e').setAttribute('src', 'images/star_empty.png');
        break;
      case 'star-2e':
        prevSrc1 = document.getElementById('star-1e').getAttribute('src');
        document.getElementById('star-1e').setAttribute('src', 'images/star_hover.png');
        prevSrc2 = document.getElementById('star-2e').getAttribute('src');
        document.getElementById('star-2e').setAttribute('src', 'images/star_hover.png');
        document.getElementById('star-3e').setAttribute('src', 'images/star_empty.png');
        document.getElementById('star-4e').setAttribute('src', 'images/star_empty.png');
        document.getElementById('star-5e').setAttribute('src', 'images/star_empty.png');
        break;
      case 'star-3e':
        prevSrc1 = document.getElementById('star-1e').getAttribute('src');
        document.getElementById('star-1e').setAttribute('src', 'images/star_hover.png');
        prevSrc2 = document.getElementById('star-2e').getAttribute('src');
        document.getElementById('star-2e').setAttribute('src', 'images/star_hover.png');
        prevSrc3 = document.getElementById('star-3e').getAttribute('src');
        document.getElementById('star-3e').setAttribute('src', 'images/star_hover.png');
        document.getElementById('star-4e').setAttribute('src', 'images/star_empty.png');
        document.getElementById('star-5e').setAttribute('src', 'images/star_empty.png');
        break;
      case 'star-4e':
        prevSrc1 = document.getElementById('star-1e').getAttribute('src');
        document.getElementById('star-1e').setAttribute('src', 'images/star_hover.png');
        prevSrc2 = document.getElementById('star-2e').getAttribute('src');
        document.getElementById('star-2e').setAttribute('src', 'images/star_hover.png');
        prevSrc3 = document.getElementById('star-3e').getAttribute('src');
        document.getElementById('star-3e').setAttribute('src', 'images/star_hover.png');
        prevSrc4 = document.getElementById('star-4e').getAttribute('src');
        document.getElementById('star-4e').setAttribute('src', 'images/star_hover.png');
        document.getElementById('star-5e').setAttribute('src', 'images/star_empty.png');
        break;
      case 'star-5e':
        prevSrc1 = document.getElementById('star-1e').getAttribute('src');
        document.getElementById('star-1e').setAttribute('src', 'images/star_hover.png');
        prevSrc2 = document.getElementById('star-2e').getAttribute('src');
        document.getElementById('star-2e').setAttribute('src', 'images/star_hover.png');
        prevSrc3 = document.getElementById('star-3e').getAttribute('src');
        document.getElementById('star-3e').setAttribute('src', 'images/star_hover.png');
        prevSrc4 = document.getElementById('star-4e').getAttribute('src');
        document.getElementById('star-4e').setAttribute('src', 'images/star_hover.png');
        prevSrc5 = document.getElementById('star-5e').getAttribute('src');
        document.getElementById('star-5e').setAttribute('src', 'images/star_hover.png');
        break;
    }
    console.log(prevSrc1);
    console.log(prevSrc2);
    console.log(prevSrc3);
    console.log(prevSrc4);
    console.log(prevSrc5);
}

function unhovere(element) {
    switch (element.id)
    {
      case 'star-1e':
        document.getElementById('star-1e').setAttribute('src', prevSrc1);
        document.getElementById('star-2e').setAttribute('src', prevSrc2);
        document.getElementById('star-3e').setAttribute('src', prevSrc3);
        document.getElementById('star-4e').setAttribute('src', prevSrc4);
        document.getElementById('star-5e').setAttribute('src', prevSrc5);
        break;
      case 'star-2e':
        document.getElementById('star-1e').setAttribute('src', prevSrc1);
        document.getElementById('star-2e').setAttribute('src', prevSrc2);
        document.getElementById('star-3e').setAttribute('src', prevSrc3);
        document.getElementById('star-4e').setAttribute('src', prevSrc4);
        document.getElementById('star-5e').setAttribute('src', prevSrc5);
        break;
      case 'star-3e':
        document.getElementById('star-1e').setAttribute('src', prevSrc1);
        document.getElementById('star-2e').setAttribute('src', prevSrc2);
        document.getElementById('star-3e').setAttribute('src', prevSrc3);
        document.getElementById('star-4e').setAttribute('src', prevSrc4);
        document.getElementById('star-5e').setAttribute('src', prevSrc5);
        break;
      case 'star-4e':
        document.getElementById('star-1e').setAttribute('src', prevSrc1);
        document.getElementById('star-2e').setAttribute('src', prevSrc2);
        document.getElementById('star-3e').setAttribute('src', prevSrc3);
        document.getElementById('star-4e').setAttribute('src', prevSrc4);
        document.getElementById('star-5e').setAttribute('src', prevSrc5);
        break;
      case 'star-5e':
        document.getElementById('star-1e').setAttribute('src', prevSrc1);
        document.getElementById('star-2e').setAttribute('src', prevSrc2);
        document.getElementById('star-3e').setAttribute('src', prevSrc3);
        document.getElementById('star-4e').setAttribute('src', prevSrc4);
        document.getElementById('star-5e').setAttribute('src', prevSrc5);
        break;
    }
}

function clickStare(element) {
    switch (element.id)
    {
      case 'star-1e':
        document.getElementById('star-1e').setAttribute('src', 'images/star_full.png');
        prevSrc1 = document.getElementById('star-1e').getAttribute('src');
        document.getElementById('star-2e').setAttribute('src', 'images/star_empty.png');
        prevSrc2 = document.getElementById('star-2e').getAttribute('src');
        document.getElementById('star-3e').setAttribute('src', 'images/star_empty.png');
        prevSrc3 = document.getElementById('star-3e').getAttribute('src');
        document.getElementById('star-4e').setAttribute('src', 'images/star_empty.png');
        prevSrc4 = document.getElementById('star-4e').getAttribute('src');
        document.getElementById('star-5e').setAttribute('src', 'images/star_empty.png');
        prevSrc5 = document.getElementById('star-5e').getAttribute('src');
        document.getElementById('star-ratinge').value = 1;
        break;
      case 'star-2e':
        document.getElementById('star-1e').setAttribute('src', 'images/star_full.png');
        prevSrc1 = document.getElementById('star-1e').getAttribute('src');
        document.getElementById('star-2e').setAttribute('src', 'images/star_full.png');
        prevSrc2 = document.getElementById('star-2e').getAttribute('src');
        document.getElementById('star-3e').setAttribute('src', 'images/star_empty.png');
        prevSrc3 = document.getElementById('star-3e').getAttribute('src');
        document.getElementById('star-4e').setAttribute('src', 'images/star_empty.png');
        prevSrc4 = document.getElementById('star-4e').getAttribute('src');
        document.getElementById('star-5e').setAttribute('src', 'images/star_empty.png');
        prevSrc5 = document.getElementById('star-5e').getAttribute('src');
        document.getElementById('star-ratinge').value = 2;
        break;
      case 'star-3e':
        document.getElementById('star-1e').setAttribute('src', 'images/star_full.png');
        prevSrc1 = document.getElementById('star-1e').getAttribute('src');
        document.getElementById('star-2e').setAttribute('src', 'images/star_full.png');
        prevSrc2 = document.getElementById('star-2e').getAttribute('src');
        document.getElementById('star-3e').setAttribute('src', 'images/star_full.png');
        prevSrc3 = document.getElementById('star-3e').getAttribute('src');
        document.getElementById('star-4e').setAttribute('src', 'images/star_empty.png');
        prevSrc4 = document.getElementById('star-4e').getAttribute('src');
        document.getElementById('star-5e').setAttribute('src', 'images/star_empty.png');
        prevSrc5 = document.getElementById('star-5e').getAttribute('src');
        document.getElementById('star-ratinge').value = 3;
        break;
      case 'star-4e':
        document.getElementById('star-1e').setAttribute('src', 'images/star_full.png');
        prevSrc1 = document.getElementById('star-1e').getAttribute('src');
        document.getElementById('star-2e').setAttribute('src', 'images/star_full.png');
        prevSrc2 = document.getElementById('star-2e').getAttribute('src');
        document.getElementById('star-3e').setAttribute('src', 'images/star_full.png');
        prevSrc3 = document.getElementById('star-3e').getAttribute('src');
        document.getElementById('star-4e').setAttribute('src', 'images/star_full.png');
        prevSrc4 = document.getElementById('star-4e').getAttribute('src');
        document.getElementById('star-5e').setAttribute('src', 'images/star_empty.png');
        prevSrc5 = document.getElementById('star-5e').getAttribute('src');
        document.getElementById('star-ratinge').value = 4;
        break;
      case 'star-5e':
        document.getElementById('star-1e').setAttribute('src', 'images/star_full.png');
        prevSrc1 = document.getElementById('star-1e').getAttribute('src');
        document.getElementById('star-2e').setAttribute('src', 'images/star_full.png');
        prevSrc2 = document.getElementById('star-2e').getAttribute('src');
        document.getElementById('star-3e').setAttribute('src', 'images/star_full.png');
        prevSrc3 = document.getElementById('star-3e').getAttribute('src');
        document.getElementById('star-4e').setAttribute('src', 'images/star_full.png');
        prevSrc4 = document.getElementById('star-4e').getAttribute('src');
        document.getElementById('star-5e').setAttribute('src', 'images/star_full.png');
        prevSrc5 = document.getElementById('star-5e').getAttribute('src');
        document.getElementById('star-ratinge').value = 5;
        break;
    }
}

function toggleLogin() {
  var w = document.getElementById('login-button');
  
  console.log(w);
  console.log(w.value);
  
  if (!w.value.includes('Login/Create'))
    window.location = 'PHP/logout.php';
  else
  {
    var q = document.getElementById('login-container');
  	if (q.style.display === "none")
  		q.style.display = "block";
  	else if (q.style.display === "block")
  		q.style.display = "none";
  }
};

function validate() {
	var p1 = document.getElementById('password');
	var p2 = document.getElementById('password2');
  var first = document.getElementById('f_name');
	var last = document.getElementById('l_name');
  var email = document.getElementById('email');
	var school = document.getElementById('college');
  var user = document.getElementById('username');
	var q = document.getElementById("error-msg");
	q.style.display = 'none';

	console.log(p1.value);
	console.log(p2.value);

	if (p1.value == p2.value && first.value !== '' && last.value !== '' && email.value !== '' && school.value !== '' && user.value !== '')
	{
		//document.getElementById().action = "";
		//document.getElementById().method = "post";
		document.getElementById('create-form').submit();
	}
	else
		q.style.display = 'block';
};