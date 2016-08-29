$(document).ready(function(){
  //Show and Hide sections
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

   //Control Select to Create Section
   $( "#type_id" ).change(function(){
      if($( "#type_id" ).val() == 1){
        $( ".type_view" ).show();
        $( ".section_id" ).hide();
      }else if($( "#type_id" ).val() == 2){
        $( ".type_view" ).hide();
        $( ".section_id" ).hide();
      }else if($( "#type_id" ).val() == 3){
        $( ".type_view" ).show();
        $( ".section_id" ).show();
      }else if($( "#type_id" ).val() == 4){
        $( ".type_view" ).hide();
        $( ".section_id" ).show();
      }
   });


});