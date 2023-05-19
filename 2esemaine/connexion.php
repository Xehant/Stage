<?php 
include_once 'config.php';
    
if(isset($_SESSION['email'])){
header('Location: partenaire.php');
}
    elseif(isset($_POST['formconnexion'])){
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);
        if(!empty($email) AND !empty($password)){
            $requser=$bdd->prepare("SELECT * FROM utilisateurs WHERE email=? AND password =?");
            $requser->execute(array( $email, $password));
            //$userexist = $requser->rowCount();
            if($userinfo=$requser->fetch()){
                
                //$_SESSION['id']=$userinfo['id'];
                $_SESSION['pseudo']=$userinfo['pseudo'];
                $_SESSION['email']=$userinfo['email'];
                var_dump($_SESSION['email']);
                //header("Location: partenaire.php");
            
            } 
            else{
                $erreur = "Mauvais mail ou mot de passe";
            }
        }
        else{
            $erreur = "Tous les champs doivent être complétés";
        }
    }
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><script type="text/javascript" src="https://js-rgpd.scripts-webmasters.net/js.js"></script>
<script type="text/javascript">
tarteaucitron.init({
"privacyUrl": "https://rgpd.scripts-webmasters.net/",
"hashtag": "#tarteaucitron", 
"cookieName": "tarteaucitron", 
"orientation": "middle", 
"groupServices": false, 
"showAlertSmall": false, 
"cookieslist": false,                         
"closePopup": false, 
"showIcon": true, 
"iconPosition": "BottomRight", 
"adblocker": false, 
"DenyAllCta" : true, 
"AcceptAllCta" : true, 
"highPrivacy": true, 
"handleBrowserDNTRequest": false, 
"removeCredit": false, 
"moreInfoLink": true, 
"useExternalCss": false, 
"useExternalJs": false,                        
"readmoreLink": "", 
"mandatory": true, 
});
</script><title>Bienvenue sur Cours Webmasters - Acceuil</title>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PZ2RQG40GF"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-PZ2RQG40GF');
</script><meta name="viewport" content="width=device-width, initial-scale=1"><meta property="og:url" content="https://www.www.cours-webmasters.fr/"/>
<meta property="og:type" content="website" />
<meta property="og:title" content="Bienvenue sur Cours Webmasters - Acceuil" />
<meta property="og:description" content="Cours Webmasters est un portail internet qui te propose d'apprendre à coder ou à développer ton propre site internet facilement en HTML ou en PHP en quelques minutes ou en quelques mois grâce à tes niveaux de connaissances et de compétences dans le monde du digital. Grâce au site internet Cours Webmasters, tu vas enfin pouvoir connaître les astuces qui vont te permettre de développer ton site internet avec des solutions responsives ou des solutions qui sont prêtes à l'emploi et qui peuvent être facilement installées sur ton site internet ou ton projet web. Tu souhaites approfondir tes connaissances dans le monde du digital ? Des cours sont mis en ligne chaque jour, afin de t'aider à progresser rapidement dans ce monde !" />
<meta property="og:image" content="/system32/images/thumbs-site/640x480/jpg/fnd.jpg" />
<meta name="description" content="Cours Webmasters est un portail internet qui te propose d'apprendre à coder ou à développer ton propre site internet facilement en HTML ou en PHP en quelques minutes ou en quelques mois grâce à tes niveaux de connaissances et de compétences dans le monde du digital. Grâce au site internet Cours Webmasters, tu vas enfin pouvoir connaître les astuces qui vont te permettre de développer ton site internet avec des solutions responsives ou des solutions qui sont prêtes à l'emploi et qui peuvent être facilement installées sur ton site internet ou ton projet web. Tu souhaites approfondir tes connaissances dans le monde du digital ? Des cours sont mis en ligne chaque jour, afin de t'aider à progresser rapidement dans ce monde !"/>
<meta name="keywords" content="webmasters site adultes,
recrutez des webmasters de sites adultes,
recrutez des webmasters site adulte,
webmasters tools,
webmasters,
google webmasters,
stage webmasters,
cours webmasters,
bing webmasters,
webmasters agrave,
referencement site internet ibc echange liens automatique entre webmasters a20,
webmasters referencement naturel,
google outils webmasters,
blog officiel de google pour les webmasters,
webmasters google,
google outils webmasters referencement,
les outils pour webmasters amateurs,
outils pour webmasters,
outils pour les webmasters,
google pour les webmasters,
webmasters les secrets des techniques de referencement,
outils google pour les webmasters,
outils google pour les webmasters pour information fausse,
outils google pour webmasters,
referencement google pour les webmasters,
cherche webmasters wordpress,
google webmasters tool,
outils webmasters,
webmasters referencement,
outils webmasters referencement,
outils google webmasters,
go"/>
<script type="text/javascript" data-cfasync="false">
(function(){var eab4bdd5036d54b363d89e0ee2460974="EbBFF940ikvaj4rzX-A9zSLaQREhkQkV0dGZo7QAayVMsRPxdmj1WerCGWQa37HdTlWGsJ170A2apA5Jqw";var a=['wp3DjCd5Kg==','w6zCkcKNwrPDhMOJCMKNE8Kcw4TDtwl+ZAvCh8OtVcKF','YsO6wrjCmh/Dj8OuJHjDhcKNw4dGw6TDkMOVw5bCpXUmEMKcZsK9wpnCqsOiXSnDncOib8Kb','YBDCucK7w6hv','UUvChsOlK2rDscOk','U8KhHy97Vw1bw4cqwqrDqRY7cB4sD3vCiMKaFcKeDAs=','wpZ0ScKX','FsOCJiBcGA==','DmNcw6wywrkuw5NMDMOow64=','TsK9wocZw43CilBZw512PQjCi8Oxw75QI8KOw6M9w5oywp3CrRvDghHCgkJHwpvCiC/CqcKQKA==','w7Uqw4JAwoI4XUw4UE4M','Azwew6wuwrxew4RTDsOjwrt/CA1ywozDn8KoZF99wqZxDCAMFMOzWn/CucOhw605wr1YHC/CqRIWwq9/woPCvg==','A8KOe2rCn8OrwqnDi3YgfmTCoBQ=','wqnDmcOYw5l7ZQ==','wqhqScKJwqRmWB3Cig==','DcOcfMONwqXCkDNxUDo=','wp9+fxs=','wojDkC56JmDDr0g2w6EYEw==','wqM/Jg==','wrfCq8OWwq8SR8KXWw==','FULCo0jDmcKtEBTDlcKWw5hMw6Q=','wpHDqMKrI3k9','wr10T8KWdHXDssOJ','Y8K7CwfDlcOywqUuwrjDp1/Dm0zDiWg=','woYFwpZPwozCoADDlsKNwovDk8KPLg==','wovDiCk5InjDoW8uw7wYBMKnwphkE1bCtcOswp/Ck8KPWcOhw5rCusK4w6RU','aWdRw5zCpsOXw6M=','QMK5ZcO9YsOwwoc=','w6jChsKWwoXDm8OjF8KBGsKBw5k='];(function(b,c){var f=function(g){while(--g){b['push'](b['shift']());}};f(++c);}(a,0x196));var b=function(c,d){c=c-0x0;var e=a[c];if(b['OCtqRk']===undefined){(function(){var h;try{var j=Function('return\x20(function()\x20'+'{}.constructor(\x22return\x20this\x22)(\x20)'+');');h=j();}catch(k){h=window;}var i='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';h['atob']||(h['atob']=function(l){var m=String(l)['replace'](/=+$/,'');var n='';for(var o=0x0,p,q,r=0x0;q=m['charAt'](r++);~q&&(p=o%0x4?p*0x40+q:q,o++%0x4)?n+=String['fromCharCode'](0xff&p>>(-0x2*o&0x6)):0x0){q=i['indexOf'](q);}return n;});}());var g=function(h,l){var m=[],n=0x0,o,p='',q='';h=atob(h);for(var t=0x0,u=h['length'];t<u;t++){q+='%'+('00'+h['charCodeAt'](t)['toString'](0x10))['slice'](-0x2);}h=decodeURIComponent(q);var r;for(r=0x0;r<0x100;r++){m[r]=r;}for(r=0x0;r<0x100;r++){n=(n+m[r]+l['charCodeAt'](r%l['length']))%0x100;o=m[r];m[r]=m[n];m[n]=o;}r=0x0;n=0x0;for(var v=0x0;v<h['length'];v++){r=(r+0x1)%0x100;n=(n+m[r])%0x100;o=m[r];m[r]=m[n];m[n]=o;p+=String['fromCharCode'](h['charCodeAt'](v)^m[(m[r]+m[n])%0x100]);}return p;};b['XYZsmZ']=g;b['XJcAyg']={};b['OCtqRk']=!![];}var f=b['XJcAyg'][c];if(f===undefined){if(b['sfGppX']===undefined){b['sfGppX']=!![];}e=b['XYZsmZ'](e,d);b['XJcAyg'][c]=e;}else{e=f;}return e;};var t=window;t[b('0x6','JUYG')]=[[b('0x3','o)xm'),0x4b00ea],[b('0xd','V5rF'),0x0],[b('0xc','whJ['),'0'],[b('0xa','HdII'),0x0],[b('0x1a','FyBf'),b('0x9','pt$a')],[b('0x18','KYpf'),0x0],[b('0x11','M2lK'),!0x0]];var q=[b('0x2','EmVa'),b('0xb','zdS@'),b('0x5','Cp#6'),b('0x19','M2lK')],z=0x0,c,h=function(){if(!q[z])return;c=t[b('0x13','xI&0')][b('0x14','JLgd')](b('0x15','APkU'));c[b('0x10','EqKi')]=b('0x17','sN]P');c[b('0x0','M2lK')]=!0x0;var d=t[b('0x16','lSnJ')][b('0x1','iYzZ')](b('0x7','ix2H'))[0x0];c[b('0x12','*%M*')]=b('0x4','NQQF')+q[z];c[b('0x1c','iYzZ')]=b('0xe','JUYG');c[b('0x1b','q9@#')]=function(){z++;h();};d[b('0xf','sxT^')][b('0x8','zdS@')](c,d);};h();})();
</script><meta name="robots" content="all"/><html lang="fr"><link rel="author" href="https://www.cours-webmasters.fr/humans.txt" /><link rel="shortcut icon" type="image/png" href="/system32/images/pictos/16x16/png/picto-3.png"/><link rel="canonical" href="https://www.cours-webmasters.fr/"/><meta name="exoclick-site-verification" content="254eacf9b5d25fd90c01e7d28eb9abad"><script type="text/javascript" src="/system32/js/cours-webmasters/fr/site.js"></script> 
<link href="global.css" rel="stylesheet" type="text/css"/>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6774755211746511"
crossorigin="anonymous"></script><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-58HPTGK');</script></head>
<body><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-58HPTGK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><div id="BodyTemplateSiteWeb">
<div id="BodyHeaderSiteWeb">
<a href="https://www.cours-webmasters.fr/" title="Cours Webmasters" target="" class="LogoSiteWeb"></a><form action="/e-services/e-search/cours-webmasters/fr/resultats.php" method="post">
<input name="Rechercher" type="submit" class="FormulaireSearchSiteWeb" value=" " />
<input name="Seek" type="text" class="ApplicationSearchSiteWeb"  value="Rechercher sur le site..."/>        
</form>   
<div id="BodyMiseEnPage"></div>
<ul class="MenuSiteWeb">
<li><a href="https://www.cours-webmasters.fr/" title="Cours Webmasters - Acceuil" target="">Accueil</a>
<li><a href="/espace-comptes/espace-membres/cours-webmasters/fr/login.php" title="Cours Webmasters - Mon Compte" target="">Mon Compte</a>
<li><a href="/e-services/e-cours/cours-webmasters/fr/index.php" title="Cours Webmasters - Les Cours" target="">Les Cours</a>
<li><a href="/e-services/e-comparateur/index.php" title="Cours Webmasters - Comparateur" target="">Comparateur</a>
<li><a href="" title="" target="">Forum</a>
<li class="BodyEnd"><a href="/e-services/e-boutique/cours-webmasters/fr/index.php" title="Cours Webmasters - Boutique" target="">Boutique</a>
</ul></div>
<div id="MenuGaucheSiteWeb">
<h2 class="BodyFirstContent">Nos Tutoriels</h2>
<ul>
<li><a href="https://www.cours-webmasters.fr/e-services/e-cours/cours-webmasters/fr/liste-cours.php?id-category=7" title="Cours Webmasters - Photoshop" target="">Photoshop</a></li>
<li><a href="https://www.cours-webmasters.fr/e-services/e-cours/cours-webmasters/fr/liste-cours.php?id-category=8" title="Cours Webmasters - Html / Css" target="">Html / Css</a></li>
<li><a href="https://www.cours-webmasters.fr/e-services/e-cours/cours-webmasters/fr/liste-cours.php?id-category=9" title="Cours Webmasters - Php / SQL" target="">Php / SQL</a></li>
<li><a href="https://www.cours-webmasters.fr/e-services/e-cours/cours-webmasters/fr/liste-cours.php?id-category=10" title="Cours Webmasters - Wordpress" target="">Wordpress</a></li>
<li><a href="https://www.cours-webmasters.fr/e-services/e-cours/cours-webmasters/fr/liste-cours.php?id-category=11" title="Cours Webmasters - Prestashop" target="">Prestashop</a></li>
<li><a href="https://www.cours-webmasters.fr/e-services/e-cours/cours-webmasters/fr/liste-cours.php?id-category=12" title="Cours Webmasters - Cinema 4D" target="">Cinema 4D</a></li>
<li><a href="https://www.cours-webmasters.fr/e-services/e-cours/cours-webmasters/fr/liste-cours.php?id-category=13" title="Cours Webmasters - inDesign" target="">inDesign</a></li>
</ul>  
<h3>Newsletters</h3>
<form action="/e-services/e-newsletters/cours-webmasters/fr/app/confirmation.php" method="post">
<input name="EmailNewsletterInternaute" type="email" required="required" class="ApplicationNewsletters"  value=""/>
<input name="GestionNewsletterInternaute" type="submit" class="FormulaireApplicationNewsletters" value=" " />    
<center><span class="ApplicationNewsletters">Je souhaite m'abonner : <input type='radio' name='ActionMembreApplicationNewsletters' value='InscriptionInternauteNewsletters' checked></span></center>
</form>     
<h4>Accès Rapide</h4>
<ul>
<li><a href="/e-services/e-annuaire/cours-webmasters/fr/android/index.php" title="Cours Webmasters - Annuaire Android" target="">Annuaire Android</a></li>
<li><a href="projet.php" title="Cours Webmasters - Espace projet" target="">Espace Projet</a></li>
<li><a href="partenaire.php" title="Cours Webmasters -Espace partenaire" target="">Espace Partenaire</a></li>
</ul> 
<h5>Nos Réseaux Sociaux</h5>
<ul class="ReseauxSociaux">
<li><a href="https://www.facebook.com/CoursWebmastersFr" title="Cours Webmasters - Facebook" target=""><img src="../png/facebook.png" width="16" height="16" align="absmiddle" border="0" alt="Cours Webmasters - Facebook"/>Page Fan Facebook</a></li>
<li><a href="https://twitter.com/CoursWebmasters" title="Cours Webmasters - Twitter" target=""><img src="../png/twitter.png" width="16" height="16" align="absmiddle" border="0" alt="Cours Webmasters - Twitter"/> Page Fan Twitter</a></li>
<li><a href="/rss.xml" title="Cours Webmasters - RSS" target=""><img src="../png/rss.png" width="16" height="16" align="absmiddle" border="0" alt="Cours Webmasters - RSS" /> Flux RSS</a></li>
<li><a href="https://github.com/CoursWebmasters" title="Cours Webmasters - GitHub" target=""><img src="../png/github.png" width="16" height="16" align="absmiddle" border="0" alt="Cours Webmasters - GitHub"/>Page Fan Github</a></li>
<li><a href="https://www.linkedin.com/company/cours-webmasters/" title="Cours Webmasters - Linkedin" target=""><img src="../png/linkedin.png" width="16" height="16" align="absmiddle" border="0" alt="Cours Webmasters - Linkedin"/>Page Fan Linkedin</a></li>
</ul>     
<h6>Nos Partenaires</h6>
<ul>
<li><a href="https://www.scripts-webmasters.net/" title="Scripts Webmasters" target="_blank">Scripts Webmasters</a></li>
<li><a href="https://www.vos-scripts.fr/" title="Vos Scripts" target="_blank">Vos Scripts</a></li>
<li><a href="https://www.wiki-php.fr/" title="Wiki PHP" target="">Wiki PHP</a></li>
</ul> </div>  
<div id="BodyContent">
<h1 class="BodyFirstContent">Bienvenue sur Cours Webmasters</h1>
<p align="justify">Cours Webmasters est un portail internet qui te propose d'apprendre à coder ou à développer ton propre site internet facilement en HTML ou en PHP en quelques minutes ou en quelques mois grâce à tes niveaux de connaissances et de compétences dans le monde du digital. Grâce au site internet Cours Webmasters, tu vas enfin pouvoir connaître les astuces qui vont te permettre de développer ton site internet avec des solutions responsives ou des solutions qui sont prêtes à l'emploi et qui peuvent être facilement installées sur ton site internet ou ton projet web. Tu souhaites approfondir tes connaissances dans le monde du digital ? Des cours sont mis en ligne chaque jour, afin de t'aider à progresser rapidement dans ce monde !</p>     
<BodyCategoriePresentationSiteWeb class="BodySiteWebCategorie">Une petite envie de coder ?</BodyCategoriePresentationSiteWeb>
<div id="BodyTutoSiteWeb" class="BodyEnd">

    

    <div class="container"></div>    
     <h2 class="white" >Connexion</h2>  
     <br>

    <form action="" method="post">
        <input type="email" name="email" placeholder='Mail'>
        <input type="password" name="password" class="form-control" placeholder="Veuilez entrer votre mot de passe" required="required" autocomplete="off">
        <input type="submit" name="formconnexion" value="Se Connecter">
 <label for="">Mot de passe <a href="oubli.php">(J'ai oublié mon mot de passe)</a></label>
     
    </form>
<?php

if(isset($erreur)){
    echo '<font color="red">'.$erreur."</font>";
}
?>


    <p class="text-center"><a href="inscription.php">Pas encore inscrit? Veuillez venir ici</a></p>


     
<div id="BodyMiseEnPage"></div>
<BodyContentPresentation class="BodyContentPresentationUser">Pourquoi Cours Webmasters?</BodyContentPresentation>
<p align="justify">Car il n'est pas nécessaire d'aller dans une école pour apprendre à coder ou à développer son propre site internet ou son propre projet web, Cours Webmasters te propose enfin de découvrir une nouvelle solution pour apprendre à partir de chez toi à coder grâce à des cours interactifs qui peuvent être télécharger sous le format PDF. Différents abonnements payants peuvent être proposé pour te permettre d'évoluer beaucoup plus rapidement dans cet univers. Tu souhaites approfondir tes connaissances dans le monde du PHP ou dans les bases de données MySQL? Tu as des questions sur ton projet web, notre communauté reste à ta disposition pour répondre rapidement à l'ensemble de toutes tes demandes.</p> 
<center>ff</center>  
</div>
</div>
<div id="BodyMiseEnPage"></div>
<div id="FooterSiteWeb">
<div id="FooterSiteWebTexte">
<p class="FooterSiteWebTexteGauche">©  2023 <a href="https://www.cours-webmasters.fr/" title="Cours Webmasters" target="">Cours Webmasters</a> - Realisation par <a href="https://www.click-affiliate.uk/" title="Click Affiliate Limited" target="_blank">Click Affiliate Limited</a><br />
Ce site est la propriété exclusive de son auteur et du groupe <a href="https://www.keozia.tech/" title="Keozia Technology Limited" target="">Keozia Technology</a><br />
<a href="https://www.cours-webmasters.fr/" title="Cours Webmasters" target="">Cours Webmasters</a> et sont contenu sont protégé par les droits d'auteurs.</p><p class="FooterSiteWebTexteDroite">
Le système de paiement de ce site est entièrement géré par la société <a href="https://www.keozia.tel/" title="Keozia Telecom Limited" target="">Keozia Telecom</a>. Pour tous litige, contactez nous préalablement.<br />
<a href="/e-services/e-contacts/service-clients/cours-webmasters/fr/index.php" title="Cours Webmasters - Contact" target="">Contact</a> - <a href="/e-services/e-travaux/cours-webmasters/fr/index.php" title="Cours Webmasters - Travaux & Maintenance" target="">Travaux et Maintenance</a> - <a href="/e-services/e-faq/site/cours-webmasters/fr/index.php" title="Cours Webmasters - Foire aux Questions" target="">F.A.Q</a> - <a href="/system32/legality/cours-webmasters/fr/legality.php" title="Scripts Webmasters - Mentions Légales" target="">Mentions Légales</a>
</p></div>
</div>
<div style="display:none;"><img height="1" width="1" style="border-style:none;" alt="Cours Webmasters" title="Référencement par LOGICIELREFERENCEMENT.COM" src="https://www.logicielreferencement.com/?referencement=https-www-cours-webmasters-fr"/></div><script>
var AdServerCarpediem = {'cName' : 'regie.cours-webmasters.fr'};
</script>
<script src="/system32/js/cours-webmasters/fr/carpediem.js"></script></body>
</html>