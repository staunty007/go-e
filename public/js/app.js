var parsedInt = id => ((!(/^\d+$/.test(id))) ? NaN : parseInt(id, 10));
function backgroundSlide() {

  const images= ['/images/6oUsyeYXgTg.jpg','/images/transformers.jpg',];
  let url = 0;
  setInterval(function(){
  url+=1;
  if(url==2){
    url=0;
  }
  let banner = document.getElementById("banner");
  banner.style.backgroundImage = 'url('+images[url]+')';
  banner.style.backgroundRepeat = "no-repeat";
  banner.style.height = '100%';
  banner.style.width = '100vw';

    },10000);

}
backgroundSlide();


function postPaidActions(_params) {
  var postPaidPaymentCheckbox = document.getElementById("postPaidPaymentCheckbox");
  var postPaidPaymentInput = document.getElementById("postPaidPaymentInput");
  
  var reconnectionPaymentCheckbox = document.getElementById("reconnectionPaymentCheckbox");
  var reconnectionPaymentInput = document.getElementById("reconnectionPaymentInput");

  var penaltiesPaymentCheckbox = document.getElementById("penaltiesPaymentCheckbox");
  var penaltiesPaymentInput = document.getElementById("penaltiesPaymentInput");

  var revenuePaymentCheckbox = document.getElementById("revenuePaymentCheckbox");
  var revenuePaymentInput = document.getElementById("revenuePaymentInput");  

  var totalPayment = document.getElementById("totalPayment");
  
  let postPaidPayment = 0;
	let reconnectionPayment = 0;
	let penaltiesPayment = 0;
	let revenuePayment = 0;
	let total = 0;
  // Dealing with the checkbox
  postPaidPaymentCheckbox.addEventListener('change', function() {
    if(this.checked) {
        // Checkbox is checked..
        postPaidPaymentInput.disabled  = false;
        // Dealing with User Input for Final Calculation
        postPaidPaymentInput.addEventListener("focusout", function(){
            postPaidPaymentValue = postPaidPaymentInput.value;
            postPaidPayment = parsedInt(postPaidPaymentValue);          
            total += postPaidPayment;
        })
        
    } else {
        // Checkbox is not checked..
        postPaidPaymentInput.value = "";
        postPaidPaymentInput.disabled  = true;
    }
    
  });

  reconnectionPaymentCheckbox.addEventListener('change', function() {
    if(this.checked) {
        // Checkbox is checked..
        reconnectionPaymentInput.disabled  = false;
        reconnectionPaymentInput.addEventListener("focusout", function(){
            reconnectionPaymentValue = reconnectionPaymentInput.value;
            reconnectionPayment = parsedInt(reconnectionPaymentValue);          
            total += reconnectionPayment;
            
        })
        
    } else {
        // Checkbox is not checked..
        reconnectionPaymentInput.value = "";
        reconnectionPaymentInput.disabled  = true;
    }
    
  });

  penaltiesPaymentCheckbox.addEventListener('change', function() {
    if(this.checked) {
        // Checkbox is checked..
        penaltiesPaymentInput.disabled  = false;
        penaltiesPaymentInput.addEventListener("focusout", function(){
            penaltiesPaymentValue = penaltiesPaymentInput.value;
            penaltiesPayment = parsedInt(penaltiesPaymentValue);          
            total += penaltiesPayment;
            
        })
       
    } else {
        // Checkbox is not checked..
        penaltiesPaymentInput.value = "";
        penaltiesPaymentInput.disabled  = true;
    }
    
  });

  revenuePaymentCheckbox.addEventListener('change', function() {
    if(this.checked) {
        // Checkbox is checked..
        revenuePaymentInput.disabled  = false;
        revenuePaymentInput.addEventListener("focusout", function(){
            revenuePaymentValue = revenuePaymentInput.value;
            revenuePayment = parsedInt(revenuePaymentValue);          
						total+=revenuePayment;
           
        })
       
    } else {
        // Checkbox is not checked..
        revenuePaymentInput.value = "";
        revenuePaymentInput.disabled  = true;
    }
    
    
  });
	
	
	totalPayment.value = total;
  
}

postPaidActions();
