

// window.onload = () => {
//     document.getElementById("trigger-register")?.click();
// };


const nav = document.querySelector('.main-header nav');
window.addEventListener('scroll', function() {





const text = document.querySelector('.text');
const moreText = document.querySelector('.more-text');

// text.addEventListener('click', function() {
//     if (moreText.style.display === 'none') {
//         moreText.style.display = 'block';
//     } else {
//         moreText.style.display = 'none';
//     }
// });



// const carousel = document.querySelector(".carousel")
// const arrowBtns = document.querySelectorAll('.wrapper i');
// const firstCardWidth = carousel.querySelector('.card').offsetWidth;
// const carouselChildrens = [...carousel.children]

// //Get the number of cards that can fit in the carousel at once 
// let cardPreview = Math.round(carousel.offsetWidth / firstCardWidth);

// // Insert copies of the last few cards to beginning of carousel for infinite scrolling
// carouselChildrens.slice(-cardPreview).reverse().forEach(card => {
//     carousel.insertAdjacentHTML('afterbegin', card.outerHTML)
// });

// //Insert copies of the first few cards to end of carousel for infinite scrolling
// carouselChildrens.slice(0, cardPreview).forEach(card => {
//     carousel.insertAdjacentHTML('beforeend', card.outerHTML)
// });

// //Add event listeners for the arrow buttons to scroll the carousel left and right
// arrowBtns.forEach(btn => {
//     btn.addEventListener("click", () => {
//         carousel.scrollLeft += btn.id === 'left' ? -firstCardWidth : firstCardWidth
//         consol.log('1')
//     });
// });

// const infiniteScroll = () => {
//     // If the carousel is at the beginning , scroll to the end
//     if (carousel.scrollLeft === 0) {
//         carousel.classList.add('no-transition');
//         carousel.scrollLeft = carousel.scrollWidth - carousel.offsetWidth;
//         carousel.classList.remove('no-transition');
//     }
//     // If the carousel is at the end, scroll to the beginning 
//     else if (Math.ceil(carousel.scrollLeft) === cardPreview.scrollWidth - carousel.offsetWidth) {
//         carousel.classList.add('no-transition');
//         carousel.scrollLeft = carousel.offsetWidth;
//         carousel.classList.add('no-transition');
//     }
// }


/* ------------------------------
landlord dashboard
 ------------------------------*/

     const landlordCarousel = document.querySelector('.landlord-dashboard');
     const landlordArrowBtns = document.querySelectorAll('.landlord-arrowBtns i');

     let isDragging = false, startX, startScrollLeft;

     landlordArrowBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            console.log(btn.id);
        });
        
     });

     const dragStart = (e) => {
        isDragging = true;
        landlordCarousel.classList.add('dragging');
        //Records the initial cursor and scroll position of the carousel
        startX = e.pageX;
        startScrollLeft = landloardCarousel.scrollLeft;

     }

    const dragging = (e) => {
        if(!isDragging) return // if isdragging is false retun from here 
        //Updates the scroll positiom of the carousel based on the cursor movement
        landlordCarousel.scrollLeft = startScrollLeft - (e.pageX - startX);
    }

    const dragStop = () => {
        isDragging = false;
        landlordCarousel.classList.remove('dragging');
    }

    landlordCarousel.addEventListener('mousedown', dragStart)
    landlordCarousel.addEventListener('mousemove', dragging)
    document.addEventListener('mouseup', dragStop)
/* ------------------------------
landlord dashboard end
 ------------------------------*/
=======
text.addEventListener("click", function () {
    if (moreText.style.display === "none") {
        moreText.style.display = "block";
    } else {
        moreText.style.display = "none";
    }
});

const carousel = document.querySelector(".carousel");
const arrowBtns = document.querySelectorAll(".wrapper i");
const firstCardWidth = carousel.querySelector(".card").offsetWidth;
const carouselChildrens = [...carousel.children];

//Get the number of cards that can fit in the carousel at once
let cardPreview = Math.round(carousel.offsetWidth / firstCardWidth);

// Insert copies of the last few cards to beginning of carousel for infinite scrolling
carouselChildrens
    .slice(-cardPreview)
    .reverse()
    .forEach((card) => {
        carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
    });

//Insert copies of the first few cards to end of carousel for infinite scrolling
carouselChildrens.slice(0, cardPreview).forEach((card) => {
    carousel.insertAdjacentHTML("beforeend", card.outerHTML);
});

//Add event listeners for the arrow buttons to scroll the carousel left and right
arrowBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        carousel.scrollLeft +=
            btn.id === "left" ? -firstCardWidth : firstCardWidth;
        consol.log("1");
    });
});

const infiniteScroll = () => {
    // If the carousel is at the beginning , scroll to the end
    if (carousel.scrollLeft === 0) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.scrollWidth - carousel.offsetWidth;
        carousel.classList.remove("no-transition");
    }
    // If the carousel is at the end, scroll to the beginning
    else if (
        Math.ceil(carousel.scrollLeft) ===
        cardPreview.scrollWidth - carousel.offsetWidth
    ) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.add("no-transition");
    }
};

$(window).scroll(function () {
    const mainHeader = $("#main-header");
    var viewportHeight = $(window).height();
    var scrollPosition = $(window).scrollTop();

    if (scrollPosition > viewportHeight) {
        mainHeader.removeClass("transparent");
        mainHeader.addClass("white-navbar");
    } else {
        mainHeader.addClass("transparent");
        mainHeader.removeClass("white-navbar");
    }
});
