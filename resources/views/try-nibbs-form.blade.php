<form name="cpay" action=" https://staging.nibss-plc.com.ng/CentralPayPlus/payAcctMerchant " id="cpay">
	<input type="hidden" name="merchant_id" value="NIBSS0000000128" />
	<input type="hidden" name="bank_code" value="033" />
	<input type="hidden" name="customer_id" value="codergab@gmail.com" />
	<input type="hidden" name="description" value="GOENERGEE POSTPAID PAYMENT" />
	<input type="hidden" name="amount" value="5000" />
	<input type="hidden" name="currency" value="566" />
	<input type="hidden" name="transaction_id" value="FHFKDHI43JK43434JJLJLJ" />
	<input type="hidden" name="response_url" value="http://localhost:8000/nibbs/callback" />
	<input type="hidden" name="hash" value="a5da72fceb3802c44bcfcae086abcb6211b1e799b6b6c28ab1ce2a1f9b8ea693" />
	<button>Submit</button>
</form>


{{-- <script>
	setTimeout(() => {
		document.querySelector("#cpay").submit();
	}, 5000); --}}