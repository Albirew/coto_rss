coto_rss
========

Correcteur externe pour RSS de sites web en carton

 ----------------------------------------------------------------------------
 « LICENCE BEERWARE » (Révision 42):
 <romain@albirew.fr> a créé ce fichier. Tant que vous conservez cet avertissement,
 vous pouvez faire ce que vous voulez de ce truc. Si on se rencontre un jour et
 que vous pensez que ce truc vaut le coup, vous pouvez me payer une bière en
 retour.
 ----------------------------------------------------------------------------
 
ToDo:
- pouvoir encoder les caractères spéciaux non encodés sans double-coder ceux déjà encodés (certains RSS mélangent les deux du genre titre avec & seul et contenu avec &amp;)

Historique des révisions:

rev.12 commenté la rev.10 en attendant de mieux (même les caractères déjà encodés étaient réencodés)
rev.11 ajout effacement de plusieures lignes avant <?xml
rev.10 changement & grace a preg_replace
rev.09 ajout caractère &
rev.08 ajout style et tracker piwik
rev.07 nettoyage du code, html5 valide
rev.06 mise en forme page + ajout exemple dans le champ rss du formulaire
rev.05 ajout formulaire
rev.04 ajout page si pas de RSS en entrée
rev.03 ajout caractère SUB
rev.02 ajout caractères BS et SI
rev.01 fichier initial
