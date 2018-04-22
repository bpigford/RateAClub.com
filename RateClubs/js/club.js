var prevSrc1 = 'images/star_empty.png';
var prevSrc2 = 'images/star_empty.png';
var prevSrc3 = 'images/star_empty.png';
var prevSrc4 = 'images/star_empty.png';
var prevSrc5 = 'images/star_empty.png';

function toggleRate() {
  var w = document.getElementById('new-comment-container');
  var e = document.getElementById('edit-comment-container');
  if (e.style.display === "block")
  		e.style.display = "none";
     
  console.log(w);
  console.log(w.value);
  
    var q = document.getElementById('new-comment-container');
  	if (q.style.display === "none")
  		q.style.display = "block";
  	else if (q.style.display === "block")
  		q.style.display = "none";
};

function hover(element) {
    //prevSrc = element.getAttribute('src');
    switch (element.id)
    {
      case 'star-1':
        prevSrc1 = document.getElementById('star-1').getAttribute('src');
        document.getElementById('star-1').setAttribute('src', 'images/star_hover.png');
        //prevSrc2 = document.getElementById('star-2').getAttribute('src');
        document.getElementById('star-2').setAttribute('src', 'images/star_empty.png');
        //prevSrc3 = document.getElementById('star-3').getAttribute('src');
        document.getElementById('star-3').setAttribute('src', 'images/star_empty.png');
        //prevSrc4 = document.getElementById('star-4').getAttribute('src');
        document.getElementById('star-4').setAttribute('src', 'images/star_empty.png');
        //prevSrc5 = document.getElementById('star-5').getAttribute('src');
        document.getElementById('star-5').setAttribute('src', 'images/star_empty.png');
        break;
      case 'star-2':
        prevSrc1 = document.getElementById('star-1').getAttribute('src');
        document.getElementById('star-1').setAttribute('src', 'images/star_hover.png');
        prevSrc2 = document.getElementById('star-2').getAttribute('src');
        document.getElementById('star-2').setAttribute('src', 'images/star_hover.png');
        //prevSrc3 = document.getElementById('star-3').getAttribute('src');
        document.getElementById('star-3').setAttribute('src', 'images/star_empty.png');
        //prevSrc4 = document.getElementById('star-4').getAttribute('src');
        document.getElementById('star-4').setAttribute('src', 'images/star_empty.png');
        //prevSrc5 = document.getElementById('star-5').getAttribute('src');
        document.getElementById('star-5').setAttribute('src', 'images/star_empty.png');
        break;
      case 'star-3':
        prevSrc1 = document.getElementById('star-1').getAttribute('src');
        document.getElementById('star-1').setAttribute('src', 'images/star_hover.png');
        prevSrc2 = document.getElementById('star-2').getAttribute('src');
        document.getElementById('star-2').setAttribute('src', 'images/star_hover.png');
        prevSrc3 = document.getElementById('star-3').getAttribute('src');
        document.getElementById('star-3').setAttribute('src', 'images/star_hover.png');
        //prevSrc4 = document.getElementById('star-4').getAttribute('src');
        document.getElementById('star-4').setAttribute('src', 'images/star_empty.png');
        //prevSrc5 = document.getElementById('star-5').getAttribute('src');
        document.getElementById('star-5').setAttribute('src', 'images/star_empty.png');
        break;
      case 'star-4':
        prevSrc1 = document.getElementById('star-1').getAttribute('src');
        document.getElementById('star-1').setAttribute('src', 'images/star_hover.png');
        prevSrc2 = document.getElementById('star-2').getAttribute('src');
        document.getElementById('star-2').setAttribute('src', 'images/star_hover.png');
        prevSrc3 = document.getElementById('star-3').getAttribute('src');
        document.getElementById('star-3').setAttribute('src', 'images/star_hover.png');
        prevSrc4 = document.getElementById('star-4').getAttribute('src');
        document.getElementById('star-4').setAttribute('src', 'images/star_hover.png');
        //prevSrc5 = document.getElementById('star-5').getAttribute('src');
        document.getElementById('star-5').setAttribute('src', 'images/star_empty.png');
        break;
      case 'star-5':
        prevSrc1 = document.getElementById('star-1').getAttribute('src');
        document.getElementById('star-1').setAttribute('src', 'images/star_hover.png');
        prevSrc2 = document.getElementById('star-2').getAttribute('src');
        document.getElementById('star-2').setAttribute('src', 'images/star_hover.png');
        prevSrc3 = document.getElementById('star-3').getAttribute('src');
        document.getElementById('star-3').setAttribute('src', 'images/star_hover.png');
        prevSrc4 = document.getElementById('star-4').getAttribute('src');
        document.getElementById('star-4').setAttribute('src', 'images/star_hover.png');
        prevSrc5 = document.getElementById('star-5').getAttribute('src');
        document.getElementById('star-5').setAttribute('src', 'images/star_hover.png');
        break;
    }
    console.log(prevSrc1);
    console.log(prevSrc2);
    console.log(prevSrc3);
    console.log(prevSrc4);
    console.log(prevSrc5);
    //element.setAttribute('src', 'images/star_hover.png');
}

