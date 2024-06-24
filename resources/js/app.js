document.addEventListener("DOMContentLoaded", () => {
    // Register service worker
    if ("serviceWorker" in navigator) {
        navigator.serviceWorker
            .register("/service-worker.js")
            .then(function (registration) {
                console.log(
                    "Service Worker registered with scope:",
                    registration.scope
                );
            })
            .catch(function (error) {
                console.log("Service Worker registration failed:", error);
            });
    }

    navJs(); // Navigation is for every page
    searchJs(); // Search is for every page

    barba.init({
        views: [
            {
                namespace: "home",
                afterEnter(data) {
                    homeJs();
                },
            },
            {
                namespace: "post",
                afterEnter(data) {
                    postJs();
                },
            },
        ],
        transitions: [
            {
                async leave(data) {
                    const done = this.async();
                    // Your leave transition code here
                    gsap.to(data.current.container, {
                        opacity: 0,
                        duration: 0.5,
                        onComplete: done,
                    });

                    // If you have additional animations, you can chain them with GSAP or use async/await
                },
                async enter(data) {
                    // Your enter transition code here
                    gsap.from(data.next.container, {
                        opacity: 0,
                        duration: 0.5,
                    });

                    // If you have additional animations, you can chain them with GSAP or use async/await
                },
                async once(data) {
                    // Your initial transition code here
                    gsap.from(data.next.container, {
                        opacity: 0,
                        duration: 0.5,
                    });

                    // If you have additional animations, you can chain them with GSAP or use async/await
                },
            },
        ],
    });

    document.onkeyup = e=>{
        if(e.key === 'Escape' || e.code === 'Escape'){
            history.back();
        }
    }
});

function postJs() {
    const postSynopsis = $(".postSynopsis");
    const postSynopsisText = $(".postSynopsis p");
    const showMoreLess = $(".postSynopsis .showMoreLess");

    showMoreLess.click((e) => {
        if (postSynopsis.hasClass("active")) {
            showMoreLess.text("Show More");

            postSynopsis.removeClass("active");
            postSynopsisText.addClass("line-clamp-3");
        } else {
            showMoreLess.text("Show Less");

            postSynopsis.addClass("active");
            postSynopsisText.removeClass("line-clamp-3");
        }
    });

    const actionBtns = $(".post .actions button");
    const actionResults = $(".post .action_results > div");

    actionBtns.each(function(index, btn) {
        $(btn).click(function(e) {
            if (!$(btn).hasClass("active")) {
                // Remove the 'active' class from all buttons & to the clicked button
                actionBtns.removeClass("active");
                $(btn).addClass("active");

                // Show Btn related action results
                actionResults.addClass('hidden');
                actionResults.filter(`[data-action=${$(btn).attr('data-action')}]`).removeClass('hidden');
            }
        });
    });
}
// ### START - HOME PAGE SCRIPTS ###
function homeJs() {
    const header = document.querySelector("header");

    const balls = document.querySelectorAll(".ball");

    var ballColorRefill = ["#46c7c7", "#ffd70d", "#ff5f5f", "#6b45c5"];
    var ballColors = ["#46c7c7", "#ffd70d", "#ff5f5f", "#6b45c5"];

    if (window.innerWidth >= 768) {
        const sliders = document.querySelectorAll(".slider");
        sliders.forEach((slider) => {
            const left = slider.querySelector(".controls .left");
            const right = slider.querySelector(".controls .right");
            const scrollAmount = window.innerWidth * 0.97; // Adjusted scroll amount
            let scrolling = false;

            const handleControlsVisibility = () => {
                const atStart = slider.scrollLeft === 0;
                const atEnd =
                    slider.scrollLeft + slider.clientWidth >=
                    slider.scrollWidth;

                // Hide left button immediately at start
                left.classList.toggle("hidden", atStart);

                // Hide right button immediately at end
                right.classList.toggle("hidden", atEnd);
            };

            const scrollSlider = (amount) => {
                const targetScrollLeft = slider.scrollLeft + amount; // Calculate target position

                // Hide appropriate button based on target position (immediate update)
                left.classList.toggle("hidden", targetScrollLeft <= 0);
                right.classList.toggle(
                    "hidden",
                    targetScrollLeft + slider.clientWidth >= slider.scrollWidth
                );

                slider.scrollBy({ left: amount, behavior: "smooth" });
            };

            slider.addEventListener("mouseenter", () => {
                controlLeftRightVisiblity(left, right, false);
                if (!scrolling) {
                    handleControlsVisibility();
                }
            });

            slider.addEventListener("mouseleave", () => {
                controlLeftRightVisiblity(left, right, true);
            });

            left.addEventListener("click", () => {
                scrollSlider(-scrollAmount);
            });

            right.addEventListener("click", () => {
                scrollSlider(scrollAmount);
            });

            // Update visibility on scroll (without relying on transitionend)
            slider.addEventListener("scroll", (event) => {
                scrolling = event.type === "scroll"; // Toggle based on event type
            });
        });
    }

    balls.forEach((ball) => {
        if (ballColors.length == 0) {
            ballColors = ballColorRefill;
        }
        ball.style.backgroundColor = ballColors[0];
        ballColors.shift();
    });
}
function controlLeftRightVisiblity(left, right, boolHide) {
    if (boolHide) {
        left.classList.add("pointer-events-none");
        right.classList.add("pointer-events-none");

        left.classList.add("opacity-0");
        right.classList.add("opacity-0");
    } else {
        left.classList.remove("pointer-events-none");
        right.classList.remove("pointer-events-none");

        left.classList.remove("opacity-0");
        right.classList.remove("opacity-0");
    }
}
// ### END - HOME PAGE SCRIPTS ###

