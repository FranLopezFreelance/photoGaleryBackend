$(document).ready(function(){
   $('.sectionsUL .open').on('click',function(){
     if($(this).next().is(':visible')){
       $(this).next().slideUp();
     }
     if($(this).next().is(':hidden')){
       $('.sectionsUL .open').next().slideUp();
       $(this).next().slideDown();
    }
  });

   $('.sectionsUL .open2').on('click',function(){
     if($(this).next().is(':visible')){
       $(this).next().slideUp();
     }
     if($(this).next().is(':hidden')){
       $('.sectionsUL .open2').next().slideUp();
       $(this).next().slideDown();
    }
  });


});