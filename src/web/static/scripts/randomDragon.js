var dragonImages = [{
    src: '/static/grafika/dragonscript/dragondock.jpg',
    copyright: 'Autorstwa  - <a href="https://www.flickr.com/photos/nasa2explore/17681252595/">NASA</a>'},{
    src: '/static/grafika/dragonscript/dragonspace.jpg',
    copyright: 'Autorstwa Jeff Hitchcock - Dragon <a href="https://commons.wikimedia.org/w/index.php?curid=49260259">CC BY 2.0</a>'},{
    src: '/static/grafika/dragonscript/Dragon_interior.jpg',
    copyright: 'By <a href="http://www.spacex.com/media-gallery/detail/149421/9321">SpaceX</a> -, <a href="https://commons.wikimedia.org/w/index.php?curid=64749063">CC0</a>'},{
    src: '/static/grafika/dragonscript/dragon.jpg',
    copyright: '<a href="https://www.flickr.com/photos/spacex/16581815487">Crew Dragon</a> - Spacex, <a href="https://commons.wikimedia.org/w/index.php?curid=49260259">CC BY 2.0</a>'}
]
function display_random_image() 
{
    var random_index=Math.floor(Math.random()*dragonImages.length);

    var img=document.createElement('img');
    img.id="dragonImage";
    img.src=dragonImages[random_index].src;

    img.width="800";
    img.height="600";
    var cc = document.createElement('p');
    cc.innerHTML=dragonImages[random_index].copyright;
    cc.classList.add("imageCredit");
    var dragon = document.getElementById("dragonimgs");
    var removeButton=document.getElementById("removebuttondragon");
    if(dragon.hasChildNodes())
    {

        var remove = dragon.querySelector("#dragonImage");
        var remove2=dragon.querySelector("p");
        dragon.removeChild(remove);
        dragon.removeChild(remove2);
   
    }
    dragon.appendChild(img);
    dragon.appendChild(cc);
    if(removeButton.style.display="none"&&dragon.hasChildNodes())
    {
        var align=document.getElementById("dragonbuttoncontainer");
        align.style.textAlign="center";
        removeButton.style.display="block";
    }

    
     
}

function remove_image()
{
    var removeButton=document.getElementById("removebuttondragon");
    var dragon = document.getElementById("dragonimgs");
    if(dragon.hasChildNodes())
    {
        var remove = dragon.querySelector("#dragonImage");
        var remove2=dragon.querySelector("p");
        dragon.removeChild(remove);
        dragon.removeChild(remove2);
        removeButton.style.display="none";
   
    }
}

