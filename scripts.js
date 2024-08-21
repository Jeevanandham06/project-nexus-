document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
function toggleForms(showLogin) {
    if (showLogin) {
        document.getElementById('signup-container').style.opacity = '0';
        document.getElementById('signup-container').style.visibility = 'hidden';
        document.querySelector('.login-container').style.opacity = '1';
        document.querySelector('.login-container').style.visibility = 'visible';
    } else {
        document.querySelector('.login-container').style.opacity = '0';
        document.querySelector('.login-container').style.visibility = 'hidden';
        document.getElementById('signup-container').style.opacity = '1';
        document.getElementById('signup-container').style.visibility = 'visible';
    }
}


document.getElementById('show-signup').addEventListener('click', function(e) {
    e.preventDefault();
    toggleForms(false); 
});

document.getElementById('show-login').addEventListener('click', function(e) {
    e.preventDefault();
    toggleForms(true); 
});
function showPopup(event) {
    alert("Feedback submitted successfully! Thank you for your input.");
    document.getElementById('feedback-form').submit();
}




document.addEventListener('DOMContentLoaded', function () {
    function animateStat(id, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            document.getElementById(id).textContent = Math.floor(progress * (end - start) + start);
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }

    animateStat('users', 0, 100000000, 2000);
    animateStat('countries', 0, 150, 2000);
    animateStat('employees', 0, 15000, 2000);
    animateStat('years', 0, 25, 2000);
});
