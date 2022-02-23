function repeatAnim(elem) {
	elem.style.animation = 'none';
	elem.offsetHeight; /* trigger reflow */
	elem.style.animation = null;
}

function rate(elem) {
	const parent = elem.parentElement;
	const rating = elem.getAttribute('data-rate');
	for (var i = 0; i < parent.children.length; i++) {
		if (parseInt(parent.children[i].getAttribute('data-rate')) <= parseInt(elem.getAttribute('data-rate'))) {
			parent.children[i].classList.add('select');
		} else {
			try {
				parent.children[i].classList.remove('select');
			} catch (err) {}
		}
	}
	/* Insert value in hidden input named "stars" within parent form */
	parent.parentElement.querySelector('input[name="stars"]').value = rating;
}

function carousel(elem, dir) {
	const container = elem.parentElement.parentElement.querySelector('.pics-container');
	if (dir == 1) {
		container.appendChild(container.children[0]);
	} else {
		container.insertBefore(container.lastChild, container.children[0]);
	}

}

function filter(elem) {
	elem.classList.toggle('active');
}

function select(elem, multiple = false) {
	elem.classList.toggle('active');
	if (multiple) {
		var options = elem.parentElement.children;
		Array.from(options).map((val) => {
			val.classList.remove('active');
		});
		elem.classList.add('active');
	}
}

function sort(elem) {
	if (elem.getAttribute('data-sort') == '1') {
		if (elem.getAttribute('data-order') == '1') {
			elem.setAttribute('data-order', '-1');
			return;
		} else {
			elem.setAttribute('data-order', '1');
			return;
		}
	}
	var options = elem.parentElement.children;
	Array.from(options).map((val) => {
		val.setAttribute('data-sort', '0');
	});
	elem.setAttribute('data-sort', '1');
}

function filtersToggle(selector, elem = false) {
	if (elem) {
		elem.classList.toggle('icon-selected');
	}
	let target = document.querySelector(`${selector}`);
	target.getAttribute('data-open') == 0 ? target.setAttribute('data-open', 1) : target.setAttribute('data-open', 0);
}

function colExpand(elem, target) {
	document.querySelector(target).classList.toggle('expand');
}

function killpopIMG(selector) {
	document.querySelector(selector).remove();
	item_anchor = 0;
	column_anchor = 0;
	popLock = 0;
}

var anchor;
var item_anchor = 0;
var column_anchor = 0;
var popLock = 0;

function popGallery(elem) {
	anchor = elem;
	var item = elem.getAttribute('data-count');
	var itemCol = elem.parentElement.getAttribute('data-column');
	//BG
	var popBG = document.createElement('div');
	popBG.id = 'pop';
	popBG.style = "background-color:rgb(0 0 0 / 85%);width: 100vw;height: 100vh;position: fixed;top: 0px;left:0px;z-index: 20;";

	//Exit
	var popExit = document.createElement('div');
	popExit.innerText = '✖';
	popExit.style = "width: 25px;height: 25px;background-color: #ff0000;position: absolute;top: 5%;right: 7%;color: rgb(255, 255, 255);text-align: center;font-weight: bolder;cursor: pointer;z-index: 1;font-family: 'Manrope';"
	popExit.setAttribute('onclick', 'killpopIMG("#pop")');
	popBG.appendChild(popExit);

	//img container

	var cont = document.createElement('div');
	popBG.appendChild(cont);


	//IMG
	var img = document.createElement('img');
	img.id = 'popImage';
	img.src = elem.src;
	img.style = ""
	cont.appendChild(img);

	//FF
	var ff = document.createElement('div');
	ff.innerHTML = 'ᐅ';
	ff.style = "position: absolute;top: 80%;right: 25%;color: rgb(255, 255, 255);font-size: 30px;cursor: pointer;width: 50px;height: 50px;text-align: center;border-radius: 50px;"
	ff.setAttribute('onclick', `nextIMG(this,1)`);
	ff.id = 'ff';
	popBG.appendChild(ff);

	//B
	var b = document.createElement('div');
	b.innerHTML = 'ᐊ';
	b.style = "position: absolute;top: 80%;left: 25%;color: rgb(255, 255, 255);font-size: 30px;cursor: pointer;width: 50px;height: 50px;text-align: center;border-radius: 50px;"
	b.setAttribute('onclick', `nextIMG(this,-1)`);
	b.id = 'bb';
	popBG.appendChild(b);
	document.body.insertBefore(popBG, document.body.firstChild);



}



function nextIMG(elem, dir) {
	if (dir == 1) {
		if (anchor.nextElementSibling) {
			document.querySelector('#popImage').src = anchor.nextElementSibling.getAttribute('src');
			document.querySelector('#popImage').src = '/wp-content/themes/forts/images/load.gif';
			document.querySelector('#popImage').src = anchor.nextElementSibling.getAttribute('src');
			repeatAnim(document.querySelector('#popImage'));
			anchor = anchor.nextElementSibling;
		}
	} else {
		if (anchor.previousElementSibling) {
			document.querySelector('#popImage').src = anchor.previousElementSibling.getAttribute('src');

			document.querySelector('#popImage').src = '/wp-content/themes/forts/images/load.gif';
			document.querySelector('#popImage').src = anchor.previousElementSibling.getAttribute('src');
			repeatAnim(document.querySelector('#popImage'));
			anchor = anchor.previousElementSibling;
		}
	}
}

document.onkeydown = checkKey;

function checkKey(e) {
	try {

		e = e || window.event;

		if (e.keyCode == '38') {
			// up arrow
		} else if (e.keyCode == '40') {
			// down arrow
		} else if (e.keyCode == '37') {
			// left arrow
			document.getElementById('bb').click();
		} else if (e.keyCode == '39') {
			// right arrow
			document.getElementById('ff').click();
		}
	} catch (err) {}

}