document.addEventListener("DOMContentLoaded", function () {
    let image = document.getElementById("image");
    let text = document.getElementById("text");

    image.addEventListener("mouseover", function () {
        image.src = "new-image.png"; 
        text.innerText = "Zenitsu Agatsuma!";
    });

    image.addEventListener("mouseout", function () {
        image.src = "https://crystalpng.com/wp-content/uploads/2023/06/luffy-gear-5-png.png"; 
        text.innerText = "Monkey d Luffy!";
    });
});
