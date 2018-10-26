
let parsedInt = id => ((!(/^\d+$/.test(id))) ? NaN : parseInt(id, 10));

function backgroundSlide() {
    const images = ['/images/6oUsyeYXgTg.jpg', '/images/transformers.jpg', ];
    let url = 0;
    setInterval(function () {
        url += 1;
        if (url == 2) {
            url = 0;
        }
        let banner = document.getElementById("banner");
        banner.style.backgroundImage = 'url(' + images[url] + ')';
        banner.style.backgroundRepeat = "no-repeat";
        banner.style.height = '100%';
        banner.style.width = '100vw';
    }, 10000);
    
}


function postPaidActions(_params) {
    let postPaidPaymentCheckbox = document.getElementById("postPaidPaymentCheckbox");
    let postPaidPaymentInput = document.getElementById("postPaidPaymentInput");
    
    let reconnectionPaymentCheckbox = document.getElementById("reconnectionPaymentCheckbox");
    let reconnectionPaymentInput = document.getElementById("reconnectionPaymentInput");
    
    let penaltiesPaymentCheckbox = document.getElementById("penaltiesPaymentCheckbox");
    let penaltiesPaymentInput = document.getElementById("penaltiesPaymentInput");
    
    let revenuePaymentCheckbox = document.getElementById("revenuePaymentCheckbox");
    let revenuePaymentInput = document.getElementById("revenuePaymentInput");
    
    let totalPayment = document.getElementById("totalPayment");
    
    let postPaidPayment = 0;
    let reconnectionPayment = 0;
    let penaltiesPayment = 0;
    let revenuePayment = 0;
    let total = 0;
    // Dealing with the checkbox
    postPaidPaymentCheckbox.addEventListener('change', function () {
        if (this.checked) {
            // Checkbox is checked..
            postPaidPaymentInput.disabled = false;
            // Dealing with User Input for Final Calculation
            
        } else {
            // Checkbox is not checked..
            postPaidPaymentInput.value = 0;
            postPaidPaymentInput.disabled = true;       
            addTotal();
        }
        
    });
    
    reconnectionPaymentCheckbox.addEventListener('change', function () {
        if (this.checked) {
            // Checkbox is checked..
            reconnectionPaymentInput.disabled = false;
                      
        } else {
            // Checkbox is not checked..
            reconnectionPaymentInput.value = 0;
            reconnectionPaymentInput.disabled = true;
            addTotal();
            
        }
        
    });
    
    penaltiesPaymentCheckbox.addEventListener('change', function () {
        if (this.checked) {
            // Checkbox is checked..
            penaltiesPaymentInput.disabled = false;
            
            
        } else {
            // Checkbox is not checked..
            penaltiesPaymentInput.value = 0;
            penaltiesPaymentInput.disabled = true;
            addTotal();
            
        }
        
    });
    
    revenuePaymentCheckbox.addEventListener('change', function () {
        if (this.checked) {
            // Checkbox is checked..
            revenuePaymentInput.disabled = false;
        } else {
            // Checkbox is not checked..
            revenuePaymentInput.value = 0;
            revenuePaymentInput.disabled = true;
            addTotal();
            
        } 
    });
    totalPayment.value = total;
    
}

$('.prc').focusout(function(){
  addTotal();
});

function addTotal() {
  var total = [100];
  var reducer = (accumulator, currentValue) => accumulator + currentValue;
  var result = document.getElementById('result');
  result.innerHTML = 100;
 
  postPaidPaymentInput = document.getElementById('postPaidPaymentInput');
  reconnectionPaymentInput = document.getElementById('reconnectionPaymentInput');
  penaltiesPaymentInput = document.getElementById('penaltiesPaymentInput');
  revenuePaymentInput = document.getElementById('revenuePaymentInput');
  
  // seeTotal = document.getElementById('seeTotal');
  // seeTotal.addEventListener('click', function(e){
  //   e.preventDefault();
   
  //   if (postPaidPaymentInput.value === ''){
  //     postPaidPaymentInput.value = parsedInt(0); 
  //   }
  //   if (reconnectionPaymentInput.value === '') {
  //     reconnectionPaymentInput.value =  parsedInt(0);
  //   }
  //   if (!penaltiesPaymentInput.value){
  //     penaltiesPaymentInput.value =  parsedInt(0);
  //   }
  //   if (revenuePaymentInput.value === ''){
  //     revenuePaymentInput.value =  parsedInt(0);
  //   }
  //   var answer = 100 + parsedInt(postPaidPaymentInput.value) + parsedInt(reconnectionPaymentInput.value) + parsedInt(penaltiesPaymentInput.value) + parsedInt(revenuePaymentInput.value);
  //   // total.push(parsedInt(postPaidPaymentInput.value));
  //   // total.push(parsedInt(reconnectionPaymentInput.value));
  //   // total.push(parsedInt(penaltiesPaymentInput.value));
  //   // total.push(parsedInt(revenuePaymentInput.value));
  //   // console.log(total);
  //   // var answer = total.reduce(reducer);
  //   // console.log(total.reduce(reducer));
  //   result.innerHTML = answer;
  // });

 
    if (postPaidPaymentInput.value === ''){
      postPaidPaymentInput.value = parsedInt(0); 
    }
    if (reconnectionPaymentInput.value === '') {
      reconnectionPaymentInput.value =  parsedInt(0);
    }
    if (!penaltiesPaymentInput.value){
      penaltiesPaymentInput.value =  parsedInt(0);
    }
    if (revenuePaymentInput.value === ''){
      revenuePaymentInput.value =  parsedInt(0);
    }
    if (postPaidPaymentInput.disabled === true){
      postPaidPaymentInput.value = parsedInt(0); 
    }
    if (reconnectionPaymentInput.disabled === true){
      reconnectionPaymentInput.value = parsedInt(0); 
    }
    if (penaltiesPaymentInput.disabled === true){
      penaltiesPaymentInput.value = parsedInt(0); 
    }
    if (revenuePaymentInput.disabled === true){
      revenuePaymentInput.value = parsedInt(0); 
    }
   
    var answer = 100 + parsedInt(postPaidPaymentInput.value) + parsedInt(reconnectionPaymentInput.value) + parsedInt(penaltiesPaymentInput.value) + parsedInt(revenuePaymentInput.value);
    result.innerHTML = answer;
 
}

addTotal();
backgroundSlide();
postPaidActions();