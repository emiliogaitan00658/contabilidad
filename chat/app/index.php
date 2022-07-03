<?php

require_once('../config.php');
require_once('../incl/mysqli_functions.php');

neutral_dbconnect(); $settings=array(); 

$query='SELECT * FROM '.$dbss['prfx']."_settings WHERE id='style_delivery' OR id='html_title' OR id='default_lang'";
$result=neutral_query($query);

while($row=neutral_fetch_array($result)){$settings[$row['id']]=$row['value'];}

// ---

$usrlang=$settings['default_lang'];
if(isset($_COOKIE[$xcookie_langsel[0]])){$usrlang=(int)$_COOKIE[$xcookie_langsel[0]];}
require_once('../lang/languages.php');
$lang_file = '../lang/'.$lang_list[$usrlang][2];
require_once($lang_file);

?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8">
<title><?php print $settings['html_title'];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2" />
<link rel="icon" type="image/png" sizes="512x512" href="512.png" />
<link rel="icon" type="image/png" sizes="256x256" href="256.png" />
<link rel="icon" type="image/png" sizes="128x128" href="128.png" />
<link rel="apple-touch-icon" sizes="512x512" href="512.png" />
<link rel="apple-touch-icon" sizes="256x256" href="256.png" />
<link rel="apple-touch-icon" sizes="128x128" href="128.png" />
<link rel="manifest" href="../pwa.webmanifest" />

<script>
if('serviceWorker' in navigator){navigator.serviceWorker.register('../pwa.js').then(function() { console.log('Service Worker!'); })}
</script>

<style>
<?php print $settings['style_delivery'];?>
b{cursor:pointer} #trscr{position:fixed;top:0;left:0;right:0;bottom:0;background-color:rgba(0,0,0,0.9);display:none}
</style>

</head><body class="x_overal">

<div class="x_bcolor_x x_all_rounded" style="width:360px;max-width:70%;padding:40px;margin:auto;margin-top:50px;text-align:justify">
<img src="128.png" style="background-color:rgba(0,0,0,0.2);width:80px;height:80px;float:left;margin-right:10px" alt="" />

<?php print $lang['pwa_desc'];?>

<br style="clear:both" /><hr class="x_bcolor_z" style="border:none;height:1px;margin:10px 0 10px 0" />
<input type="button" id="instb" style="border-width:0;width:100%;margin-top:20px;height:50px;display:none" class="x_all_rounded x_accent_bg" value="<?php print $lang['pwa_inst'];?>" />

<div id="dskmb" style="text-align:right;font-variant:small-caps;display:none">
<b class="x_accent_fg" onclick="sh.src='desktop.png'"><?php print $lang['desktop'];?></b>
&nbsp; 
<b class="x_accent_fg" onclick="sh.src='mobile.png'"><?php print $lang['mobile'];?></b>
</div>

<img id="sshot" src="desktop.png" onclick="scl()" style="cursor:pointer;width:100%;height:auto;border-radius:5px;margin-top:10px;z-index:999;display:none" alt="" />

</div>

<div id="trscr" onclick="scl()"></div>

<script>

pcstate=1; instpmpt=false
tt=document.getElementById('trscr')
im=document.getElementById('sshot')
ab=document.getElementById('instb')
dm=document.getElementById('dskmb')
sh=document.getElementById('sshot')

if(typeof window.orientation !== 'undefined' && 'ontouchstart' in document.documentElement){sh.src='mobile.png'}

// ---

function scl(){

if(pcstate==1){

lftoutset=(window.innerWidth-900)/2
topoutset=(window.innerHeight-500)/2
if(lftoutset<1){lftoutset=0}
if(topoutset<1){lftoutset=0}

maxwdth='900px';maxhdth='auto'
if(window.innerWidth<=900){maxwdth='100%'}

tt.style.display='block'
im.style.position='absolute'
im.style.top='10px';
im.style.left=lftoutset+'px'
im.style.width=maxwdth
im.style.top=topoutset+'px'

pcstate=2; return}

tt.style.display='none'
im.style.position='relative'; im.style.top=0; im.style.left=0
im.style.width='100%'; pcstate=1}

// ---

function pwaon(){if(window.matchMedia('(display-mode: standalone)').matches){top.location.href='../index.php'}}
pwaon(); setInterval('pwaon()',800);

// ---

let deferredPrompt;

window.addEventListener('beforeinstallprompt',(e)=>{
e.preventDefault(); deferredPrompt = e;
ab.style.display = 'block'; instpmpt=true

ab.addEventListener('click', (e) => {
ab.style.display = 'none'; deferredPrompt.prompt();
deferredPrompt.userChoice.then((choiceResult) => {
deferredPrompt = null})})})

setTimeout("if(!instpmpt){sh.style.display='block';dm.style.display='block'}",2000);

// ---

</script>
</body></html>