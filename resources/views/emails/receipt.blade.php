
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Your </title>
  
  
  
  
  
</head>

<body>

  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>GOENERGEE</title>
  </head>
  
  <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0"
  style="margin: 0pt auto; padding: 0px; background:#F4F7FA;">
    <table id="main" width="100%" height="100%" cellpadding="0" cellspacing="0" border="0"
    bgcolor="#F4F7FA">
      <tbody>
        <tr>
          <td valign="top">
            <table class="innermain" cellpadding="0" width="580" cellspacing="0" border="0"
            bgcolor="#F4F7FA" align="center" style="margin:0 auto; table-layout: fixed;">
              <tbody>
                <!-- START of MAIL Content -->
                <tr>
                  <td colspan="4">
                    <!-- Logo start here -->
                    <table class="logo" width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tbody>
                        <tr>
                          <td colspan="2" height="30"></td>
                        </tr>
                        <tr>
                          <td valign="top" align="center">
                            <a href="{{ url('/') }}" style="display:inline-block; cursor:pointer; text-align:center;">
                              <img src="{{ asset('images/logo.png') }}"
                              height="24" width="104" border="0" alt="GOENERGEE">
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2" height="30"></td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- Logo end here -->
                    <!-- Main CONTENT -->
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff"
                    style="border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                      <tbody>
                        <tr>
                          <td height="40"></td>
                        </tr>
                        <tr style="font-family: -apple-system,BlinkMacSystemFont,&#39;Segoe UI&#39;,&#39;Roboto&#39;,&#39;Oxygen&#39;,&#39;Ubuntu&#39;,&#39;Cantarell&#39;,&#39;Fira Sans&#39;,&#39;Droid Sans&#39;,&#39;Helvetica Neue&#39;,sans-serif; color:#4E5C6E; font-size:14px; line-height:20px; margin-top:20px;">
                          <td class="content" colspan="2" valign="top" align="center" style="padding-left:90px; padding-right:90px;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff">
                              <tbody>
                                <tr>
                                  <td align="center" valign="bottom" colspan="2" cellpadding="3">
                                    <img alt="GOENERGEE" width="80" src="https://www.coinbase.com/assets/app/succeed-green-dcb087e9c6e5265b4c49f75c9c2e1d08bc894bc54816d9a5a476611f631b2929.png"
                                    />
                                  </td>
                                </tr>
                                <tr>
                                  <td height="30" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td align="center">
                                    <div style="font-size: 22px; line-height: 32px; font-weight: 500; margin-left: 20px; margin-right: 20px; margin-bottom: 25px;">
                                        Your {{ $data->user_type == "OFFLINE_PREPAID" ? 'Prepaid': 'Postpaid'}} Purchase was successful
                                    </div>
                                    <p style="font-size: 14px;">Your Token is</p>
                                    <p style="font-size: 28px; font-weight: 400;">{{ $data->token_data }}</p>
                                    
                                  </td>
                                </tr>
                                <tr>
                                  <td height="24" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td height="1" bgcolor="#DAE1E9"></td>
                                </tr>
                                <tr>
                                  <td height="24" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td>
                                    <table style="width: 100%; border-collapse:collapse;">
                                      <tbody style="border: 0; padding: 0; margin-top:20px;">
                                        <tr>
                                          <td style="padding-bottom: 10px; padding-top: 10px;">Transaction Reference</td>
                                          <td style="padding-bottom: 10px; padding-top: 10px;"><span style="font-family:'Monaco', monospace;border:1px solid #DAE1E9;letter-spacing:2px;padding:5px 8px;border-radius:4px;background-color:#F4F7FA;color:#2E7BC4;">{{ $data->payment_ref }}</span>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="50%" valign="top" style="padding-bottom: 10px; padding-top: 10px;">Payment method</td>
                                          <td style="padding-bottom: 10px; padding-top: 10px;">Smiles Davis Ba... ******650</td>
                                        </tr>
                                        <tr>
                                          <td style="padding-bottom: 10px; padding-top: 10px;">Date</td>
                                        <td style="padding-bottom: 10px; padding-top: 10px;">{{ date('D-d-M-Y h:i:ga', strtotime($data->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                          <td style="padding-bottom: 10px; padding-top: 10px;">Estimated payout</td>
                                          <td style="padding-bottom: 10px; padding-top: 10px;">December 05, 2017</td>
                                        </tr>
                                        <tr>
                                          <td height="24" &nbsp;=""></td>
                                        </tr>
                                        <tr>
                                          <td style="padding:0;margin:0;" height="1" bgcolor="#DAE1E9"></td>
                                          <td style="padding:0;margin:0;" height="1" bgcolor="#DAE1E9"></td>
                                        </tr>
                                        <tr>
                                          <td height="24" &nbsp;=""></td>
                                        </tr>
                                        <tr>
                                          <td style="padding-bottom: 10px; padding-top: 10px;">Amount
                                            <br/>
                                          </td>
                                          <td style="padding-bottom: 10px; padding-top: 10px;"> <strong>0.06505650 BTC</strong>
                                            <br/>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td style="padding-bottom: 10px; padding-top: 10px;">Exchange rate</td>
                                          <td style="padding-bottom: 10px; padding-top: 10px;">@ $16,500.50 / BTC</td>
                                        </tr>
                                        <tr>
                                          <td style="padding-bottom: 10px; padding-top: 10px;">Subtotal</td>
                                          <td style="padding-bottom: 10px; padding-top: 10px;">$649.00</td>
                                        </tr>
                                        <tr>
                                          <td style="padding-bottom: 10px; padding-top: 10px;">Fee</td>
                                          <td style="padding-bottom: 10px; padding-top: 10px;">$1.00</td>
                                        </tr>
                                        <tr>
                                          <td style="padding-bottom: 10px; padding-top: 10px;">Total</td>
                                          <td style="padding-bottom: 10px; padding-top: 10px;">$650.00</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td height="10">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>
                                    <a href="https://www.coinbase.com/signin" style="display:block; font-size: 16px; padding:15px 25px; background-color:#3C90DF; color:#ffffff; border: 1px solid #2E7BC4; border-radius:4px; text-decoration:none; text-align:center; font-weight:500;"
                                    )>View Purchase</a>
                                  </td>
                                </tr>
                                <tr>
                                  <td height="24" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td height="1" bgcolor="#DAE1E9"></td>
                                </tr>
                                <tr>
                                  <td height="24" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td>
                                    <div style="color:#48545d; font-size:14px; line-height:24px; text-align:center;">
                                      <p style="text-align: center; margin-bottom: 24px; font-size: 18px; font-weight: 500;">Frequently asked questions</p>
                                      <p>
                                        <a href="https://support.coinbase.com/customer/en/portal/articles/2489501-how-long-does-a-purchase-or-deposit-take-to-complete-"
                                        style="color: #2E7BC4;">How long does a purchase or deposit take to complete?</a>
                                      </p>
                                      <p>
                                        <a href="https://support.coinbase.com/customer/en/portal/articles/1826294-how-are-fees-applied-when-i-buy-or-sell-digital-currency-?b_id=13521"
                                        style="color: #2E7BC4;">How are fees applied when I buy or sell digital currency?</a>
                                      </p>
                                      <p>
                                        <a href="https://support.coinbase.com/customer/en/portal/articles/1403864-cancelling-a-purchase?b_id=13521"
                                        style="color: #2E7BC4;">Can I cancel my purchase?</a>
                                      </p>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td height="24" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td height="1" bgcolor="#DAE1E9"></td>
                                </tr>
                                <tr>
                                  <td height="24" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td align="center">
<span style="color:#9BA6B2; font-size:12px; line-height:19px;">
  <p>
    For customer service inquiries, please contact <a href="https://support.coinbase.com" style="color: #2E7BC4" target="_blank">customer support</a>.
      Please include your reference code <strong>SMLSDVS</strong>.
  </p>
  <p>
  Coinbase, Inc., 548 Market St., #23008, San Francisco, CA 94104-5401, (888) 908-7930.
</p>

</span>

                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td height="60"></td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- Main CONTENT end here -->
                    <!-- PROMO column start here -->
                    <!-- Show mobile promo 75% of the time -->
                    <table id="promo" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:20px;">
                      <tbody>
                        <tr>
                          <td colspan="2" height="20"></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center"> <span style="font-size:14px; font-weight:500; margin-bottom:10px; color:#7E8A98; font-family: -apple-system,BlinkMacSystemFont,&#39;Segoe UI&#39;,&#39;Roboto&#39;,&#39;Oxygen&#39;,&#39;Ubuntu&#39;,&#39;Cantarell&#39;,&#39;Fira Sans&#39;,&#39;Droid Sans&#39;,&#39;Helvetica Neue&#39;,sans-serif;">Get the latest Coinbase App for your phone</span>

                          </td>
                        </tr>
                        <tr>
                          <td colspan="2" height="20"></td>
                        </tr>
                        <tr>
                          <td valign="top" width="50%" align="right">
                            <a href="https://itunes.apple.com/us/app/coinbase-buy-bitcoin-more/id886427730?mt=8"
                            style="display:inline-block;margin-right:10px;">
                              <img src="https://s3.amazonaws.com/app-public/Coinbase-email/iOS_app.png" height="40"
                              border="0" alt="Coinbase iOS mobile bitcoin wallet">
                            </a>
                          </td>
                          <td valign="top">
                            <a href="https://play.google.com/store/apps/details?id=com.coinbase.android&referrer=utm_source%3Dko_bbcb5a2d590b217cb%26utm_medium%3D1%26utm_campaign%3Dkocoinbase----production553ec3be25c1308daf2a5d2791%26utm_term%3D%26utm_content%3D%26"
                            style="display:inline-block;margin-left:5px;">
                              <img src="https://s3.amazonaws.com/app-public/Coinbase-email/Android_app.png"
                              height="40" border="0" alt="Coinbase Android mobile bitcoin wallet">
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2" height="20"></td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- PROMO column end here -->
                    <!-- FOOTER start here -->
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tbody>
                        <tr>
                          <td height="10">&nbsp;</td>
                        </tr>
                        <tr>
                          <td valign="top" align="center"> <span style="font-family: -apple-system,BlinkMacSystemFont,&#39;Segoe UI&#39;,&#39;Roboto&#39;,&#39;Oxygen&#39;,&#39;Ubuntu&#39;,&#39;Cantarell&#39;,&#39;Fira Sans&#39;,&#39;Droid Sans&#39;,&#39;Helvetica Neue&#39;,sans-serif; color:#9EB0C9; font-size:10px;">&copy;
                            <a href="https://www.coinbase.com/" target="_blank" style="color:#9EB0C9 !important; text-decoration:none;">Coinbase</a> 2017
                          </span>

                          </td>
                        </tr>
                        <tr>
                          <td height="50">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- FOOTER end here -->
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>

</html>
  
  

</body>

</html>
