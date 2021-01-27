function loadProducts(){
document.getElementById('main').src('products.php');


}

function addToBasket(id){
$.post( "add2basket.php", { message: id})
  .done(function( data ) {
    alert( "Data Loaded: " + data );
  });
}

function removeFromBasket(id){
  $.post( "removeFromBasket.php", { message: id})
    .done(function( data ) {
      alert( "Data Loaded: " + data );
      location.reload();
      return false;
    });
    
  }


function setFrame(href){
$('#main').attr("src",href);
console.log("SRAdgwafg[ope");
}