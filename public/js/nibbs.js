// import Axios from "axios";
// 
// const baseUrl = "http://45.76.58.66";
const baseUrl = "http://localhost:8000";
const nibbsUrl = `${baseUrl}/nibbs-payment`;

let transactionOtpCode, transactionMandateCode, amountToBePaid, bankCodeSelected;

const loadBanks = () => {
    
    axios.get(`${baseUrl}/nibbs/all-banks`)
        .then(response => {
            let banks = response.data;
            setBanks(banks);
        })
        .catch(err => console.table(err))

};

let selectOption = document.querySelector('#bank-i');

const setBanks = (banks) => {
    let options = "<option value=''>Choose Bank</option>";
    for(bank of banks) {
        options += `<option value="${bank.bankCode}">${bank.bankName}</option>`;
    }
    selectOption.innerHTML = options;

};

selectOption.addEventListener('change', () => {
    this.value !== " " ? showAccountForm(true) : showAccountForm(false);
});

// Process Bank Payment
const paymentButton = document.querySelector('#payWithBank');

paymentButton.addEventListener('click', (e) => {
    paymentButton.innerHTML = 'Please Wait...';
    paymentButton.disabled = true;
    e.preventDefault();
    bankCodeSelected = document.querySelector('#bank-i').value;
    let accName = document.querySelector('#acc_name').value;
    let accNo = document.querySelector('#nuban').value;
    amountToBePaid = document.querySelector('#payWithBank_amount').value;

    let payload = {
        account_no: accNo,
        account_name: accName,
        bank: bankCodeSelected
    };

    if(amount) {
        createMandate(payload);
    }else {
        alert('Please Enter an Amount');
        document.querySelector('#amount').classList.add('is-invalid');
    }

});

const showAccountForm = (opened = false) => {
    document.querySelector('.other').style.display = opened ? 'block' : 'none';
};

let nuban = document.querySelector("#nuban");
nuban.addEventListener('keyup', () => {

    if (nuban.value.length !== 0) {
        paymentButton.disabled = false;
    }
});


// Create Mandate
const createMandate = ({ account_no, account_name } = data) => {
    let requestData = {
        accountNumber: account_no,
        accountName: account_name,
        bankCode: '070'
    };

    $.ajax({
        url: `${nibbsUrl}/create-mandate`,
        method: 'POST',
        data: requestData,
        success: (response) => {

            if(response.success) {
                responseData = JSON.parse(response.data);
                let mandateJsonResponse = parseXmlJson(responseData.data);
                let { MandateCode, ResponseCode } = mandateJsonResponse.CreateMandateResponse;
                if(ResponseCode == 00) {
                    transactionMandateCode = MandateCode
                    showBankDetails(false);
                    showOtpBox(true);
                }else {
                    alert('Something Went Wrong, Please Try Again'); return
                }
            }
        },
        error: (err) => {

        }
    });

};

// Validates Fresh Registration OTP
const validateOtpNoReg = (otp) => {

    let requestData = {
        otpCode: otp,
        transactionMandateCode,
        bankCodeSelected
    };

    $.ajax({
        url: `${nibbsUrl}/validate-registration`,
        method: 'POST',
        data: requestData,
        success: (response) => {

            if(response.success) {
                responseData = JSON.parse(response.data);
                let mandateJsonResponse = parseXmlJson(responseData.data);
                let { ResponseCode } = mandateJsonResponse.ValidateOTPResponse;
                if(ResponseCode == 00) {
                    generatePaymentOtp();
                    showOtpPayment(true);
                }else {
                    alert('Something Went Wrong, Please Try Again'); return
                }
            }
        },
        error: (err) => {

        }
    });
    


};

// Generates OTP for Payment
const generatePaymentOtp = () => {

    let requestData = {
        transactionMandateCode,
        bankCodeSelected,
        amountToBePaid
    };

    $.ajax({
        url: `${nibbsUrl}/generate-otp`,
        method: 'POST',
        data: requestData,
        success: (response) => {

            if(response.success) {
                responseData = JSON.parse(response.data);
                let jsonResponse = parseXmlJson(responseData.data);
                let { MandateCode, ResponseCode } = jsonResponse.GenerateOtpResponse;
                if(ResponseCode == 00) {
                    transactionMandateCode = MandateCode
                    showBankDetails(false);
                    showOtpBox(true);
                }else {
                    alert('Something Went Wrong, Please Try Again'); return
                }
            }
        },
        error: (err) => {

        }
    });
};

// Validates OTP For Payment
const validatePaymentOtp = () => {
    let requestData = {
        transactionMandateCode,
        bankCodeSelected,
        amountToBePaid,
        otpCode
    };

    $.ajax({
        url: `${nibbsUrl}/validate-otp`,
        method: 'POST',
        data: requestData,
        success: (response) => {

            if(response.success) {
                responseData = JSON.parse(response.data);
                let jsonResponse = parseXmlJson(responseData.data);
                let { ReferenceNumber, CPayRef,ResponseCode } = jsonResponse.ValidateOTPResponse;
                if(ResponseCode == 00) {
                    // transactionMandateCode = MandateCode
                    // showBankDetails(false);
                    // showOtpBox(true);
                    showOtpPayment(false);
                    showSuccess(true);
                }else {
                    alert('Something Went Wrong, Please Try Again'); return
                }
            }
        },
        error: (err) => {

        }
    });
};




// Validates Registration OTP Button
let validateOtpFreshBtn = document.getElementById('validate-otp');

validateOtpFreshBtn.addEventListener('click', (e) => {
    e.preventDefault();
    let otpCode = document.getElementById('otp-reg').value;
    if(otpCode) {
        validateOtpFreshBtn.innerHTML = 'Validating...';
        validateOtpFreshBtn.disabled = true;
        validateOtpNoReg(otpCode);
    }else {
        alert('Please Enter OTP Received'); return;
    }
});



const parseXmlJson = xml => {
    if(parser.validate(xml) === true) {
        return parser.parse(xml);
    }
    return false;
};

const showBankDetails = (isBank = true) => {
    document.getElementById('bank_details').style.display = isBank ? 'block' : 'none';
};

const showOtpBox = (isOtp = false) => {
    document.getElementById('otp-details').style.display = isOtp ? 'block' : 'none';
};

const showOtpPayment = (isOtp = false) => {
    document.getElementById('otp-payment').style.display = isOtp ? 'block' : 'none';
};

const showSuccess = (isPaymentCompleted = false) => {
    document.getElementById('success-payment').style.display = isPaymentCompleted ? 'block' : 'none';
};

showOtpBox();
showOtpPayment();

































(function() {
    loadBanks();
    // setBanks();
})();