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
        content: "I'm a Tippy tooltip!",
    }); tippy('.max-daily-loss', {
        content: "I'm a Tippy tooltip!",
    }); tippy('.max-drawdown', {
        content: "tool tio",
    }); tippy('.refundable-fee', {
        content: "I'm a Tippy tooltip!",
    }); tippy('.leverage', {
        content: "I'm a Tippy tooltip!",
    });

}

test();