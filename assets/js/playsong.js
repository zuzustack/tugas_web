let initPlay = () => {
  let ctx = $("playsong");
  let music = [];

  let setEventEnded = (path = "") => {
    $("#player").on("ended", function () {
      let id = 0;
      if (path != "") {
        id = music.indexOf(path);
      } else {
        id = music.indexOf(ctx.data("path"));
      }

      id += 1;

      $("#musicPLay")
        .html(
          `
                <audio autoplay controls id="player">
                    <p>Semua</p>
            
                    <source src="${music[id]}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            `
        )
        .attr("data-play", "1");

      console.log(id);
      
      if (ctx.length < id + 1) {
        setEventEnded(music[id]);
      }

      console.log("Playing Next Song");
    });
  };

  let createPlayer = (ctx, that) => {
    $("#musicPLay")
      .html(
        `
              <audio autoplay controls id="player">
                  <p>Semua</p>
      
                  <source src="${ctx.data("path")}" type="audio/mpeg">
                  Your browser does not support the audio element.
              </audio>
          `
      )
      .attr("data-play", "1");

    $(that).attr("data-play", "1");

    setEventEnded(ctx.data("path"));
  };

  ctx.html(`
        <div class="play-song show">
            <i class="fa-solid fa-play fa-2xl"></i>        
        </div>
        <div class="stop-song hidden">
            <i class="fa-solid fa-2xl fa-stop"></i>
        </div>
    `);

  for (let index = 0; index < ctx.length; index++) {
    let path = $(ctx[index]).data("path");

    if (path != "") {
      music.push(path);
    }
  }

  $("playsong").click(function (e) {
    let ctx = $(this);

    if (ctx.attr("data-play") == 1) {
      $("playsong[data-play=1]").attr("data-play", "0");
      $(".stop-song.show").removeClass("show").addClass("hidden");
      $(".play-song.hidden").removeClass("hidden").addClass("show");

      $("#musicPLay")
        .html(
          `
              <audio autoplay id="player">
                  <p>Semua</p>
      
                  <source src="" type="audio/mpeg">
                  Your browser does not support the audio element.
              </audio>
          `
        )
        .attr("data-play", "0");

      return;
    }

    $("playsong[data-play=1]").attr("data-play", "0");
    $(".stop-song.show").removeClass("show").addClass("hidden");
    $(".play-song.hidden").removeClass("hidden").addClass("show");

    ctx.find(".play-song.show").removeClass("show").addClass("hidden");
    ctx.find(".stop-song.hidden").removeClass("hidden").addClass("show");

    createPlayer(ctx, this);
  });
};

initPlay();
