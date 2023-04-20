(function(a) {
  a(".main-menu").slicknav({
    appendTo: ".header-section",
    allowParentLinks: true,
    closedSymbol: '<i class="fa fa-angle-right"></i>',
    openedSymbol: '<i class="fa fa-angle-down"></i>'
  });
  a(".set-bg").each(function() {
    var b = a(this).data("setbg");
    a(this).css("background-image", "url(" + b + ")");
  });
  a(".hero-slider").owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    mouseDrag: false,
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    items: 1,
    autoplay: true
  });
})(jQuery);
function validateindex() {
  $(".hero-form").validate({
    rules: {
      name: { required: true, minlength: 3 },
      email: { required: true, email: true },
      mobile_number: { required: true, number: true, minlength: 10 }
    },
    messages: {
      name: {
        required: "We need your Name to contact you",
        minlength: jQuery.validator.format("At least 3 characters required!")
      },
      email: { required: "We need your Email Address to contact you" },
      mobile_number: {
        required: "We need your Mobile Number to contact you",
        minlength: jQuery.validator.format(
          "Please enter a valid 10 digit number"
        )
      }
    },
    success: function(a, b) {
      a.parent().removeClass("error");
      a.remove();
    },
    showErrors: function(a, b) {
      if (a.field_terms) {
        alert(a.field_terms);
        delete a.field_terms;
      }
      this.defaultShowErrors();
    }
  });
}

function displayPremium() {
  var dob = $("#dob").val();
  var income = $("#income").val();
  var term = $("#term").val();
  var ins_req = $("#ins_req").val();

  var age = getAge(dob);

  var pre = ins_req / (term * 12);

  if (age < 18 || age > 65) {
    alert("Not valid age. Age must be 18 to 65.");
  } else if (age >= 18 || age > 35) {
    var premium = (income / 12) * 0.1 + pre;
    alert("Approximate Premium Calculated: " + Math.round(premium));
  } else if (age >= 35 || age > 50) {
    var premium = (income / 12) * 0.2 + pre;
    alert("Approximate Premium Calculated: " + Math.round(premium));
  } else if (age >= 50 || age >= 65) {
    var premium = (income / 12) * 0.15 + pre;
    alert("Approximate Premium Calculated: " + Math.round(premium));
  } else {
    alert("Not valid Input.");
  }

  var age = getAge(dob);
  function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
    }
    return age;
  }
}
