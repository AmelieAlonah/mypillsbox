<?php

use Symfony\Component\Mime\Email;

$email = (new Email())
	->from('mypillsbox@gmail.com') 
	->to('amelie.abdallah@hotmail.fr') 
	//->cc('exemple@mail.com') 
	//->bcc('exemple@mail.com')
	//->replyTo('test42@gmail.com')
    	->priority(Email::PRIORITY_HIGH) 
    	->subject('I love Me')
	// If you want use text mail only
    	->text('Lorem ipsum...') 
	// Raw html
    	->html('<h1>Lorem ipsum</h1> <p>...</p>')
	;