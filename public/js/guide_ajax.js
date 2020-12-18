var guide_content = document.getElementById('guide_content');
guide_content.style.visibility = 'hidden';

var guide_txt = document.getElementById('guide_txt');

var guide_sommaire = document.getElementById('guide_sommaire');
guide_sommaire.style.visibility = 'visible';

var introduction_request = document.getElementById('introduction_request');
var wild_request = document.getElementById('wild_request');
var applications_mobiles_request = document.getElementById('applications_mobiles_request');

introduction_request.addEventListener("click", function() {
    var ajax = new XMLHttpRequest;
    ajax.open("GET", "public/guide/introduction.html");
    ajax.addEventListener("readystatechange", function () {
        if (ajax.readyState === XMLHttpRequest.DONE && ajax.status === 200) {
            guide_sommaire.style.visibility = 'hidden';
            guide_sommaire.style.position = 'absolute';
            guide_content.style.visibility = 'visible';
            
            guide_txt.innerHTML = ajax.responseText;
        }
    });
    ajax.send(null)
})

wild_request.addEventListener("click", function() {
    var ajax = new XMLHttpRequest;
    ajax.open("GET", "public/guide/wild.html");
    ajax.addEventListener("readystatechange", function () {
        if (ajax.readyState === XMLHttpRequest.DONE && ajax.status === 200) {
            guide_sommaire.style.visibility = 'hidden';
            guide_sommaire.style.position = 'absolute';
            guide_content.style.visibility = 'visible';
            
            guide_txt.innerHTML = ajax.responseText;
        }
    });
    ajax.send(null)
})

applications_mobiles_request.addEventListener("click", function() {
    var ajax = new XMLHttpRequest;
    ajax.open("GET", "public/guide/applications_mobiles.html");
    ajax.addEventListener("readystatechange", function () {
        if (ajax.readyState === XMLHttpRequest.DONE && ajax.status === 200) {
            guide_sommaire.style.visibility = 'hidden';
            guide_sommaire.style.position = 'absolute';
            guide_content.style.visibility = 'visible';
            
            guide_txt.innerHTML = ajax.responseText;
        }
    });
    ajax.send(null)
})
