// 4d3a68d15e8b87c39ffd3d4171c10385
var tinysong_api_key = '4d3a68d15e8b87c39ffd3d4171c10385';

'http://tinysong.com/method/query
?format=json&key=' + tinysong_api_key




// Récuperer une chanson
//Example
//http://tinysong.com/a/Girl+Talk+Ask+About+Me?format=json&key=APIKey
//Returns
//"http:\/\/tinysong.com\/6OAB"


//Récupérer une chanson avec des informations additionnelles
//Example
//http://tinysong.com/b/Girl+Talk+Ask+About+Me?format=json&key=APIKey
//Returns
//{
//  "Url": "http:\/\/tinysong.com\/6OAB",
//  "SongID": 13963,
//  "SongName": "Ask About Me",
//  "ArtistID": 77,
//  "ArtistName": "Girl Talk",
//  "AlbumID": 117512,
//  "AlbumName": "Girl Talk"
//}

// Idem, mais résultats multiples
//http://tinysong.com/s/Beethoven?format=json&limit=3&key=APIKey