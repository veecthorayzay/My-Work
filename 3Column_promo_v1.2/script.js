document.addEventListener("DOMContentLoaded", () => {
    // Handle promo link clicks
    const links = document.querySelectorAll(".promo__link");
    links.forEach(link => {
      link.addEventListener("click", e => {
        e.preventDefault();
        const product = link.closest(".promo--item")
                            .querySelector(".promo__title").textContent;
        alert(`You clicked on ${product}`);
      });
    });
  
    // Select all promo items and the middle one
    const promoItems = document.querySelectorAll(".promo--item");
    const midIndex = Math.floor(promoItems.length / 2);
    const middlePromo = promoItems[midIndex];
    console.log("Middle promo item:", middlePromo.querySelector(".promo__title").textContent);
  
    //Create/style the toggle button
    const togButton = document.createElement("button");
    togButton.textContent = "Toggle Promo Items";
    Object.assign(togButton.style, {
      margin: "0.5rem 4rem",
      padding: "0.5rem 1rem",
      backgroundColor: "rgba(83, 83, 83, 0.7)",
      boxShadow: "5px 5px 10px rgba(0, 0, 0, 0.3)",
      color: "#fff",
      cursor: "pointer",
      border: "none",
      borderRadius: "10px"
    });
    togButton.classList.add("button");
    document.body.insertBefore(togButton, document.body.firstChild);
  
    // Variables for state control
    let DeskVisible = true;        
    let currIndex = 0;             //carousel current index
    let mobileMode = false;        
  
    // --- Functions for mobile carousel ---
    // Show one promo based on index, if nothing is active, switch to the next
    const showOnly = index => {
      promoItems.forEach((item, i) => {
        const isMiddle = i === midIndex;
        const isHidden = item.classList.contains("hidden-fade");
        item.classList.toggle("active", i === index && !(isMiddle && isHidden));
      });
      if (![...promoItems].some(item => item.classList.contains("active"))) {
        currIndex = (index + 1) % promoItems.length;
        showOnly(currIndex);
      }
    };
  
    // When a promo is clicked, advance to the next one
    const mobileClickHandler = () => {
      currIndex = (currIndex + 1) % promoItems.length;
      showOnly(currIndex);
    };
  
    // Bind click handlers to all promos for mobile carousel
    const bindMobileCaro = () => {
      showOnly(currIndex);
      promoItems.forEach(item => item.addEventListener("click", mobileClickHandler));
      mobileMode = true;
    };
  
    // Remove mobile carousel click handlers
    const unbindMobileCaro = () => {
      promoItems.forEach(item => {
        item.removeEventListener("click", mobileClickHandler);
        item.classList.remove("active");
      });
      mobileMode = false;
    };
  
    //Check screen size to bind or unbind mobile carousel handler
    const checkUpdateCaro = () => {
      const isMobile = window.innerWidth < 768;
      if (isMobile && !mobileMode) {
        bindMobileCaro();
      } else if (!isMobile && mobileMode) {
        unbindMobileCaro();
      }
    };
  
    //Initial carousel check & update on window resize
    checkUpdateCaro();
    window.addEventListener("resize", checkUpdateCaro);
  
    // Toggle Button Functionality
    togButton.addEventListener("click", () => {
      const isMobile = window.innerWidth < 768;
      if (isMobile) {
        // Toggle for mobile: show/hide middle promo/update carousel binding
        const isHidden = !middlePromo.classList.contains("active");
        if (isHidden) {
          unbindMobileCaro();
          // Make only the middle promo active
          promoItems.forEach((item, i) =>
            item.classList.toggle("active", i === midIndex)
          );
          middlePromo.classList.remove("hidden-fade");
          currIndex = midIndex;
          bindMobileCaro();
          togButton.textContent = "Hide Middle Item";
        } else {
          // Hide the middle promo
          middlePromo.classList.add("hidden-fade");
          setTimeout(() => {
            middlePromo.classList.remove("active");
            currIndex = (midIndex + 1) % promoItems.length;
            bindMobileCaro();
            showOnly(currIndex);
          }, 500);
          togButton.textContent = "Show Middle Item";
        }
      } else {
        // Desktop toggle: use style.display and fade class for middle promo
        if (DeskVisible) {
          middlePromo.classList.add("hidden-fade");
          setTimeout(() => {
            middlePromo.style.display = "none";
          }, 500);
          togButton.textContent = "Show Middle Item";
        } else {
          middlePromo.style.display = "flex";
          middlePromo.classList.remove("hidden-fade");
          togButton.textContent = "Hide Middle Item";
        }
        DeskVisible = !DeskVisible;
      }
    });
  });
  