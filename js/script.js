var fork = document.getElementById('fork');
let rotation = 0;
let direction = 1;

function rotateObject(){
    if(direction == 1){
        rotation += 1;
    }else{
        rotation -= 1;
    }

    if(rotation > 90){
        direction = -1;
    }else if(rotation < -90){
        direction = 1;
    }
    fork.style.transform = `rotate(${rotation}deg)`
    requestAnimationFrame(rotateObject)
}


var recipe_cards = document.querySelectorAll('.recipe__card');

// Set click listener on each recipe_card
recipe_cards.forEach(function(card) {
  card.addEventListener('click', function() {
    
    var recipe_name = this.querySelector('h3').innerText;

    window.location.href = "recepie.php?name=" + encodeURIComponent(recipe_name);

  });
});


rotateObject()