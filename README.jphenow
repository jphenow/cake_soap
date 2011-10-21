There are only a few things that require attention when examining the application because a chunk of the code sitting in the directory is simply framework.

I didn't work under the /cake directory, only the /app directory. To limit even further, I only really worked within the confines of /app/{models,controllers,views}. There was a minor configuration made under the /app/config directory, which is described in more detail in the documentation for my 'game' model.

Also, if its of interest to anyone looking at the source, I utlized git, so if you'd like to have a gander at some of my workflow, which eventually turned into a real workflow, please have a look at the `git log` or use gitk.

You'll also need to add this to your databse.php:
	class DATABASE_CONFIG {
		var $soap = array(
			'datasource' => 'soap',
			'wsdl' => 'http://change.me'
		);
	}

You may wish to have a look directly at SoapSource for additional options - https://github.com/Pagebakers/soapsource

Jon Phenow <j.phenow@gmail.com>
