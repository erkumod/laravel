 wow = new WOW(
  {
  boxClass:     'wow',      // default
  animateClass: 'animated', // default
  offset:       0,          // default
  mobile:       true,       // default
  live:         true        // default
}
)
wow.init();

$(document).ready(function(){
	$('.slider_img').slick({
		dots: false,
		infinite: true,
		speed: 150,
		slidesToShow: 1,
		autoplay: true,
		// adaptiveHeight: true
	});
});




  $(document).ready(function () {
   
    $('.car_slide').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
    });
  })

  $(document).ready(function () {
       $('.shop-product').slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: false,
      arrows: false,
      autoplay: true,
        autoplaySpeed: 1000,
    });
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').focus()
    })
    $('#myModal2').on('shown.bs.modal', function () {
      $('#myInput').focus()
    })
  })

$(document).ready(function () {
    // body...
    $('.slider').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 2,
      adaptiveHeight: false
    });
    // $('#myModal').on('shown.bs.modal', function () {
    //   $('#myInput').focus()
    // })
    // $('#myModal2').on('shown.bs.modal', function () {
    //   $('#myInput').focus()
    // })
  })


$(document).ready(function () {
    // body...
    $('.daily_wash').slick({
      dots: false,
      arrow: false,
      infinite: true,
      speed: 300,
      slidesToShow: 4,
      adaptiveHeight: false
    });
    // $('#myModal').on('shown.bs.modal', function () {
    //   $('#myInput').focus()
    // })
    // $('#myModal2').on('shown.bs.modal', function () {
    //   $('#myInput').focus()
    // })
  })

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginRight = "0px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginRight= "0";
}

// $(document).ready(function() {
// 	// body...
// 	$('#dropdown').on('mouseenter',function() {
// 		// body...
// 		$('#dropdown-content').slideDown("slow");
// 	})
// 	$('#dropdown').on('mouseleave',function() {
// 		// body...
// 		$('#dropdown-content').slideUp("slow");
// 	})

// 	/*$('.to-hide').on('click',function() {
// 		// body...
// 		$(this).hide();
// 	})

// 	$('#cross').on('click',function() {
// 		// body...
// 		$(this).parent('body').find('nav .to-hide').show();
// 	})*/
// });

    $(function() {

        $('#login-form-link').click(function(e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        $('#register-form-link').click(function(e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });

    });
    // $('#myModal').on('shown.bs.modal', function () {
    //   $('#myInput').focus()
    // })


// $(document).ready(function(){
//     $(".brand").change(function(){
//          $.ajax({
//                type:'POST',
//                url:'/getmodel',
//                data:{brand_id:$('#AttorneyEmpresa option:selected').val()}
//                alert(brand_id);
//                success:function(data){
//                   $("#msg").html(data.msg);
//                }
//             });
//     });
// });


function getmodel(id){
       $.ajax({
            url: '/getmodel/'+id,
            data: 'brand_id ='+id,
            success: function(data){
                $('#model_data').html(data);

        },

        });
}

function getmodel2(id){
       $.ajax({
            url: '/getmodel2/'+id,
            data: 'brand_id ='+id,
            success: function(data){
                $('#model_data').html(data);

        },

        });
}




var element = $("div.number")
var numero = element.text();

function numberAnimation(){
  element.prop('contador',0).animate({
    contador: numero
  }, {
    duration: 1000,
    easing: 'swing',
    step: function (now) {
      // Verificar si es decimal o no
      var numText = (numero % 1 !== 0 ? now.toFixed(1) : Math.round(now));
      element.text(numText);
    }
  });
}

$(document).ready(function(){
  numberAnimation();
});





 $(document).ready(function() {
    $('#product_table').DataTable();
} );





$(document).ready(function(){
    $("#edit").click(function(){
      $("#sub_bt").show();
        var inputs = document.getElementsByClassName('pr_edit');
          for(var i = 0; i < inputs.length; i++) {
              inputs[i].disabled = false;
          }
    });
});



$('.pack .dropdown-menu li').on('click', function () {
    $('.pack .dropdown-menu li input[type="radio"]').attr('checked', !1);
    $(this).find('input[type="radio"]').attr('checked', !0);
    var val = $(this).find('input[type="radio"]').val();
    var display = $(this).find('input[type="radio"]').attr('data-display');
    $(this).parents('.btn-group').find('.multiselect-selected-text').text(display);
    target_element = $(this);
    $.ajax({
          url: '/getmodel/'+val,
                data: 'brand_id ='+val,
                success: function(data){
                    $('#model_data').html(data);

            },
    })
  });




 $(function () {

    $('#car_pack_form').on('submit', function (e) {

      e.preventDefault();

      $.ajax({
        type: 'post',
        url: '/getpackages',
        data: $('form').serialize(),
        success: function(data){
                $('#package_data').html(data);
                $('html, body').animate({
                    scrollTop: $('#package_data').offset().top
                }, 'slow');

        },
      });

    });

  });




$(function () {

  function checkForm(form)
  {
    if(this.brand.value == "") {
      alert("Please select brand");
      this.brand.focus();
      return false;
    }
    if(this.model.value == "" || !this.valid_model.checked) {
      alert("Please select model");
      this.model.focus();
      return false;
    }
    if(this.fuel_type.value == "" || !this.valid_fuel_type.checked) {
      alert("Please select fuel type");
      this.fuel_type.focus();
      return false;
    }
    // alert("Success!  The form has been completed, validated and is ready to be submitted...");
    return true;
  }

    $('#ser_pack_form').on('submit', function (e) {

      e.preventDefault();


      check = $('#ser_pack_form').serializeArray();

      console.log(check)
      if (check.length == 4) {

        $.ajax({
          type: 'post',
          url: '/getserform',
          data: $('form').serialize(),
          success: function(data){
                  $('#ser_data').html(data);

          },
        });
      }
      else {
        $('#ser_pack_form').append("<span>Fill all the field</span>");
      }


    });

  });


jQuery(document).ready(function($) {
   'use strict';

  $('.progression-studios-dashboard-slider').flexslider({
    slideshow: false,     /* Autoplay True/False */
    slideshowSpeed: 8000, /* Autoplay Speed */
    animation: "fade",    /* Slideshow Transition Animation */
    animationSpeed: 800,  /* Slide Transition Speed */
    directionNav: true,   /* Left/Right Navigation True/False */
    controlNav: true,   /* Bullet Navigaion True/False */
    prevText: "",
    nextText: "",
     });   
   



$(".progression-studios-slider-more-options").hover(function() {
    var $this = $(".progression-studios-slider-more-options");
      if ($this.hasClass('active')) {
          $this.removeClass('active').addClass('hide');
      } else {
          $this.addClass('active');
      }   
  });


  });





