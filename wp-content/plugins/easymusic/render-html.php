<!-- Render fichier audio de base-->
<div itemscope itemtype="http://schema.org/AudioObject">
  <!--Nom du fichier avec son extensipon-->
  <span itemprop="name"><b>nomfichier.mp3</b></span>

  <!-- a changer par la variante html5 du lecteur-->
  <script type="text/javascript">
    var fo = new FlashObject("http://google.com/flash/preview-player.swf",
    "flashPlayer_719", "358", "16", "6", "#FFFFFF");fo.addVariable("url","http://media.freesound.org/data/0/previews/719__elmomo__12oclock_girona_preview.mp3");fo.addVariable("autostart", "0");fo.write("flashcontent_719");
  </script>

  <!-- format du fichier : mp3, ogg, ...-->
  <meta itemprop="encodingFormat" content="XXX" />
  
  <!-- url du fichier de preview-->
  <meta itemprop="contentURL" content="XXX" />

  <span class="description">
    <!--
      Format de la date avec la norme ISO 8601
      http://en.wikipedia.org/wiki/ISO_8601#Dates

    P is the duration designator (historically called "period") placed at the start of the duration representation.
    Y is the year designator that follows the value for the number of years.
    M is the month designator that follows the value for the number of months.
    W is the week designator that follows the value for the number of weeks.
    D is the day designator that follows the value for the number of days.
    T is the time designator that precedes the time components of the representation.
    H is the hour designator that follows the value for the number of hours.
    M is the minute designator that follows the value for the number of minutes.
    S is the second designator that follows the value for the number of seconds.

For example, "P3Y6M4DT12H30M5S" represents a duration of "three years, six months, four days, twelve hours, thirty minutes, and five seconds".
    -->
    <meta itemprop="duration" content="XXX" />
    <!--Description de la musique-->
    <span itemprop="description">XXX</span>
  </span>
</div>














<!-- Encodage d'une playlist -->
    <div itemscope itemtype="http://schema.org/MusicPlaylist">
      <!--Nom de la playliste-->
      <span itemprop="name">Classic Rock Playlist</span>
      <!-- Nombre de musiques dans la playliste-->
      <meta itemprop="numTracks" content="2"/>

      <!--Pour chaque musique, on reprendre l'encodage du type musiquerecording-->
      <div itemprop="track" itemscope itemtype="http://schema.org/MusicRecording">
        <!-- Nom de la chanson-->
        1.<span itemprop="name">Sweet Home Alabama</span> -
        <!--nom de l'artiste-->
        <span itemprop="byArtist">Lynard Skynard</span>
        <!--URL du contenu qui embed la musique-->
        <meta content="sweet-home-alabama" itemprop="url" />
        <!--Durée au format ISO-->
        <meta content="PT4M45S" itemprop="duration" />
        <!--Nom de l'album-->
        <meta content="Second Helping" itemprop="inAlbum" />
       </div>
      <!-- Les données se répètent ensuite-->
      <div itemprop="track" itemscope itemtype="http://schema.org/MusicRecording">
        2.<span itemprop="name">Shook you all Night Long</span> -
        <span itemprop="byArtist">AC/DC</span>
        <meta content="shook-you-all-night-long" itemprop="url" />
        <meta content="PT3M32S" itemprop="duration" />
        <meta content="Back In Black" itemprop="inAlbum" />
      </div>

      
    </div>









<!-- Playlise Album-->
<div itemscope itemtype="http://schema.org/MusicAlbum">
  <!-- Nom de l'album-->
  <h1 itemprop="name"> King of Limbs </h1>
  <!-- URL du contenu qui embed la musique -->
  <meta content="/artist/radiohead/album/the-king-of-limbs" itemprop="url" />
  <!-- Image de l'album-->
  <img src="king-of-limbs.jpg" itemprop="image" />
  <!-- Npombre de chansons dans la playlist-->
  <meta content="8" itemprop="numTracks" />
  <!--genre de l'album-->
  <meta content="Alt/Punk" itemprop="genre" />

  <h2 itemprop="byArtist" itemscope itemtype="http://schema.org/MusicGroup">
    <!--Nom de l'artiste-->
    <span itemprop="name">Radiohead</span>
  </h2>

  <h3>Sample Tracks</h3>
    <div itemprop="track" itemscope itemtype="http://schema.org/MusicRecording">
      <!-- Nom de la chanson-->
      <span itemprop="name">Bloom</span>
        <!-- URL du contenu qui embed la musique -->
        <meta content="/artist/radiohead/album/the-king-of-limbs/track/bloom" itemprop="url" />
        <!-- Durée de la musique, encore au format ISO-->
        <meta content="PT5M14S" itemprop="duration" />5:14
      </span>
    </div>
    
    <!-- On recommence encore sur la même base-->
    <div itemprop="track" itemscope itemtype="http://schema.org/MusicRecording">
    <span itemprop="name">Morning Mr Magpie</span>
      <meta content="/artist/radiohead/album/the-king-of-limbs/track/morning-mr-magpie" itemprop="url" />
      <meta content="PT4M40S" itemprop="duration" />4:40
    </span>
  </div>
</div>






















<!-- Détail d'un bloc Music Recording-->
<div itemprop="track" itemscope itemtype="http://schema.org/MusicRecording">
  <span itemprop="name">Rope</span>
  <meta itemprop="url" content ="foo-fighters-rope.html">
  Length: <meta itemprop="duration" content="PT4M5S">4:05 -
  <!--Nombre de lectures du fichier audio-->
  14300 plays<meta itemprop="interactionCount" content="UserPlays:14300" />
  <!-- L'accès au lecteur si celui-ci est située sur une nouvelle page-->
  <a href="foo-fighters-rope-play.html" itemprop="audio">Play</a>
  <!--L'accès à l'achat de la musique en question si cet achat se fait sur une page-->
  <a href="foo-fighters-rope-buy.html" itemprop="offers">Buy</a>
  <!-- accès au contenu dédié à l'album-->
  From album: <a href="foo-fighters-wasting-light.html"
    itemprop="inAlbum">Wasting Light</a>
</div>