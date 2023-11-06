import { randomPassword } from './main.js';

let pass = document.getElementById('pass'),
  random = randomPassword(12);

pass.value = random;
