const canvas = document.getElementById('game');
const ctx = canvas.getContext('2d');

const gridSize = 20;
const tileSize = canvas.width / gridSize;

let snake = [{ x: 10, y: 10 }];
let velocity = { x: 0, y: 0 };
let food = { x: 15, y: 15 };

function update() {
  const head = { x: snake[0].x + velocity.x, y: snake[0].y + velocity.y };

  if (head.x === food.x && head.y === food.y) {
    food.x = Math.floor(Math.random() * gridSize);
    food.y = Math.floor(Math.random() * gridSize);
  } else {
    snake.pop();
  }

  snake.unshift(head);

  if (head.x < 0 || head.x >= gridSize || head.y < 0 || head.y >= gridSize) {
    snake = [{ x: 10, y: 10 }];
    velocity = { x: 0, y: 0 };
  }

  setTimeout(update, 100);
}

function draw() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  ctx.fillStyle = 'lime';
  for (const part of snake) {
    ctx.fillRect(part.x * tileSize, part.y * tileSize, tileSize, tileSize);
  }

  ctx.fillStyle = 'red';
  ctx.fillRect(food.x * tileSize, food.y * tileSize, tileSize, tileSize);

  requestAnimationFrame(draw);
}

document.addEventListener('keydown', (event) => {
  if (event.key === 'ArrowUp' && velocity.y === 0) velocity = { x: 0, y: -1 };
  if (event.key === 'ArrowDown' && velocity.y === 0) velocity = { x: 0, y: 1 };
  if (event.key === 'ArrowLeft' && velocity.x === 0) velocity = { x: -1, y: 0 };
  if (event.key === 'ArrowRight' && velocity.x === 0) velocity = { x: 1, y: 0 };
});

update();
draw();
