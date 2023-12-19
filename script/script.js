var ticketPrice = 14.99;
  var quantities = [0, 0, 0];

  function adjustTotal(index, change) {
    quantities[index] += change;
    quantities[index] = Math.max(0, quantities[index]); 

    document.getElementById('quantity' + index).innerHTML = quantities[index];
    
    var total = (quantities.reduce((acc, quantity) => acc + quantity, 0) * ticketPrice).toFixed(2);
    document.getElementById('total').innerHTML = total;
  }