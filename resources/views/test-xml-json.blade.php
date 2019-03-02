<html>

<head>
</head>

<body>

    <div style="display:none" class="show-otp-form">
        <input type="text" id="otp-code" placeholder="Enter OTP Received" />
        <button id="validate-otp">Validate OTP</button>
    </div>















    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fast-xml-parser/3.10.0/parser.min.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var options = {
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

        let mandate;
        axios.get('/nibbs/create-mandate')
        .then((response) => {

            const jsonObj = xmlParser(response.data);
            if(jsonObj != false) {

                const { ResponseCode, MandateCode } = jsonObj.CreateMandateResponse;
                console.log(`Your Mandate Code is ${MandateCode} and your Response Code is ${ResponseCode}`);
                mandate = MandateCode;
                document.querySelector('.show-otp-form').style.display = 'block';

            }
        })
        .catch((error) => {
            console.error('Error Starting Transaction');
        })

        $("#validate-otp").click(() => {
            const otp = $("#otp-code").val();
            axios.get(`/nibbs/validate-otp/${otp}/${mandate}`)
                .then((response) => {

                    console.log(response.data);

                })
                .catch((err) => {
                    console.error('Unable to Validate OTP, Please try Again');
                });
        })



        const xmlParser = xml => {
            if(parser.validate(xml) === true) {
                let parsed = parser.parse(xml);

                return parsed;

            }else {
                return false;
            }
        }
        
    </script>
</body>

</html>