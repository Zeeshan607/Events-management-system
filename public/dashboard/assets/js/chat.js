
{/* js code */}



// on window refresh under width of 770(768)
if(window.innerWidth  <= 770){
    $('.conversations-list-desktop-view').addClass("active-mobile-view");
  }

//   on window resize
window.addEventListener('resize',function(){
    if(window.innerWidth  <= 770){
        $('.conversations-list-desktop-view').addClass("active-mobile-view");

      }else{
        $('.conversations-list-desktop-view').removeClass("active-mobile-view");

      }

})


$(document).ready(function(){

// chat sidebr hide/show code
    $('.chat-toggle').on('click',function(){
        $('.conversations-list-desktop-view').addClass('show');
    });

    $('.conversations-list-desktop-view .close-icon').on('click',function(){
        $('.conversations-list-desktop-view').removeClass('show');
    })

   $('.chat-wrapper').on('click',function(){
        $('.conversations-list-desktop-view').removeClass('show');
    })
    //////


});

