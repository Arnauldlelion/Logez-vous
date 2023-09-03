$(function(){
    $('.featured_carousel').owlCarousel({
        loop:true,
        margin:10,
        dots:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:3
            }
        }
    })
    $('.solution_carousels').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:3
            }
        }
    })
});
const text = document.querySelector(".text");
const moreText = document.querySelector(".more-text");

/* ------------------------------
landlord dashboard
 ------------------------------*/

const landlordCarousel = document.querySelector(".landlord-dashboard");
const landlordArrowBtns = document.querySelectorAll(".landlord-arrowBtns i");

text.addEventListener("click", function () {
    if (moreText.style.display === "none") {
        moreText.style.display = "block";
    } else {
        moreText.style.display = "none";
    }
});

let isDragging = false,
    startX,
    startScrollLeft;

landlordArrowBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        console.log(btn.id);
    });
});

const dragStart = (e) => {
    isDragging = true;
    landlordCarousel.classList.add("dragging");
    //Records the initial cursor and scroll position of the carousel
    startX = e.pageX;
    startScrollLeft = landloardCarousel.scrollLeft;
};

const dragging = (e) => {
    if (!isDragging) return; // if isdragging is false retun from here
    //Updates the scroll positiom of the carousel based on the cursor movement
    landlordCarousel.scrollLeft = startScrollLeft - (e.pageX - startX);
};

const dragStop = () => {
    isDragging = false;
    landlordCarousel.classList.remove("dragging");
};

landlordCarousel.addEventListener("mousedown", dragStart);
landlordCarousel.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
/* ------------------------------
landlord dashboard end
 ------------------------------*/




