let path = anime.path('.myPath');

anime({
  targets: '#astronaut',
  translateX: path('x'),
  translateY: path('y'),
  //rotate: path('angle'),
  easing: 'linear',
  duration: 10000,
  loop: true,
});

const roundLogEl = document.querySelector('#title');

anime({
  targets: roundLogEl,
  innerHTML: [0, 404],
  easing: 'linear',
  round: 1,
  duration: 2231,// Will round the animated value to 1 decimal
});
