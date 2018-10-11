<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Price Calculator</title>
	<script>
		function calcTotal() {
			var total = 0;
			for (var i = 0; document.getElementById('quantity'+i); i++) {
				var quantity = document.getElementById('quantity'+i).value,
				    price = document.getElementById('pprice'+i).value;
				total += (quantity * price);
			}
			document.getElementById('total').value = (total/100).toFixed(2);
		}
	</script>

<script>
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-27808022-1']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
</head>

<body>

<h1>Domestic Price List and Price Calculator</h1>

<p>These prices are effective from 30 January 2015 and are subject to change without prior notice.</p>

<form id="calcForm" name="calcForm" method="post" action="calculator.html#total">

<h2>Bedding</h2>
<table>
	<tr>
		<td style="width: 40px;">&nbsp;</td>
		<td style="width: 260px;">Pillow Cases</td>
		<td style="width: 50px;">70p</td>
		<td style="width: 45px;"><select onchange="calcTotal();" name="quantity0" id="quantity0"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select><input name="pprice0" id="pprice0" type="hidden" value="70"></td>
	</tr>
	<tr>
		<td colspan="4"><h3>Single</h3></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Sheet</td>
		<td>&pound;2.00</td>
		<td><select onchange="calcTotal();" name="quantity1" id="quantity1"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select><input name="pprice1" id="pprice1" type="hidden" value="200"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Duvet Cover</td>
		<td>&pound;2.00</td>
		<td><select onchange="calcTotal();" name="quantity2" id="quantity2"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select><input name="pprice2" id="pprice2" type="hidden" value="200"></td>
	</tr>
	<tr>
		<td colspan="4"><h3>Double</h3></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		<td>Sheet</td>
		<td>&pound;2.50</td>
		<td><select onchange="calcTotal();" name="quantity3" id="quantity3"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select><input name="pprice3" id="pprice3" type="hidden" value="250"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Duvet Cover</td>
		<td>&pound;2.50</td>
		<td><select onchange="calcTotal();" name="quantity4" id="quantity4"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select><input name="pprice4" id="pprice4" type="hidden" value="250"></td>
	</tr>
	<tr>
		<td colspan="4"><h3>King Size</h3></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Sheet</td>
		<td>&pound;3.00</td>
		<td><select onchange="calcTotal();" name="quantity5" id="quantity5"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select><input name="pprice5" id="pprice5" type="hidden" value="300"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Duvet Cover</td>
		<td>&pound;3.00</td>
		<td><select onchange="calcTotal();" name="quantity6" id="quantity6"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select><input name="pprice6" id="pprice6" type="hidden" value="300"></td>
	</tr>	
</table>
<!-- style the "total" and Reset button to taste -->
<label for="total">Total:</label> &pound;<input type="text" readonly id="total"> <br>
<input type="reset">

</form>	

</body>
</html>