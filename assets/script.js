let like = document.getElementById("like_1");
let like2 = document.getElementsByClassName('like-2');

    Array.prototype.forEach.call(like2, (like) => {
      like.addEventListener("click", function () {
      like.style.color = "red"
      })
    });