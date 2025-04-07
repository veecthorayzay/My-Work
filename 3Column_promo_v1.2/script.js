document.addEventListener("DOMContentLoaded", () => {
    const links = document.querySelectorAll(".promo__link");

    links.forEach(link => {
        link.addEventListener("click", e => {
            e.preventDefault();
            const product = link.closest(".promo--item").querySelector(".promo__title").textContent;
            alert(`You clicked on ${product}`);
            // Here you can add any additional functionality you want to trigger on click
            // For example, you could redirect to another page or open a modal
        });
    });
});
