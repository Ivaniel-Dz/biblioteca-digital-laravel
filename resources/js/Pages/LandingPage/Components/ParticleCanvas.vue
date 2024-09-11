<template>
  <canvas ref="particleCanvas"></canvas>
</template>

<script setup>
import { onMounted, onUnmounted, ref } from 'vue';

const particleCanvas = ref(null);
let canvas, ctx;
let particles = [];
let particleCount;

class Particle {
  constructor() {
    this.reset();
    this.y = Math.random() * canvas.height;
    this.fadeDelay = Math.random() * 600 + 100;
    this.fadeStart = Date.now() + this.fadeDelay;
    this.fadingOut = false;
  }

  reset() {
    this.x = Math.random() * canvas.width;
    this.y = Math.random() * canvas.height;
    this.speed = Math.random() / 5 + 0.1;
    this.opacity = 1;
    this.fadeDelay = Math.random() * 600 + 100;
    this.fadeStart = Date.now() + this.fadeDelay;
    this.fadingOut = false;
  }

  update() {
    this.y -= this.speed;
    if (this.y < 0) {
      this.reset();
    }

    if (!this.fadingOut && Date.now() > this.fadeStart) {
      this.fadingOut = true;
    }

    if (this.fadingOut) {
      this.opacity -= 0.008;
      if (this.opacity <= 0) {
        this.reset();
      }
    }
  }

  draw() {
    // ctx.fillStyle = `rgba(${255 - (Math.random() * 255 / 2)}, 255, 255, ${this.opacity})`;
    ctx.fillStyle = `rgba(0, 0, 0, ${this.opacity}`;
    ctx.fillRect(this.x, this.y, 0.4, Math.random() * 2 + 1);
  }
}

function initParticles() {
  particles = [];
  for (let i = 0; i < particleCount; i++) {
    particles.push(new Particle());
  }
}

function animate() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  particles.forEach(particle => {
    particle.update();
    particle.draw();
  });
  requestAnimationFrame(animate);
}

function calculateParticleCount() {
  return Math.floor((canvas.width * canvas.height) / 6000);
}

function onResize() {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
  particleCount = calculateParticleCount();
  initParticles();
}

onMounted(() => {
  canvas = particleCanvas.value;
  ctx = canvas.getContext('2d');
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
  particleCount = calculateParticleCount();
  initParticles();
  animate();

  window.addEventListener('resize', onResize);
});

onUnmounted(() => {
  window.removeEventListener('resize', onResize);
});
</script>

<style scoped>

canvas {
  position: absolute;
  pointer-events: none;
  animation: load 0.4s ease-in-out forwards;
  z-index: 1;
  width: 90%;
}

@keyframes load {  
  0% { opacity: 0; }    
  100% { opacity: 1; }    
}
</style>
