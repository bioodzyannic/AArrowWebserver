function repeatAnim(elem){
	elem.style.animation = 'none';
  	elem.offsetHeight; /* trigger reflow */
  	elem.style.animation = null;
}

function rate(elem){
	const parent = elem.parentElement;
	const rating = elem.getAttribute('data-rate');
	for(var i=0;i<parent.children.length;i++){
		if(parseInt(parent.children[i].getAttribute('data-rate'))<=parseInt(elem.getAttribute('data-rate'))){
			parent.children[i].classList.add('select');
		}else{
			try{parent.children[i].classList.remove('select');}catch(err){}
		}
	}
	/* Insert value in hidden input named "stars" within parent form */
	parent.parentElement.querySelector('input[name="stars"]').value = rating;
}