function unhover(element) {
    switch (element.id)
    {
      case 'star-1':
        document.getElementById('star-1').setAttribute('src', prevSrc1);
        document.getElementById('star-2').setAttribute('src', prevSrc2);
        document.getElementById('star-3').setAttribute('src', prevSrc3);
        document.getElementById('star-4').setAttribute('src', prevSrc4);
        document.getElementById('star-5').setAttribute('src', prevSrc5);
        break;
      case 'star-2':
        document.getElementById('star-1').setAttribute('src', prevSrc1);
        document.getElementById('star-2').setAttribute('src', prevSrc2);
        document.getElementById('star-3').setAttribute('src', prevSrc3);
        document.getElementById('star-4').setAttribute('src', prevSrc4);
        document.getElementById('star-5').setAttribute('src', prevSrc5);
        break;
      case 'star-3':
        document.getElementById('star-1').setAttribute('src', prevSrc1);
        document.getElementById('star-2').setAttribute('src', prevSrc2);
        document.getElementById('star-3').setAttribute('src', prevSrc3);
        document.getElementById('star-4').setAttribute('src', prevSrc4);
        document.getElementById('star-5').setAttribute('src', prevSrc5);
        break;
      case 'star-4':
        document.getElementById('star-1').setAttribute('src', prevSrc1);
        document.getElementById('star-2').setAttribute('src', prevSrc2);
        document.getElementById('star-3').setAttribute('src', prevSrc3);
        document.getElementById('star-4').setAttribute('src', prevSrc4);
        document.getElementById('star-5').setAttribute('src', prevSrc5);
        break;
      case 'star-5':
        document.getElementById('star-1').setAttribute('src', prevSrc1);
        document.getElementById('star-2').setAttribute('src', prevSrc2);
        document.getElementById('star-3').setAttribute('src', prevSrc3);
        document.getElementById('star-4').setAttribute('src', prevSrc4);
        document.getElementById('star-5').setAttribute('src', prevSrc5);
        break;
    }
    //element.setAttribute('src', prevSrc);
}

function clickStar(element) {
    switch (element.id)
    {
      case 'star-1':
        document.getElementById('star-1').setAttribute('src', 'images/star_full.png');
        prevSrc1 = document.getElementById('star-1').getAttribute('src');
        document.getElementById('star-2').setAttribute('src', 'images/star_empty.png');
        prevSrc2 = document.getElementById('star-2').getAttribute('src');
        document.getElementById('star-3').setAttribute('src', 'images/star_empty.png');
        prevSrc3 = document.getElementById('star-3').getAttribute('src');
        document.getElementById('star-4').setAttribute('src', 'images/star_empty.png');
        prevSrc4 = document.getElementById('star-4').getAttribute('src');
        document.getElementById('star-5').setAttribute('src', 'images/star_empty.png');
        prevSrc5 = document.getElementById('star-5').getAttribute('src');
        document.getElementById('star-rating').value = 1;
        break;
      case 'star-2':
        document.getElementById('star-1').setAttribute('src', 'images/star_full.png');
        prevSrc1 = document.getElementById('star-1').getAttribute('src');
        document.getElementById('star-2').setAttribute('src', 'images/star_full.png');
        prevSrc2 = document.getElementById('star-2').getAttribute('src');
        document.getElementById('star-3').setAttribute('src', 'images/star_empty.png');
        prevSrc3 = document.getElementById('star-3').getAttribute('src');
        document.getElementById('star-4').setAttribute('src', 'images/star_empty.png');
        prevSrc4 = document.getElementById('star-4').getAttribute('src');
        document.getElementById('star-5').setAttribute('src', 'images/star_empty.png');
        prevSrc5 = document.getElementById('star-5').getAttribute('src');
        document.getElementById('star-rating').value = 2;
        break;
      case 'star-3':
        document.getElementById('star-1').setAttribute('src', 'images/star_full.png');
        prevSrc1 = document.getElementById('star-1').getAttribute('src');
        document.getElementById('star-2').setAttribute('src', 'images/star_full.png');
        prevSrc2 = document.getElementById('star-2').getAttribute('src');
        document.getElementById('star-3').setAttribute('src', 'images/star_full.png');
        prevSrc3 = document.getElementById('star-3').getAttribute('src');
        document.getElementById('star-4').setAttribute('src', 'images/star_empty.png');
        prevSrc4 = document.getElementById('star-4').getAttribute('src');
        document.getElementById('star-5').setAttribute('src', 'images/star_empty.png');
        prevSrc5 = document.getElementById('star-5').getAttribute('src');
        document.getElementById('star-rating').value = 3;
        break;
      case 'star-4':
        document.getElementById('star-1').setAttribute('src', 'images/star_full.png');
        prevSrc1 = document.getElementById('star-1').getAttribute('src');
        document.getElementById('star-2').setAttribute('src', 'images/star_full.png');
        prevSrc2 = document.getElementById('star-2').getAttribute('src');
        document.getElementById('star-3').setAttribute('src', 'images/star_full.png');
        prevSrc3 = document.getElementById('star-3').getAttribute('src');
        document.getElementById('star-4').setAttribute('src', 'images/star_full.png');
        prevSrc4 = document.getElementById('star-4').getAttribute('src');
        document.getElementById('star-5').setAttribute('src', 'images/star_empty.png');
        prevSrc5 = document.getElementById('star-5').getAttribute('src');
        document.getElementById('star-rating').value = 4;
        break;
      case 'star-5':
        document.getElementById('star-1').setAttribute('src', 'images/star_full.png');
        prevSrc1 = document.getElementById('star-1').getAttribute('src');
        document.getElementById('star-2').setAttribute('src', 'images/star_full.png');
        prevSrc2 = document.getElementById('star-2').getAttribute('src');
        document.getElementById('star-3').setAttribute('src', 'images/star_full.png');
        prevSrc3 = document.getElementById('star-3').getAttribute('src');
        document.getElementById('star-4').setAttribute('src', 'images/star_full.png');
        prevSrc4 = document.getElementById('star-4').getAttribute('src');
        document.getElementById('star-5').setAttribute('src', 'images/star_full.png');
        prevSrc5 = document.getElementById('star-5').getAttribute('src');
        document.getElementById('star-rating').value = 5;
        break;
    }
    //prevSrc = element.getAttribute('src');
}