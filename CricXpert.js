function updateCountdown() {
    const countdownDate = new Date("2024-11-22T07:50:00").getTime();
    const now = new Date().getTime();
    const difference = countdownDate - now;

    const days = Math.floor(difference / (1000 * 60 * 60 * 24));
    const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((difference % (1000 * 60)) / 1000);

    function padWithZero(number) {
        return (number < 10 ? '0' : '') + number;
    }

    document.querySelectorAll('.A10').forEach(function(matchCentre) {
        matchCentre.addEventListener("click", function() {
            window.location.href = "matches.html";
        });
    });

    document.querySelectorAll('.full').forEach(function(rankingLink) {
        rankingLink.addEventListener("click", function() {
            window.location.href = "ranking.html";
        });
    });

    document.querySelector('.days').textContent = padWithZero(days);
    document.querySelector('.hours').textContent = padWithZero(hours);
    document.querySelector('.hours1').textContent = padWithZero(minutes);
    document.querySelector('.hours2').textContent = padWithZero(seconds);
    document.querySelector('.H4').addEventListener("click", function() {
        window.location.href = "https://tickets.t20worldcup.com/selection/event/date?productId=10228971678917";
    });
}

updateCountdown();

setInterval(updateCountdown, 1000);