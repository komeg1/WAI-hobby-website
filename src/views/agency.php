<?php require 'includes/general_head.inc.php';
    require 'includes/js-lib.inc.php'?>
        <link rel="stylesheet" href="static/style/agencystyle.css">
        

    </head>
   <body onload="addDays();">
   <?php require 'includes/profile-bar.inc.php';
        include 'includes/nav.inc.php';?>
<header>
    <h1>SPACEX</h1>
</header>
        <div class="container">
             <div id="spacex">
                 <div class="mainText">
                <p>SpaceX zostało założone w 2002 r. przez <b>Elona Muska</b>, współtwórcę firm Zip2 oraz PayPal i prezesa Tesla Motors.</p> Fundusze uzyskane z poprzednich projektów Musk zainwestował w technikę kosmiczną. Zdecydował się na budowę rakiet, które znacząco zmniejszą koszty wynoszenia ładunków w przestrzeń kosmiczną. Cel ma zostać osiągnięty przez wielokrotne użycie stopni rakiety po ich odzyskaniu (zautomatyzowane lądowanie na lądzie lub statku) oraz przez użycie sprawdzonych i tanich technologii oraz seryjnej produkcji. <p>Na swoim koncie mają wiele osiągnięć m.in jako pierwsza firma prywatna:</p>
                <div class="subcontainer">
                    <div>
                    <ul>
                        <li><a href="databaseView.php">DATABASE</a></li>
                        <li>wysłała statek kosmiczny do Międzynarodowej Stacji kosmicznej</li>
                        <li>wysłała osoby komercyjne na orbitę oraz ISS</li>
                        <li>sprowadziła na ziemię i ponownie użyła osłon aerodynamicznych rakiety orbitalnej</li>
                        <li>wykorzystuje platformy morskie do lądowań I stopnia rakiety</li>
                        
                    </ul>
                    <h2>Falcon</h2 >
                    <p>SpaceX może się pochwalić najtańszą w utrzymaniu rakietą na świecie - Falcon9, która służy głównie do wysyłania w przestrzeń satelit do projektu Starlink. Niektóre części tej rakiety lądują na ziemii i są gotowe do ponownego użytku. </p>
                    </div>
                    <div class="image">
                        <img src="static/grafika/elon-musk.jpg" title="Elon Musk" alt="Elon Musk">
                        <p><b>Elon Musk - właściciel SpaceX</b></p>
                    </div>
                    <span id="falconStart"></span>
                </div>  
                </div>
                    <div id="falconShow">
                        
                        <img src="static/grafika/Falcon_rocket_family5.jpg" alt="History if Falcon rockets" width="1000" >
                        <p class="imageCredit">Autorstwa Lucabon - Praca własna, <a href="https://commons.wikimedia.org/w/index.php?curid=72287380"> CC BY-SA 4.0</a></p>
                    </div>
                    <span id="dragonstart"></span>
                    <div class="mainText">
                        
                    <h2  style="margin-top: 300px;">Dragon</h2>
                    <p>Kapsuła załogowa Dragon początkowo służyła do transportu towarów na Międzynarodową Stację Kosmiczną. Z czasem została przeprojektowana tak, aby była gotowa do transportu osób. Na dzień dzisiejszy jest to główny środek transportu astronautów na ISS.</p>
                    <h3 >Parametry techniczne:</h3>
                    <div id="dragonparam">
                        
                    <table>
                          <tr>
                            <td>Wysokość</td>
                            <td>2,9 m</td>
                          </tr>
                          <tr>
                            <td>Szerokość</td>
                            <td>3,6 m </td>
                          </tr>
                          <tr>
                            <td>Masa</td>
                            <td>8 t</td>
                          </tr>
                          <tr>
                            <td>Ładunek startowy</td>
                            <td>6 t</td>
                          </tr>
                          <tr>
                            <td>Ładunek powrotny</td>
                            <td>3 t</td>
                          </tr>
                        </table>
                        
                        
                        
                    </div>
                    <div id="dragonbuttoncontainer" style="text-align: center;">
                    <button id="buttondragon" onclick="display_random_image();">Losowe zdjęcie kapsuły Dragon:</button>
                    <button id="removebuttondragon" style="display:none;" onclick="remove_image();">Usuń losowe zdjęcie</button>
                    </div>
                    <div id="noscriptdragon">
                        <img src="static/grafika/dragonscript/dragondock.jpg" alt="dragon capsule" width="600">
                        <p class="imageCredit">Autorstwa  - <a href="https://www.flickr.com/photos/nasa2explore/17681252595/">NASA</a></p>
                    </div>
                    <div id="dragonimgs"></div>
                            
                        </div>
                </div>
                <span id="starshipstart"></span>
                <div class="mainText">
                    <h2 style ="margin-top: 300px;">Starship</h2>
                    <p>Projekt superciężkiego statku kosmicznego. System ma być w pełni wielokrotnego użytku i ma pozwolić ludziom na dotarcie do marsa oraz 
                        pomóc w przemieszczaniu się pomiędzy odległymi miastami na Ziemii. Od 2019 roku na terenie prywatnego kosmodromu w miejscowości Boca Chica w Teksasie dokonuje się testów i ulepszeń kolejnych wersji Starship.<p>Aktualnie testowana jest 20. wersja Starship - SN20
                    </p>
                            <div id=starshipimgs>
                    <div class="starshipimg starship1" style="display: inline-block;">
                        <img src="static/grafika/48954138902_e9ae0d1a65_o.jpg" alt="SpaceX Starship"/>
                        
                    </div>
                    
                    <div class="starshipimg starship2" style="display: inline-block;">
                        <img src="static/grafika/starship-bfg.jpg" alt="SpaceX Starship"/>
                        
                    </div>
                    </div>  
                        <div id = "dialog" title = "Starship">
                            Rakieta StarShip jest projektowana z myślą o pierwszej załogowej misji na marsa. Dowiedz się więcej na jej temat na: <a href="https://www.spacex.com/vehicles/starship/">https://www.spacex.com/vehicles/starship/</a></div>
                        <p class="imageCredit"><a href="https://www.flickr.com/photos/spacex/48954138902">Starship | First test vehicle</a> by <a href="https://www.flickr.com/photos/spacex/">SpaceX </a>licensed under <a href="https://creativecommons.org/licenses/by/2.0/">CC BY 2.0</a> </p>
                        <p class="imageCredit">Autorstwa Space Exploration Technologies Corp. - SpaceX Flickr,  <a href="https://pl.wikipedia.org/wiki/Starship#/media/Plik:Starship_passing_the_Moon-2018_version.jpg">CC0</a> </p>
                        <div id="buttoncontainer"><button class = "button button1">Dowiedz się więcej na temat rakiety Starship</button></div>
                    </div>
                    <div id="counter" style="margin-top:100px;">
                        <p id="falcon9counter"></p>
                    <div id="progressBar"></div>    
                    </div>
                    
                </div>
             <footer>
                <span>Copyright &copy; Tomasz Krezymon 2021</span>
                <h4><a href="contact">Kontakt</a></h4>
            </footer>
            </body>
           
            
            </html>