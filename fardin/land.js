const navSlide = () =>{
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li')

    burger.addEventListener('click', ()=>{
        nav.classList.toggle('nav-active');


        navLinks.forEach((link, index)=>{
            if(link.style.animation){
             link.style.animation = '';
            }
            else{
                link.style.animation = 'navLinkFade 0.5s ease forwards $(index/7 + 2)s';
            }
         });
     
    });
}

let passengerCounts = {
    adult: 0,
    child: 0,
    infant: 0
  };
  
  let isReset = false; // initialize the flag
  
  function resetPassengerCount() {
    if (!isReset) { // only reset if not already reset
      let passengerType = document.getElementById("passenger-type").value;
      document.getElementById("passenger-count").value = 0;
      passengerCounts[passengerType] = 0;
      document.getElementById(`${passengerType}-count`).innerHTML = `0 ${passengerType.charAt(0).toUpperCase() + passengerType.slice(1)}(s)`;
      updateTotalPassengers();
      isReset = true; // set flag to true to indicate reset has occurred
    }
  }
  function updateTotalPassengers() {
    let adultCount = parseInt(document.getElementById("adult-count").innerHTML);
    let childCount = parseInt(document.getElementById("child-count").innerHTML);
    let infantCount = parseInt(document.getElementById("infant-count").innerHTML);
    let totalCount = adultCount + childCount + infantCount;
    if(totalCount > 10){
      totalCount = 10
      alert("Max 10 passenger allowed");
    }else{
      document.getElementById("total-count").innerHTML = totalCount;
    }
    
  }
  
  function updatePassengerTypeCount(passengerType, increment) {
    let countElement = document.getElementById(`${passengerType}-count`);
    let count = parseInt(countElement.innerHTML);
    count += increment;
    countElement.innerHTML = `${count} ${passengerType.charAt(0).toUpperCase() + passengerType.slice(1)}${count === 1 ? '' : 's'}`;
    passengerCounts[passengerType] = count;
    updateTotalPassengers();
  }
  
  function incrementPassengerCount() {
    let passengerType = document.getElementById("passenger-type").value;
    let passengerCountElement = document.getElementById("passenger-count");
    let passengerCount = parseInt(passengerCountElement.value);
    if (passengerCount < 10) {
      passengerCount++;
      passengerCountElement.value = passengerCount;
      updatePassengerTypeCount(passengerType, 1);
    }
  }
  function decrementPassengerCount() {
    let passengerType = document.getElementById("passenger-type").value;
    let passengerCount = parseInt(document.getElementById("passenger-count").value);
    if (passengerCount > 0) {
      passengerCount--;
      document.getElementById("passenger-count").value = passengerCount;
      updatePassengerTypeCount(passengerType, -1);
    }
  }
navSlide();

(function ($) {
  // trip type scripts
  // remove values on switch trip type
  $('input:radio[name="trip-types"]').change(
    function(){
      //               $('#bookingDetails .inputText').not('select')
      //                 .val('')
      //                 .prop('checked', false)
      //                 .prop('selected', false);
      if ($(this).is(':checked') && $(this).val() == 'One Way') {
        $('.single-destination input:text[name="return"]' ).attr( "disabled", true );
        $('.single-destination input:text[name="return"]' ).attr( "placeholder", "(One Way)" );
        $('.single-destination' ).removeClass( "d-none" );
        $('.multi-destination' ).addClass( "d-none" );
      }
      else if ($(this).is(':checked') && $(this).val() == 'Multi City') {
        $('.single-destination' ).addClass( "d-none" );
        $('.multi-destination' ).removeClass( "d-none" );
      }
      else{
        $('.multi-destination' ).addClass( "d-none" );
        $('.single-destination' ).removeClass( "d-none" );
        $('input:text[name="return"]' ).attr( "disabled", false );
        $('input:text[name="return"]' ).attr( "placeholder", " " );
      }
    });

  // value swap
  $.fn.swap = function (elem) {
    elem = elem.jquery ? elem : $(elem);
    return this.each(function () {
      $(document.createTextNode('')).insertBefore(this).before(elem.before(this)).remove();
    });
  };

  $('.placeSwitch').click(function () {
    $('.inputText.from').swap('.inputText.to');
  });

  // Multi City

  // Add new element
  $("#addCity").click(function(){

    // Finding total number of elements added
    var total_element = $(".multi-destination .destination-details").length;

    // last <div> with element class id
    var lastid = $(".multi-destination .destination-details:last").attr("id");
    var split_id = lastid.split("_");
    var nextindex = Number(split_id[1]) + 1;

    var max = 4;
    // Check total number elements


    if(total_element === 3 ){
      $('button#addCity').attr("disabled", true);
    }

    if(total_element < max ){
      // Adding new div container after last occurance of element class
      $(".multi-destination .trip-details:last").after("<div class='multi-trip-single trip-details destination-details d-lg-flex align-items-end' id='city_"+ nextindex +"'><div class='form-group'><input class='inputText form-control' name='from' type='text' placeholder='From'></div><button type='button' class='placeTo' disabled><i class='fas fa-long-arrow-alt-right'></i></button><div class='form-group'><input class='inputText form-control' name='to' type='text' placeholder='To'></div><div class='form-group form-group-depart'><input class='inputText form-control' name='depart' type='text' placeholder='Depart'></div><button id='remove_"+ nextindex +"' type='button' class='placeTo placeDelete'><i class='fas fa-times'></i></button></div>");

      // Remove element
      $('.multi-trip-single').on('click','.placeDelete',function(){

        var id = this.id;
        var split_id = id.split("_");
        var deleteindex = split_id[1];

        // Remove <div> with id
        $("#city_" + deleteindex).remove();
        if(total_element < max ){
          $('button#addCity').attr("disabled", false);
        }
      }); 


    }

  });
  // Dates range start


  // Depart Field
  $('.inputDate[name="depart"]').datepicker(
    {
      dateFormat: 'mm/dd/yy',
      minDate: 'today' + 10,
    }).blur(function(){
    tmpval = $(this).val();
    if(tmpval == '') {
      $('.inputDate[name="return"]').attr("disabled", true);
    } else {
      $('.inputDate[name="return"]').attr("disabled", false);
    }
  });


  // Return Field

  $('.inputDate[name="return"]').datepicker(
    {
      dateFormat: 'mm/dd/yy',
      beforeShow: restrictDepartureDate
    });

  function restrictDepartureDate()
  {
    var departDate = $('.inputDate[name="depart"]').datepicker('getDate');
    var departDateYear = $.datepicker.formatDate('yy', departDate);
    var departDateMonth = $.datepicker.formatDate('m', departDate);
    var departDateDay = parseFloat($.datepicker.formatDate('d', departDate));

    $('.inputDate[name="return"]').datepicker('option', 'minDate', new Date(departDateYear, departDateMonth - 1, departDateDay + 1));
  }

})(jQuery);