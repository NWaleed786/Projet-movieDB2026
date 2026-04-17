<?php
require_once("get-proxy.php"); // au lycée pour faire des requêtes https vous avons besoin d'indiquer le proxy

$key = "9e43f45f94705cc8e1d5a0400d19a7b7";


//films les plus populaires
$url = "https://api.themoviedb.org/3/movie/popular?api_key=$key&language=fr-FR";
$response = getProxy($url);
//$response = file_get_contents("https://api.themoviedb.org/3/movie/popular?api_key=$key&language=fr-FR");
$result = json_decode($response, true);
echo"<pre>";
print_r($result);
echo"</pre>";

/*films les mieux notés
$url = "https://api.themoviedb.org/3/movie/top_rated?api_key=$key&language=fr-FR";
$response = getProxy($url);
//$response = file_get_contents("https://api.themoviedb.org/3/movie/top_rated?api_key=$key&language=fr-FR");
$result = json_decode($response, true);
echo"<pre>";
print_r($result['results']);
echo"</pre>";
*/

/*obtenir le détail d'un film
$movieId = 76600; // Ex: ID du film "Avatar"
$url = "https://api.themoviedb.org/3/movie/$movieId?api_key=$key&language=fr-FR";
$response = getProxy($url);
$result = json_decode($response, true);
echo"<pre>";
print_r($result);
echo"</pre>";
*/




/*acteurs dans un film : 939243 -> id du film
$url = "https://api.themoviedb.org/3/movie/939243/credits?api_key=$key";
$response = getProxy($url);
//$response = file_get_contents("https://api.themoviedb.org/3/movie/939243/credits?api_key=$key");
$result = json_decode($response, true);
echo"<pre>";
print_r($result['cast']);
echo"</pre>";
*/



/*films par genre - Action 28 - Adventure  12 - Animation 16 - Comedy 35 - Crime  80 -Documentary 99
Drama 18 - Family 10751 - Fantasy 14- History 36 - Horror 27 - Music 10402 - Science Fiction 878
Thriller  53 - War 10752 - Western 37
$url = "https://api.themoviedb.org/3/discover/movie?api_key=$key&language=fr-FR&with_genres=16";
$response = getProxy($url);
//$response = file_get_contents("https://api.themoviedb.org/3/discover/movie?api_key=$key&language=fr-FR&with_genres=16");
$result = json_decode($response, true);
echo"<pre>";
print_r($result['results']);
echo"</pre>";
*/

/*détails sur un acteur : id -> 206 Jim Carrey
$url = "https://api.themoviedb.org/3/person/206?api_key=$key&language=fr-FR";
$response = getProxy($url);
//$response = file_get_contents("https://api.themoviedb.org/3/person/206?api_key=$key&language=fr-FR");
$result = json_decode($response, true);
echo"<pre>";
print_r($result);
echo"</pre>";
*/

/*principaux films d'un acteur : id -> 206 Jim Carrey 
$url = "https://api.themoviedb.org/3/person/206/combined_credits?api_key=$key&language=fr-FR";
$response = getProxy($url);
//$response = file_get_contents("https://api.themoviedb.org/3/person/206/combined_credits?api_key=$key&language=fr-FR");
$result = json_decode($response, true);
echo"<pre>";
print_r($result['cast']);
echo"</pre>";
*/



//affichage de l'image vous avez différentes tailles disponibles 
/*
    poster_sizes": ["w92","w154","w185","w342","w500","w780","original"],
    profile_sizes": ["w45","w185","h632","original"],

    pour afficher les images il faut trouver la clé qui contient les images et ensuite choisir la taille
    exemple : $poster_path = $result["poster_path"];
    echo "<img src=\"https://image.tmdb.org/t/p/w500$poster_path\">";

*/

//intégrer des vidéos
// voir : https://blog.hubspot.fr/website/iframe?hubs_content=blog.hubspot.fr/website/inserer-video-html&hubs_content-cta=Iframe
// exemple la clé : KtF7DvnsEig vous permet de visionner la bande annonce de Sonic3
// <iframe width="672" height="378" src="https://www.youtube.com/embed/KtF7DvnsEig" frameborder="0" allowfullscreen></iframe>
    /*obtenir les clés pour les vidéos Youtube
    $key = "9e43f45f94705cc8e1d5a0400d19a7b7";
    $url = "https://api.themoviedb.org/3/movie/939243/videos?api_key=$key&language=fr-FR";
    $response = getProxy($url);
    //$response = file_get_contents("https://api.themoviedb.org/3/movie/939243/videos?api_key=$key&language=fr-FR");
    $result = json_decode($resonse, true);
    echo"<pre>";
    print_r($result['results']);
    echo"</pre>";
    */

?>