// ### START - NAVIGATION SCRIPTS ###
function navJs() {
    // ### NAVIGATION SETTINGS  ####
    const nav = document.body.querySelector(".nav");
    const navLinks = nav.querySelectorAll("a");

    let navWidth = nav.offsetWidth;

    // let menuFirstAttempt = true;
    // nav.style.marginLeft = `-${navWidth}px`;

    const dropDowns = document.body.querySelectorAll(".nav .dropdown");
    dropDowns.forEach((dropDown) => {
        dropDown.addEventListener("click", () => {
            let dropDownUL = dropDown.querySelector("ul");

            if (dropDown.classList.contains("opened")) {
                dropDownUL.classList.add("hidden");
                dropDown.classList.remove("opened");
            } else {
                dropDownUL.classList.remove("hidden");
                dropDown.classList.add("opened");
            }
        });
    });

    const menuIcon = document.body.querySelector("#menuIcon");
    const closeNav = document.body.querySelector("#closeNav");

    menuIcon.addEventListener("click", (e) => {
        gsap.to(".nav", { x: 0, duration: 0.35 });
        // if (menuFirstAttempt) {
        //     nav.classList.replace('-z-50', 'z-top');
        //     nav.classList.add('transition-all');
        // }
        // if (!nav.classList.contains('activated')) {
        //     nav.style.marginLeft = '0';
        //     nav.classList.add('activated');
        // }
    });

    closeNav.addEventListener("click", (e) => {
        gsap.to(".nav", { x: -300, duration: 0.25 });
        // if (nav.classList.contains('activated')) {
        //     nav.style.marginLeft = `-${navWidth}px`;
        //     nav.classList.remove('activated');
        // }
    });

    navLinks.forEach((link) => {
        link.addEventListener("click", (e) => {
            let activeNavLink = nav.querySelectorAll("li .active");
            if (activeNavLink.length > 0) {
                activeNavLink.forEach((x) => {
                    x.classList.remove("active");
                    gsap.to(".nav", { x: -300, duration: 0.25 });
                });
            }
            e.target.classList.add("active");
        });
    });

    // Navigation Search Icons & SearchBox Hide-Show (for mobile device)
    const searchIcon = $(".searchIcon");
    searchIcon.click((e) => {
        if (window.innerWidth <= 640) {
            if (searchIcon.hasClass("active")) {
                $(".searchBoxParent").css("display", "none");

                searchIcon.find(".searchSVG").css("display", "block");
                searchIcon.find(".closeSVG").css("display", "none");

                searchIcon.removeClass("active");
            } else {
                $(".searchBoxParent").css("display", "flex");

                searchIcon.find(".searchSVG").css("display", "none");
                searchIcon.find(".closeSVG").css("display", "block");

                searchIcon.addClass("active");

                $(".searchBoxParent").find("input").trigger("focus");
            }
        }
    });

    // Navigation Search Box
    const navSearchForm = $("#navSearchForm");
    navSearchForm.on("submit", (e) => {
        e.preventDefault();
        let val = navSearchForm.find("input").val().trim();
        if (val.length > 0) {
            // Search query value
            let query = encodeURIComponent(val);
            // Using Barba js to search the post with ease
            barba.go("/search/" + query);

            window.scrollTo(0, 0); // Scrolling to Top

            //Close the SearchIcon right after searching post
            if (window.innerWidth <= 640 && searchIcon.hasClass("active")) {
                searchIcon.click();
            }
        }
    });

    // ### END - NAVIGATION SETTINGS  ####
    document.addEventListener("click", function (event) {
        if (
            !nav.contains(event.target) &&
            nav != event.target &&
            menuIcon != event.target
        ) {
            // nav.style.marginLeft = `-${navWidth}px`;
            // nav.classList.remove('activated');
            gsap.to(".nav", { x: -300, duration: 0.25 });
        }
    });
}
// ### END -  NAVIGATION SCRIPTS ###


function searchJs() {

}

function closeSearchSelect() {
    const activeElement = document.body.querySelector(
        "#searchArea .select.activated"
    );
    if (activeElement) {
        let activeOption = activeElement.querySelector(".option");
        activeElement.classList.remove("activated");
        // activeOption.classList.replace('h-fit', 'h-0');
        // activeOption.classList.replace('p-1', 'p-0');

        // gsap.to(activeOption, { clipPath: 'inset(0 0 100% 0)' });
        gsap.set(activeOption, {
            clipPath: "inset(0 0 100% 0)",
            duration: 0.15,
            ease: "back.out",
        });
    }
}
// ### END - SEARCH PAGE SCRIPTS ###
