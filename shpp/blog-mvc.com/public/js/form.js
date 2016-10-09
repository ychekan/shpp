/** The method on corect input password */
function formValidatePass(val)
{
	if (corectPass(val))
		document.getElementById('pass').value = val;	
	else
		alert("Password length is incorrect (min 6 and max 18) or invalid character.");
}

/** The check of validate password */
function corectPass(val)
{	
	return (/^[a-z0-9_-]{6,18}$/i.test(val));
}
///

/** The method on corect input users */
function formValidateUser(val)
{
	if (userLogin(val))
		document.getElementById('user').innerHTML = val;	
	else
		alert("Password length is incorrect");
}

/** The check of validate username */
function userLogin(val)
{
	return (/^[a-z0-9_-]{3,16}$/.test(val));
}

///

/** The method on corect input e-mail */
function formValidateMail(val)
{
	if (userMail(val))
		document.getElementById('mail').innerHTML = val;	
	else
		alert("Password length is incorrect");
}

/** The check of validate e-mail */
function userMail(val)
{
	return (/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/.test(val));
}

/** The check of first and second password equal */
function formValidateSecond()
{
	var passFirst = document.getElementById('password').value;
	var passSecond = document.getElementById('password2').value;
	
	if (passFirst == passSecond)
		return passFirst;
	else
		alert('First and second password not equal!');
}

/** The randomly generated hesh-key */
window.onload = function ()
{
	alert( Math.random() * (1 + 3));
	//alert('saf');
	//document.getElementById('hesh').innerHTML = res;
}