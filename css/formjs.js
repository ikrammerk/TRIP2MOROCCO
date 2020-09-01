const form = document.getElementById('form');
const name1 = document.getElementById('name1');
const nom = document.getElementById('nom');
const telephone = document.getElementById('telephone');
const Adresse = document.getElementById('Adresse');
const postal = document.getElementById('postal');
const Email = document.getElementById('Email');
const passe = document.getElementById('passe');
const passe2 = document.getElementById('passe2');

form.addEventListener('submit', e => {
	e.preventDefault();

	checkInputs();
});

function checkInputs() {
	// trim to remove the whitespaces
	const name1Value = name1.value.trim();
	const nomValue = nom.value.trim();
	const telephoneValue = telephone.value.trim();
	const AdresseValue = Adresse.value.trim();
  const postalValue = postal.value.trim();
	const EmailValue =  Email.value.trim();
	const passeValue = passe.value.trim();
	const passe2Value = passe2.value.trim();


  if(name1Value === '') {
		setErrorFor(name1, 'Username cannot be blank');
	} else {
		setSuccessFor(name1);
	}
  if(nomValue === '') {
		setErrorFor(nom, 'Username cannot be blank');
	} else {
		setSuccessFor(nom);
	}
  if(telephoneValue === '') {
		setErrorFor(telephone, 'Username cannot be blank');
	} else {
		setSuccessFor(telephone);
	}
  if(AdresseValue === '') {
		setErrorFor(Adresse, 'Username cannot be blank');
	} else {
		setSuccessFor(Adresse);
	}
  if(postal === '') {
		setErrorFor(postal, 'Username cannot be blank');
	} else {
		setSuccessFor(postal);
	}

	if(EmailValue === '') {
		setErrorFor(Email, 'Email cannot be blank');
	} else if (!isEmail(EmailValue)) {
		setErrorFor(Email, 'Not a valid email');
	} else {
		setSuccessFor(Email);
	}

	if(passeValue === '') {
		setErrorFor(passe, 'Password cannot be blank');
	} else {
		setSuccessFor(passe);
	}

	if(passe2Value === '') {
		setErrorFor(passe2, 'Password2 cannot be blank');
	} else if(passeValue !== passe2Value) {
		setErrorFor(passe2, 'Passwords does not match');
	} else{
		setSuccessFor(passe2);
	}
}
function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}

function isEmail(Email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(Email);
}
