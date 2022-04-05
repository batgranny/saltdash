const gaugeElement = document.querySelector(".gauge");

function setGaugeValue(gauge, value) {
  if (value < 0 || value > 1) {
    return;
  }

  gauge.querySelector(".gauge__fill").style.transform = `rotate(${
    value / 2
  }turn)`;
  gauge.querySelector(".gauge__cover").textContent = `${Math.round(
    value * 100
  )}%`;
}

const gaugeElement2 = document.querySelector(".gauge2");

function setGaugeValue2(gauge2, value) {
  if (value < 0 || value > 1) {
    return;
  }

  gauge2.querySelector(".gauge__fill2").style.transform = `rotate(${
    value / 2
  }turn)`;
  gauge2.querySelector(".gauge__cover2").textContent = `${Math.round(
    value * 100
  )}%`;
}

setGaugeValue(gaugeElement, 0.3);
setGaugeValue2(gaugeElement2, 0.7);