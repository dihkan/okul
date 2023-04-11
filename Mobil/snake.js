// Yılanın ilk konumu
var snake = [{
    x: 10,
    y: 10
}];

// Yemek konumunu rastgele belirleyen fonksiyon
function randomFoodPosition() {
    return {
        x: Math.floor(Math.random() * 20),
        y: Math.floor(Math.random() * 20)
    };
}

// Yılanın yönünü tutacak olan değişkenler
var dx = 1;
var dy = 0;

// Yemek ve skor
var food = randomFoodPosition();
var score = 0;

// Oyun alanı
var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');

// Oyun döngüsü
function gameLoop() {
    // Yılanın son pozisyonunu alıp yeni pozisyonu hesapla
    var head = snake[snake.length - 1];
    var newHead = {
        x: head.x + dx,
        y: head.y + dy
    };

    // Duvara çarparsa oyunu bitir
    if (newHead.x < 0 || newHead.x >= 20 || newHead.y < 0 || newHead.y >= 20) {
        alert('Oyun bitti! Skor: ' + score);
        return;
    }

    // Yılanın yeni pozisyonunu yılan dizisine ekle
    snake.push(newHead);

    // Yılanın başının yemekte olup olmadığını kontrol et
    if (newHead.x === food.x && newHead.y === food.y) {
        // Yemi yediyse skoru arttır ve yeni yemek konumu belirle
        score++;
        food = randomFoodPosition();
    } else {
        // Yemi yemediyse yılanın kuyruğunu kısalt
        snake.shift();
    }

    // Oyun alanını temizle
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Yemi çiz
    ctx.fillStyle = 'red';
    ctx.fillRect(food.x * 10, food.y * 10, 10, 10);

    // Yılanı çiz
    ctx.fillStyle = 'green';
    snake.forEach(function(segment) {
        ctx.fillRect(segment.x * 10, segment.y * 10, 10, 10);
    });

    // Yönlendirme tuşlarına basılınca yılanın yönünü değiştir
    document.addEventListener('keydown', function(event) {
        if (event.keyCode === 37) {
            dx = -1;
            dy = 0;
        } else if (event.keyCode === 38) {
            dx = 0;
            dy = -1;
        } else if (event.keyCode === 39) {
            dx = 1;
            dy = 0;
        } else if (event.keyCode === 40) {
            dx = 0;
            dy = 1;
        }
    });

    // Oyun döngüsünü devam ettir
    setTimeout(gameLoop, 100);
}

// Oyun döngüsü
function gameLoop() {
    // Yılanın son pozisyonunu alıp yeni pozisyonu hesapla
    var head = snake[snake.length - 1];
    var newHead = {
        x: head.x + dx,
        y: head.y + dy
    };

    // Duvara çarparsa oyunu bitir
    if (newHead.x < 0 || newHead.x >= 20 || newHead.y < 0 || newHead.y >= 20) {
        alert('Oyun bitti! Skor: ' + score);
        return;
    }

    // Yılanın yeni pozisyonunu yılan dizisine ekle
    snake.push(newHead);

    // Yılanın başının yemekte olup olmadığını kontrol et
    if (newHead.x === food.x && newHead.y === food.y) {
        // Yemi yediyse skoru arttır ve yeni yemek konumu belirle
        score++;
        food = randomFoodPosition();
    } else {
        // Yemi yemediyse yılanın kuyruğunu kısalt
        snake.shift();
    }

    // Oyun alanını temizle
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Yemi çiz
    ctx.fillStyle = 'red';
    ctx.fillRect(food.x * 10, food.y * 10, 10, 10);

    // Yılanı çiz
    ctx.fillStyle = 'green';
    snake.forEach(function(segment) {
        ctx.fillRect(segment.x * 10, segment.y * 10, 10, 10);
    });

    // Yönlendirme tuşlarına basılınca yılanın yönünü değiştir
    document.addEventListener('keydown', function(event) {
        if (event.keyCode === 37) {
            dx = -1;
            dy = 0;
        } else if (event.keyCode === 38) {
            dx = 0;
            dy = -1;
        } else if (event.keyCode === 39) {
            dx = 1;
            dy = 0;
        } else if (event.keyCode === 40) {
            dx = 0;
            dy = 1;
        }
    });

    // Oyun döngüsünü devam ettir
    setTimeout(gameLoop, 100);
}

// Oyunu başlat
gameLoop();