# coto_rss



# Description
coto_rss is a PHP project capable of correcting faulty RSS feeds rampaging around the web (can also be used as a simple RSS feed proxy)

# Requirements
* PHP 5+
* `openssl` extension enabled in PHP config (`php.ini`)
* `allow_url_fopen=1` in `php.ini`

# Roadmap
* be able to encode unencoded special characters without double encoding those already encoded (some RSS mix the two, for example title with "&" alone and content with "&amp")

# Changelog
* rev.19a updated readme and license
* rev.19 removed content-type rss (since it makes browsers to download page instead of showing it)
* rev.18 added option in curl to allow get from websites with bad cert
* rev.17 replaced JS with a placeholder in the form
* rev.16 added mb_convert_encoding to clear multi-bit encoded characters truncated in the middle.
* rev.15 replaced file_get_contents with cURL
* rev.14 replaced commands to delete everything before <?xml with stristr
* rev.13 removed an "OK" string at start of some feeds o_O
* rev.12 commented out rev.10 waiting for better (even already encoded characters were re-encoded)
* rev.11 added deletion of several lines before <?xml
* rev.10 changed "&" thanks to preg_replace
* rev.09 added character "&" to the code
* rev.08 added style
* rev.07 code cleanup, valid html5
* rev.06 page formatting + add example in rss field of form
* rev.05 add form
* rev.04 add page if no RSS in input
* rev.03 added removal of SUB character
* rev.02 add deletion of BS and SI characters
* rev.01 initial release (remove "ETX" invisible characters)

# Contact
Mastodon: https://soshar.dess.ga/@Albirew
Twitter: https://twitter.com/Albirew

# Demolink
http://albirew.fr/bordel/coto_rss.php

# Licence
DON'T BE A DICK PUBLIC LICENSE (https://dbad-license.org/)

