const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: false,


    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },


});
function test(){
document.addEventListener("DOMContentLoaded", function () {
    // Get all <a> elements within elements with the class .prices
    const priceLinks = document.querySelectorAll('.prices a');
    const challengesLinks = document.querySelectorAll('.challenges a');
    // Add a click event listener to each <a> element
    priceLinks.forEach(link => {
        link.addEventListener('click', () => {
            // Remove 'active' class from all <a> elements within .prices
            priceLinks.forEach(link => {
                link.classList.remove('active');
            });

            // Add 'active' class to the clicked <a> element
            link.classList.add('active');
        });
    });
    // Add a click event listener to each <a> element
    challengesLinks.forEach(pr => {
        pr.addEventListener('click', () => {
            // Remove 'active' class from all <a> elements within .prices
            challengesLinks.forEach(link => {
                link.classList.remove('active');
            });

            // Add 'active' class to the clicked <a> element
            pr.classList.add('active');
        });
    });
});


    tippy('.profit-target', {
        content: "Account size required to pass onto the next Step.",
    }); tippy('.max-daily-loss', {
        content: "Maximum percentage decrease allowed in a single day in account size before account breach.",
    }); tippy('.max-drawdown', {
        content: "Maximum decrease allowed in account size with no time limit before account breach.",
    }); tippy('.refundable-fee', {
        content: "Fee charged by our platform for starting a challenge which gets refunded in case of a sucessfully funded account.",
    }); tippy('.leverage', {
        content: "Use of borrowed funds to increase your trading position beyond what would be available from your cash balance alone.",
    });

}

test();