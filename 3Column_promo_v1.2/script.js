document.addEventListener("DOMContentLoaded", () => {
    const links = document.querySelectorAll(".promo__link");

    links.forEach(link => {
        link.addEventListener("click", e => {
            e.preventDefault();
            const product = link.closest(".promo--item").querySelector(".promo__title").textContent;
            alert(`You clicked on ${product}`);
        });
    });

    const promoItems = document.querySelectorAll(".promo--item");

    const midIndex = Math.floor(promoItems.length / 2);
    const middlePromo = promoItems[midIndex];

    //log middle promo to console
    console.log("Middle promo item:", middlePromo.querySelector(".promo__title").textContent);

    //toggle button
    const togButton = document.createElement("button");
    togButton.textContent = "Toggle Promo Items";
    togButton.style.margin = "2rem ";
    togButton.style.padding = "0.5rem 1rem";
    togButton.style.backgroundColor = "rgba(83, 83, 83, 0.7)";
    togButton.style.boxShadow = "5px 5px 10px rgba(0, 0, 0, 0.3)";
    togButton.style.color = "#fff";
    togButton.style.cursor = "pointer";
    togButton.style.border = "none";
    togButton.style.borderRadius = "10px";

    togButton.classList.add("toggle-button");
    document.body.insertBefore(togButton, document.body.firstChild);

    togButton.addEventListener("click", () => {

        if (middlePromo.style.display === "none") {
            middlePromo.style.display = "flex";
            setTimeout(() => {
               
               middlePromo.classList.toggle("hidden-fade");
            }, 500);

            
            togButton.textContent = "Hide Middle Promo Item";

        } else {
            middlePromo.classList.toggle("hidden-fade");
            setTimeout(() => {
                middlePromo.style.display = "none";
            }, 500);

            togButton.textContent = "Show Middle Promo Item";
        }

    });
});
