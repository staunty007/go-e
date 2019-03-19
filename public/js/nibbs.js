// import Axios from "axios";
// 
const baseUrl = "http://45.76.58.66";
const nibbsUrl = "http://18.224.187.121:8888/cpay/client/action";
var xmlJsonOptions = {
    attributeNamePrefix : "@_",
    attrNodeName: "attr", //default is 'false'
    textNodeName : "#text",
    ignoreAttributes : true,
    ignoreNameSpace : false,
    allowBooleanAttributes : false,
    parseNodeValue : true,
    parseAttributeValue : false,
    trimValues: true,
    cdataTagName: "__cdata", //default is 'false'
    cdataPositionChar: "\\c",
    localeRange: "", //To support non english character in tag/attribute values.
    parseTrueNumberOnly: false,
};

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
    e.preventDefault();
    let selectedBank = document.querySelector('#bank-i').value;
    let accName = document.querySelector('#acc_name').value;
    let accNo = document.querySelector('#nuban').value;
    let amount = document.querySelector('#payWithBank_amount').value;

    let payload = {
        account_no: accNo,
        account_name: accName,
        bank: selectedBank
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


const setHeader = (operation) => ({
    "operation": operation,
    "key": "F78BE99289AB52FDF97190CEBFC1D6B8",
    "Content-Type": "application/json",
    "cache-control": "no-cache",
});

// var settings = {
//     "async": true,
//     "crossDomain": true,
//     "url": `${nibbsUrl}?=,`,
//     "method": "POST",
//     "headers": {
//         "operation": "VO",
//         "key": "F78BE99289AB52FDF97190CEBFC1D6B8",
//         "Content-Type": "application/json",
//         "cache-control": "no-cache",
//         // "Postman-Token": "7f1ec755-e91f-4889-9aed-b6ed21163a3d"
//     },
//     "processData": false,
//     "data": "{\n\"mandateCode\":\"99908073049745315899\",\n\"bankCode\":\"070\",\n\"transType\":\"3\",\n\"otp\":\"918495\",\n\"billerId\":\"NIBSS0000000128\",\n\"billerName\":\"Ralmuof\"\n}"
// }
// Create Mandate
const createMandate = ({ account_no, account_name } = data) => {
    // console.log(account_no); return;
    let requestData = {
        acctNumber: account_no,
        acctName: account_name,
        transType: '1',
        bankCode: '070', //selectedBank
        billerId: "NIBSS0000000128",
        billerName: 'Ralmuof'
    };
    // console.log(payload); return;

    axios.post(`${nibbsUrl}`, requestData, {headers: setHeader('CM')},)
        .then(response => {
            let mandateJsonResponse = parseXmlJson(response.data.data);
            let { MandateCode, ResponseCode } = mandateJsonResponse.CreateMandateCode;

            if(ResponseCode == 00) {
                document.getElementById('#otp_box').style.display = 'block';
            }
            console.log(MandateCode);
        })
        .catch(err => console.table(err))
};


const parseXmlJson = xml => {
    if(parser.validate(xml) === true) {
        return parser.parse(xml);
    }
    return false;
}





































(function() {
    loadBanks();
    // setBanks();
})();