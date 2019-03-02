<html>

<head>
</head>

<body>
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fast-xml-parser/3.10.0/parser.min.js"></script>
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
        $.get('/nibbs/create-mandate', (data) => {
            if( parser.validate(data) === true) { //optional (it'll return an object in case it's not valid)
                var jsonObj = parser.parse(data);
                
                const { ResponseCode, MandateCode } = jsonObj.CreateMandateResponse;
                console.log(`Your Mandate Code is ${MandateCode} and your Response Code is ${ResponseCode}`);
            }
            
        });
        {{-- fetch('/nibbs/create-mandate')
		.then(res => res.json())
		.then(result => {
		    console.log(xmlToJson(result));
		})
		.catch(err => console.log(err)) --}}
    </script>
</body>

</html>