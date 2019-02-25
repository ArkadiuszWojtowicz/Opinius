<?php

$title = "Kontakt";
?>
<!--<script>

function mail_form(f)
{
	function url_encode(text)
	{
		return text.replace(/%/g, '%25').replace(/\?/g, '%3F').replace(/=/g, '%3D').replace(/&/g, '%26').replace(/#/g, '%23').replace(/\r/g, '%0D').replace(/\n/g, '%0A');
	}
	
	for (var i = 0, text = ''; i < f.elements.length; i++)
	{
		if (f.elements[i].name == '' || f.elements[i].disabled) continue;
		switch (f.elements[i].type)
		{
			case 'radio':
			case 'checkbox':
				if (f.elements[i].checked) text += url_encode(f.elements[i].name) + '=' + url_encode(f.elements[i].value) + "%0A";
			break;
			case 'select':
			case 'select-one':
			case 'select-multiple':
				for (var j = 0; j < f.elements[i].options.length; j++)
				{
					if (f.elements[i].options[j].selected) text += url_encode(f.elements[i].name) + '=' + url_encode(f.elements[i].options[j].value != '' ? f.elements[i].options[j].value : f.elements[i].options[j].text) + "%0A";
				}
			break;
			default:
				text += url_encode(f.elements[i].name) + '=' + url_encode(f.elements[i].value) + "%0A";
			break;
		}
	}

	window.location.href = f.action + (f.action.indexOf('?') == -1 ? '?' : '&') + 'body=' + text;
}
</script>-->

<?php
session_start();

//mail("usor0192@wp.pl", "Witaj", "wiadomość");

$mojemail = 'usor0192@wp.pl';
$contentLOG = '           
                        

                        <h2> Kontakt </h2>
                        <p>Masz pytanie? Napisz do admina.</p>                       
                        <p>Odpowiem najszybciej jak to możliwe ;)</p><br>
                    <form action="mailto:'. $mojemail .'" method="post" class="logowanie" enctype="text/plain" onsubmit="mail_form(this); return false"> 
                        <div class="addReview">
                        <p>Temat:</p>
                        <input type="text" name="nazwa" class="addReview" required><br>                        
                        <p>Treść:</p>
                        <textarea rows="6" cols="50" name="opinia" class="addReview" required></textarea><br>
                        <input type="submit" class="addReview" value="Wyślij"><br>                        
                        </div>
                        
                    </form>    

';

                        
$content = '
                        <h2>Kontakt</h2>                         
                        <p>Masz pytanie? Napisz do admina!</p>
                        <p>Odpowiem najszybciej jak to możliwe ;)</p><br>
                        <form action="mailto:'. $mojemail .'" method="post" class="logowanie" enctype="text/plain" onsubmit="mail_form(this); return false"> 
                        <div class="addReview">
                        Temat:<br>
                        <input type="text" name="nazwa" class="addReview" required><br>                        
                        Treść:
                        <textarea rows="6" cols="70" name="opinia" class="addReview" required></textarea><br>
                        <input type="submit" class="addReview" value="Wyślij"><br>                        
                        </div>
                    </form>
';

                        
$contentAdmin = '
                        <h2>Kontakt</h2>                         
                        <p>Masz pytanie? Napisz do admina.</p>
                        <p>Odpowiem najszybciej jak to możliwe ;)</p>
                        
                        <h3 style="text-align:left; margin-bottom:20px;">Nadaj prawa admina</h3>
                  ';
if (isset($_SESSION['name'])) { // info o zmianie statusu użytkownika
    $contentAdmin .= '
                            <div class="addReview">' . $_SESSION['name'] . '</div>
                        ';
    unset($_SESSION['name']);
}
$contentAdmin .= '
                    <form action="scripts/setAdmin.php" method="post" class="addReview"> 
                        <div class="addReview">
                        <p>Nazwa użytkownika:</p>
                        <input type="text" name="nazwa" class="addReview" required><br>                       
                        <input type="submit" value="Zatwierdź" class="addReview" ><br>                                                
                        </div>
                    </form>    
                    
                    <h3 style="text-align:left; margin-bottom:20px;">Odbierz prawa admina</h3>
';
if (isset($_SESSION['downGradeStatus'])) { // info o błędnej zmianie statusu użytkownika
    $contentAdmin .= '
                            <div class="addReview">' . $_SESSION['downGradeStatus'] . '</div>
                        ';
    unset($_SESSION['downGradeStatus']);
}
$contentAdmin .= '
                    <form action="scripts/setAdmin.php" method="post" class="addReview"> 
                        <div class="addReview">
                        <p>Nazwa użytkownika:</p>
                        <input type="text" name="nazwa2" class="addReview" required><br>                       
                        <input type="submit" value="Zatwierdź" class="addReview deleteButton"><br>                                                
                        </div>
                    </form>    
';
