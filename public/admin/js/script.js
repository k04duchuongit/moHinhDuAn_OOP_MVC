function closeDetail() {
    let closeDetail = document.querySelector('.close-detail');
    let overlay = document.querySelector('.overlay');
    console.log(closeDetail);
    overlay.style.display = 'none';
}

function openDetail(event) {
    event.preventDefault();               // chặn hành vi load
    console.log(event.type);
    let overlay = document.querySelector('.overlay');
    overlay.style.display = 'flex';
}
