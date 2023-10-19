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

});




        let activePopup = null;
        let triggerBtnText = '';

        function togglePopup(popupNumber) {
            const popup = document.querySelector('.popup.popup-' + popupNumber);
            const triggerBtn = document.querySelector('.trigger-btn[data-popup-number="' + popupNumber + '"]');

            const triggerRect = triggerBtn.getBoundingClientRect();
            const triggerBtnTop = triggerRect.top + triggerRect.height;
            const triggerBtnLeft = triggerRect.left;

            popup.style.top = triggerBtnTop + window.scrollY + 'px';
            popup.style.left = triggerBtnLeft + 'px';

            if (activePopup && activePopup !== popup) {
                activePopup.style.display = 'none';
            }

            if (popup.style.display === 'block') {
                popup.style.display = 'none';
                activePopup = null;
                document.body.classList.remove('popup-open');
                triggerBtn.innerHTML = triggerBtnText; // Reset trigger button text
                document.body.classList.remove('popup-open');
            } else {
                popup.style.display = 'block';
                activePopup = popup;
                document.body.classList.add('popup-open');
                triggerBtnText = triggerBtn.innerHTML; // Store the original trigger button text

                // Update trigger button text when the user selects a price range
                const rangeMinInput = popup.querySelector('.range-min');
                const rangeMaxInput = popup.querySelector('.range-max');

                rangeMinInput.addEventListener('input', updateTriggerButtonText.bind(null, triggerBtn));
                rangeMaxInput.addEventListener('input', updateTriggerButtonText.bind(null, triggerBtn));

                document.addEventListener('click', handleDocumentClick);
            }
        }

        function handleDocumentClick(event) {
            const isClickInsidePopup = activePopup.contains(event.target);
            const isClickInsideTriggerButton = event.target.classList.contains('trigger-btn');

            if (!isClickInsidePopup && !isClickInsideTriggerButton) {
                activePopup.style.display = 'none';
                activePopup = null;
                document.body.classList.remove('popup-open');
                const triggerBtn = document.querySelector('.trigger-btn[data-popup-number]');
                triggerBtn.innerHTML = triggerBtnText; // Reset trigger button text
                document.removeEventListener('click', handleDocumentClick);
            }
        }

        function closePopup() {
            if (activePopup) {
                activePopup.style.display = 'none';
                activePopup = null;
                document.body.classList.remove('popup-open');
                const triggerBtn = document.querySelector('.trigger-btn[data-popup-number="' + activePopup.dataset
                    .popupNumber + '"]');
                triggerBtn.innerHTML = triggerBtnText; // Reset trigger button text
            }
        }

        // Attach event listeners to trigger buttons
        const triggerBtns = document.querySelectorAll('.trigger-btn');
        triggerBtns.forEach((triggerBtn) => {
            const popupNumber = triggerBtn.dataset.popupNumber;
            triggerBtn.addEventListener('click', () => togglePopup(popupNumber));
        });

        function setupRangeInputs(rangeInputSelector, priceInputSelector, progressSelector, priceGap, sizeInputSelector, sizeProgressSelector, sizeGap) {
            const rangeInput = document.querySelectorAll(rangeInputSelector);
            const priceInput = document.querySelectorAll(priceInputSelector);
            const progress = document.querySelector(progressSelector);
            const sizeInput = document.querySelectorAll(sizeInputSelector);
            const sizeProgress = document.querySelector(sizeProgressSelector);
        
            priceInput.forEach((input) => {
                input.addEventListener("input", (e) => {
                    let minVal = parseInt(priceInput[0].value);
                    let maxVal = parseInt(priceInput[1].value);
        
                    if ((maxVal - minVal >= priceGap) && maxVal <= 10000) {
                        if (e.target.className === "input-min") {
                            rangeInput[0].value = minVal;
                            progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                        } else {
                            rangeInput[1].value = maxVal;
                            progress.style.right = (1 - (maxVal / rangeInput[1].max)) * 100 + "%";
                        }
                    }
                });
            });
        
            rangeInput.forEach((input) => {
                input.addEventListener("input", (e) => {
                    let minVal = parseInt(rangeInput[0].value);
                    let maxVal = parseInt(rangeInput[1].value);
        
                    if (maxVal - minVal < priceGap) {
                        if (e.target.className === "range-min") {
                            rangeInput[0].value = maxVal - priceGap;
                        } else {
                            rangeInput[1].value = minVal + priceGap;
                        }
                    } else {
                        priceInput[0].value = minVal;
                        priceInput[1].value = maxVal;
                        progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                        progress.style.right = (1 - (maxVal / rangeInput[1].max)) * 100 + "%";
                    }
                });
            });
        
            sizeInput.forEach((input) => {
                input.addEventListener("input", (e) => {
                    let minVal = parseInt(sizeInput[0].value);
                    let maxVal = parseInt(sizeInput[1].value);
        
                    if ((maxVal - minVal >= sizeGap) && maxVal <= 400) {
                        if (e.target.className === "input-min") {
                            rangeInput[0].value = minVal;
                            sizeProgress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                        } else {
                            rangeInput[1].value = maxVal;
                            sizeProgress.style.right = (1 - (maxVal / rangeInput[1].max)) * 100 + "%";
                        }
                    }
                });
            });
        
            rangeInput.forEach((input) => {
                input.addEventListener("input", (e) => {
                    let minVal = parseInt(rangeInput[0].value);
                    let maxVal = parseInt(rangeInput[1].value);
        
                    if (maxVal - minVal < sizeGap) {
                        if (e.target.className === "range-min") {
                            rangeInput[0].value = maxVal - sizeGap;
                        } else {
                            rangeInput[1].value = minVal + sizeGap;
                        }
                    } else {
                        sizeInput[0].value = minVal;
                        sizeInput[1].value = maxVal;
                        sizeProgress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                        sizeProgress.style.right = (1 - (maxVal / rangeInput[1].max)) * 100 + "%";
                    }
                });
            });
        }
        
        // Example usage with the provided HTML structure
        document.addEventListener("DOMContentLoaded", function() {
            setupRangeInputs(
                ".popup-1 .range-input input",
                ".popup-1 .price-input input",
                ".popup-1 .slider .progress",
                1000,
                ".popup-2 .range-input input",
                ".popup-2 .size-input input",
                ".popup-2 .slider .progress",
                10
            );
        });
 /* ------------------------------
    header
------------------------------*/
    // window.addEventListener('scroll', function(){
    //     var header = this.document.querySelector('header');
    //     header.classList.toggle('sticky', this.window.scrollY > 0);
    // })
    // const nav = document.querySelector('nav');
    // window.addEventListener('scroll', function () {
    //     if (window.pageXOffset > 100) {
    //           nav.classList.add('bg-dark', 'shadow');
    //      }
    //     else {
    //         nav.classList.remove('bg-dark', 'shadow');
    //     }
    // });
          
/* ------------------------------
    header
------------------------------*/
const text = document.querySelector(".text");
const moreText = document.querySelector(".more-text");

    text.addEventListener('click', function() {
        if (moreText.style.display === 'none') {
            moreText.style.display = 'block';
        } else {
            moreText.style.display = 'none';
        }
    });

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






// function togglePopup(popupId){
//     const popup = document.getElementById(popupId);
//     popup.classList.toggle('active');
//     document.body.classList.toggle("popup-open"); // Add this line
// }



