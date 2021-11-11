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

function carousel(elem,dir){
	const container = elem.parentElement.parentElement.querySelector('.pics-container');
	if(dir==1){
		container.appendChild(container.children[0]);
	}else{
		container.insertBefore(container.lastChild,container.children[0]);
	}
}

function filter(elem){
	elem.classList.toggle('active-filter');
}

function sort(elem){
	var options = elem.parentElement.children;
	Array.from(options).map((val)=>{val.setAttribute('data-sort','0');});
	elem.setAttribute('data-sort','1');	
}