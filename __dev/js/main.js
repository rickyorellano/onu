function myFunction() {
    var x = document.getElementById("myTopnav");
    var y = document.getElementById("h_links");
    if (x.className === "topnav") {
      x.className += " responsive";
      y.className += " responsive";
    } else {
      x.className = "topnav";
      y.className = "h_links";
    }
  }

  // When the user scrolls down 50px from the top of the document, resize some elements
window.onscroll = function() {scrollFunction()};

function scrollFunction() {

  let oImagen = document.getElementById("ima");
  
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("top_cont").style.lineHeight = "50px";
    oImagen.style.width = "75px";
    oImagen.style.height = "50px";
    

  } else {
    document.getElementById("top_cont").style.lineHeight = "100px";
    oImagen.style.width = "85px";
    oImagen.style.height = "60px";
  }
}

function closeMenu() {
  document.getElementById("myTopnav").className = "topnav";
  document.getElementById("h_links").className = "h_links"; 
}