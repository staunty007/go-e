// // import Axios from "axios";
// // 
// const baseUrl = "http://localhost:8000";

// const loadBanks = () => {
    
//     axios.get(`${baseUrl}/nibbs/all-banks`)
//         .then(response => {
//             let banks = response.data;
//             setBanks(banks);
//         })
//         .catch(err => console.table(err))

// };

// const setBanks = (banks) => {

//     let selectOption = document.querySelector('#bank');

//     let options = "<option value=''>Choose Bank</option>";
//     for(bank of banks) {
//         options += `<option value="${bank.bankCode}">${bank.bankName}</option>`;
//     }
//     selectOption.innerHTML = options;

// };


// // Process Bank Payment
// const paymentButton = document.querySelector('#payWithBank');

// paymentButton.addEventListener('click', (e) => {
//     e.preventDefault();
//     let selectedBank = document.querySelector('#bank').value;
//     let accName = document.querySelector('#acc_name').value;
//     let accNo = document.querySelector('#acc_no').value;
//     let amount = document.querySelector('#amount').value;

//     const payload = {
//         account_no: accNo,
//         account_name: accName,
//         bank: selectedBank
//     };

//     if(amount) {
//         axios.post(`${baseUrl}/nibbs/create-mandate`, payload)
//             .then(response => console.log(response.data))
//             .catch(err => console.table(err))
//     }else {
//         alert('Please Enter an Amount');
//         document.querySelector('#amount').classList.add('is-invalid');
//     }

// });



// (function() {
//     loadBanks();
//     // setBanks();
// })();