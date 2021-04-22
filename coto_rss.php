<?php
/*
 * ----------------------------------------------------------------------------
 * « LICENCE BEERWARE » (Révision 42):
 * <romain@albirew.fr> a créé ce fichier. Tant que vous conservez cet avertissement,
 * vous pouvez faire ce que vous voulez de ce truc. Si on se rencontre un jour et
 * que vous pensez que ce truc vaut le coup, vous pouvez me payer une bière en
 * retour.
 * ----------------------------------------------------------------------------
 */
$revision='21';
function better_file_get_content($url)
{
  $user_agent='Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';
  $options = array(
    CURLOPT_CUSTOMREQUEST =>"GET",
    CURLOPT_POST =>false,
    CURLOPT_USERAGENT => $user_agent,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => false,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_AUTOREFERER => true,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_CONNECTTIMEOUT => 120,
    CURLOPT_TIMEOUT => 120,
    CURLOPT_MAXREDIRS => 10,
  );
  $ch = curl_init( $url );
  curl_setopt_array( $ch, $options );
  $content = curl_exec( $ch );
  $err = curl_errno( $ch );
  $errmsg = curl_error( $ch );
  $header = curl_getinfo( $ch );
  curl_close( $ch );
  $header['errno'] = $err;
  $header['errmsg'] = $errmsg;
  $header['content'] = $content;
  return $header;
}

function clean_rss($url)
{
  $source = better_file_get_content($url);
  $corrige = stristr($source['content'], '<?xml');
  $corrige = str_replace("" , "", $corrige);
  $corrige = str_replace("" , "", $corrige);
  $corrige = str_replace("" , "", $corrige);
  $corrige = str_replace("" , "", $corrige);
  ini_set('mbstring.substitute_character', "none");
  $corrige = mb_convert_encoding($corrige, 'UTF-8', 'UTF-8'); 
  return $corrige;
}

if(isset($_GET['rss']))
{
  $rss = $_GET['rss'];
  if(!preg_match('/http[s]?:\/\//', $rss, $matches)) $rss = 'http://'.$rss;
  header("Pragma: no-cache");
  echo clean_rss($rss);
} 
else 
{
  echo '<!doctype html>
<html style="min-height: 100%;">
  <head>
    <meta charset="utf-8">
    <title>Correcteur de RSS pour sites web en carton</title>
    <meta name="description" content="Correcteur de RSS pour sites web en carton">
    <style type="text/css">body,a:link,a:visited {color:#fff; text-shadow: 1px 1px 1px black;}</style>
  </head>
  <body style="margin: 0; background: linear-gradient(to bottom,#3a8dc8 0,#183a62 100%); line-height: 1.337;">
    <div style="width: 910px; margin: 0 auto;">
      <h1 style="font-size:220%; letter-spacing: 1px; text-align: center; margin: 0; text-decoration:underline; font-weight:bold;">Correcteur de RSS pour sites web en carton</h1>
      <h2 style="font-size:20px; text-align: right; margin: 0 0 10px 0;">rev.'.$revision.'<br>Enlève certains caractères invisibles qui malforment les flux RSS (peux servir aussi de proxy RSS)<br><br>Mode d`emploi: Mettez l`URL complète du flux RSS que vous voulez, puis cliquez sur GO!.<br></h2>
        <div style="text-align: center; margin: 0;"><form method="get" action="coto_rss.php">
          <input type="text" placeholder="website.com/rss.php?id=news" size="50" name="rss"/>
          <button type="submit" value="1">GO!</button>
        </form></div>
        <div style="background-color: #fff; width: 780px; height:2px; margin: 2em auto;"></div>
      </div>
    <div style="background:black; position:absolute; bottom:0; width:100%; padding-bottom:5px; padding-left:5px; font:15px Courier New; font-size:30px;">
      <a href="https://twitter.com/albirew">Albirew</a> - <a href="https://github.com/Albirew/coto_rss">code source</a>
    </div>
  </body>
</html>';
}
?>