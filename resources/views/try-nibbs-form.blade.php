<form name="cpay" action=" https://staging.nibss-plc.com.ng/CentralPayPlus/payAcctMerchant " id="cpay">
	<input type="hidden" name="merchant_id" value="NIBSS0000000128" />
	<input type="hidden" name="bank_code" value="057" />
	<input type="hidden" name="customer_id" value="codergab@gmail.com" />
	<input type="hidden" name="description" value="GOENERGEE POSTPAID PAYMENT" />
	<input type="hidden" name="amount" value="5000" />
	<input type="hidden" name="currency" value="566" />
	<input type="hidden" name="transaction_id" value="GNDKGNGKNGNEG" />
	<input type="hidden" name="response_url" value="http://localhost:8000/nibbs/callback" />
	<input type="hidden" name="hash" value="de1f5787c41429e16bf0d8d7f2d1b2f7be8671ec59407b4ee0966ef7d07e241b" />
	<button>Submit</button>
</form>


{{-- <script>
	setTimeout(() => {
		document.querySelector("#cpay").submit();
	}, 5000); --}}