const yValues = [70, 30];
const barColors = ["#5b7944", "#abb2a7"];

new Chart("doughnut", {
  type: "doughnut",
  data: {
    datasets: [{
      backgroundColor: barColors,
      data: yValues,
      borderWidth: 0
    }]
  },
  options: {
    animation: false,
    cutout: "90%",
    elements: {
        line: {
          borderWidth: 0
        }
    },
    events:[]
  }
});