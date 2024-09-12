<template>
  <div class="spotlight">
    <div></div>
    <div></div>
  </div>
</template>

<script setup>
</script>

<style scoped>
.spotlight {
  pointer-events: none;
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  margin: 0 auto;
  transition: filter 1s ease-in-out;
  width: 100%;
  height: 92%;
  overflow: hidden;
}

.spotlight > div {
  border-radius: 50% 50% 0 0; /* Invertir el borde superior redondeado */
  position: absolute;
  left: 0;
  right: 0;
  margin: 0 auto;
  bottom: 8em; /* Cambiar top a bottom y posicion de inicio de la luz*/
  width: 30em;
  height: max(42em, 86vh);
  background-image: conic-gradient(from 180deg at 50% 105%, transparent 45%, rgba(124, 145, 182, .3) 49%, rgba(124, 145, 182, .5) 50%, rgba(124, 145, 182, .3) 51%, transparent 55%);
  transform-origin: 50% 100%; /* Cambiar origen de transformación */
  filter: blur(15px) opacity(0.5);
  z-index: 1;
  animation: load 2s ease-in-out forwards, loadrot 2s ease-in-out forwards, spotlight 21s ease-in-out infinite reverse;
}

.spotlight > div:nth-child(1) { 
  rotate: 20deg;
  animation: load 2s ease-in-out forwards, loadrot 2s ease-in-out forwards, spotlight 17s ease-in-out infinite;
}

.spotlight > div:nth-child(2) { 
  rotate: -20deg;
  animation: load 2s ease-in-out forwards, loadrot 2s ease-in-out forwards, spotlight 14s ease-in-out infinite;
}

@keyframes loadrot {
  0% { rotate: 0deg; scale: 0; }
  100% { scale: 1; }
}

@keyframes spotlight {
  0% {
    transform: rotateZ(0deg) scale(1);
    filter: blur(15px) opacity(0.5);
  }
  20% {
    transform: rotateZ(-1deg) scale(1.2);
    filter: blur(16px) opacity(0.6);
  }    
  40% {
    transform: rotateZ(2deg) scale(1.3);
    filter: blur(14px) opacity(0.4);
  }    
  60% {
    transform: rotateZ(-2deg) scale(1.2);
    filter: blur(15px) opacity(0.6);
  }    
  80% {
    transform: rotateZ(1deg) scale(1.1);
    filter: blur(13px) opacity(0.4);
  }    
  100% {
    transform: rotateZ(0deg) scale(1);
    filter: blur(15px) opacity(0.5);
  }
}
</style>
