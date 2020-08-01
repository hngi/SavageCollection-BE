const posts = document.querySelectorAll(".post");
const postsOverlay = document.querySelectorAll(".post .overlay");

posts.forEach((post, index) => {
  post.addEventListener("mouseover", () => {
    postsOverlay[index].style.height = "20%";
  });
});

posts.forEach((post, index) => {
  post.addEventListener("mouseleave", () => {
    postsOverlay[index].style.height = 0;
  });
});

// function readURL(input) {
//     var url = input.value;
//     var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
//     if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
//         var reader = new FileReader();

//         reader.onload = function (e) {
//             $('.imagepreview').attr('src', e.target.result);
//         }

//         reader.readAsDataURL(input.files[0]);
//     }else{
//          $('.imagepreview').attr('src', '/assets/no_preview.png');
//     }
// }
