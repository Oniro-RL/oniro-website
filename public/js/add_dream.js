var elements = document.getElementsByClassName('card-content');
re = /(http|https):\/\/image.noelshack.com\/fichiers\/(.*).(jpeg|png|jpg|gif)/;

for (i = 0; i < elements.length; i++) {
    noelshack_str = elements[i].innerHTML.match(re);
    
    if (noelshack_str) {
        console.log(noelshack_str)
        elements[i].innerHTML = elements[i].innerHTML.replace(new RegExp(re, 'g'), '<img src="' + noelshack_str[0] + '" height="60px" />');
        console.log(elements[i].innerHTML)
    }
}

var button_addDream = document.getElementById('adddream');
var show = false;

var form_adddream = document.getElementById('form_adddream');
form_adddream.style.visibility = 'hidden';
form_adddream.style.position = 'absolute';

button_addDream.addEventListener("click", function () {

		if (show) {
			form_adddream.style.visibility = 'hidden';
			form_adddream.style.position = 'absolute';
			button_addDream.innerHTML = "Ajouter un rêve";
			show = false
		} else {

    /*button_addDream.style.visibility = 'hidden';
    button_addDream.style.position = 'absolute';*/

    form_adddream.style.position = 'relative';
    form_adddream.style.visibility = 'visible';

    button_addDream.innerHTML = "Enlever le formulaire";
    show = true
  }
});


