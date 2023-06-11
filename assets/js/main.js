$(".btn-modal").click(function (e) {
  e.preventDefault();

  $(`#${$(this).data("target-modal")}`).addClass("show");
});

$(".btn-modalDetail").click(function (e) {
  e.preventDefault();
  let modal = $(`#${$(this).data("target-modal")}`);
  let obj = $(this).data();
  let data = Object.keys(obj);

  data.forEach((e) => {
    if (e != "targetModal") {
      // Preview Photo
      if (e == "photo") {
        if (obj[e] != "") {
          modal.find(`img#${e}`).attr("src", obj[e]);
        } else {
          modal.find(`img#${e}`).attr("src", "./assets/img/guest.png");
        }
      } else {
        modal.find(`input#${e}`).val(obj[e]);
      }

      if (e == "song") {
        console.log(obj[e]);
        modal.find(`#musicPath`).html(`
        <audio controls>
          <source src="${obj[e]}" type="audio/mpeg">
          Your browser does not support the audio element.
        </audio>
        
        `);
      }
    }
  });

  modal.addClass("show");
});

$(".modal-close").click(function (e) {
  e.preventDefault();

  $(`#${$(this).data("target-modal")}`).removeClass("show");
});

$(".photoInput").change(function (e) {
  const file = this.files[0];
  console.log(file);
  if (file) {
    let reader = new FileReader();
    reader.onload = function (event) {
      console.log(event.target.result);
      $(`#${$(e.currentTarget).data("target-preview")}`).attr(
        "src",
        event.target.result
      );
    };
    reader.readAsDataURL(file);
  }
});




$("#btn-signup").click(function (e) { 
  e.preventDefault();
  
  if ($("#title-auth").html() === "Sign Up") {
    $("#login-page").addClass("show");
    $("#login-page").removeClass("hide");  
    
    $("#signup-page").addClass("hide");
    $("#signup-page").removeClass("show");

    $("#title-auth").html("Sign In");
    $("#btn-signup").html("Sign Up");
    
    return;
  }

  $("#login-page").addClass("hide");
  $("#login-page").removeClass("show");
  $("#signup-page").addClass("show");
  $("#signup-page").removeClass("hide");

  $("#title-auth").html("Sign Up");
  $("#btn-signup").html("Sign In");

});