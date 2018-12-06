<form name="cpay" action=" https://staging.nibss-plc.com.ng/CentralPayPlus/payAcctMerchant " id="cpay">
	<input type="hidden" name="merchant_id" value="NIBSS0000000128" />
	<input type="hidden" name="bank_code" value="058" />
	<input type="hidden" name="customer_id" value="codergab@gmail.com" />
	<input type="hidden" name="description" value="GOENERGEE POSTPAID PAYMENT" />
	<input type="hidden" name="amount" value="5000" />
	<input type="hidden" name="currency" value="566" />
	<input type="hidden" name="transaction_id" value="GTEFF5454FFF" />
	<input type="hidden" name="response_url" value="http://localhost:8000/nibbs/callback" />
	<input type="hidden" name="hash" value="8ebbbd2b8ba43df4a25112ba10f958a5edc1a1c209df13b10e0613e354ceda80" />
	<button>Submit</button>
</form>


{{-- <script>
	setTimeout(() => {
		document.querySelector("#cpay").submit();
	}, 5000); --}}