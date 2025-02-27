document.getElementById('searchForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const location = document.getElementById('location').value;
    const maxPrice = document.getElementById('maxPrice').value;
    alert(`Searching for properties in ${location} under ${maxPrice}`);
});

// Scroll event to trigger animation when scrolling into view
const listings = document.querySelectorAll('.listing');
const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

listings.forEach(listing => {
    observer.observe(listing);
});
