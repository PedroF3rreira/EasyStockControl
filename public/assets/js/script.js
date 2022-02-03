document.querySelector('.menu-mobile').addEventListener('click', el =>{

		let aside = document.querySelector('.side-bar-area').style.display
		
		if(aside == 'flex'){
			document.querySelector('.side-bar-area').style.display = 'none';
		}
		else{
			document.querySelector('.side-bar-area').style.display = 'flex';	
		}
		
});