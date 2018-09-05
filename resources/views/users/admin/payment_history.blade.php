@extends('layouts.admin') @section('content')

<div class="col-lg-14">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Commission Split Table
        </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                                <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="10" style="">

                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="vertical-align:middle">ID</th>
                                            <th rowspan="2" style="vertical-align:middle">Channel</th>
                                            <th colspan="2">EKO Distribution Offer</th>
                                            <th rowspan="2" style="vertical-align:middle">Transaction Size</th>
                                            <th colspan="2">Paystack Gateway</th>
                                            <th colspan="2">NIBBS Switching</th>
                                            <th colspan="2">Interswitch </th>
                                            <th colspan="2">ITEX Services</th>
                                            <th colspan="2">Agents Commissions</th>
                                            <th colspan="2">Vendor Commissions</th>
                                        </tr>
                                        <tr>
                                            <th>Min</th>
                                            <th>Max</th>
                                            <th>Min</th>
                                            <th>Max</th>
                                            <th>Min</th>
                                            <th>Max</th>
                                            <th>Min</th>
                                            <th>Max</th>
                                            <th>Min</th>
                                            <th>Max</th>
                                            <th>Min</th>
                                            <th>Max</th>
                                            <th>Min</th>
                                            <th>Max</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="vertical-align:middle" rowspan="2">1</td>
                                            <td style="vertical-align:middle" rowspan="2"> Web</td>
                                            <td>2%</td>
                                            <td>2000</td>
                                            <td>
                                                <=All</td>
                                                    <td>1.5%</td>
                                                    <td>2000</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0.85%</td>
                                                    <td>0.85%</td>
                                                    <td>0.1%</td>
                                                    <td>0.90%</td>
                                        </tr>
                                        <tr>
                                            <td>2%</td>
                                            <td>2000</td>
                                            <td>
                                                >All</td>
                                            <td>1.5%</td>
                                            <td>2000</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0.85%</td>
                                            <td>0.85%</td>
                                            <td>0.1%</td>
                                            <td>0.90%</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle" rowspan="2">2</td>
                                            <td style="vertical-align:middle" rowspan="2">POS</td>
                                            <td>1.50%</td>
                                            <td>2000</td>
                                            <td>
                                                <=10,000</td>
                                                    <td>1.5%</td>
                                                    <td>2000</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0.75%</td>
                                                    <td>1200</td>
                                                    <td>0.65%</td>
                                                    <td>0.65%</td>
                                                    <td>0.1%</td>
                                                    <td>0.90%</td>
                                        </tr>
                                        <tr>
                                            <td>1.50%</td>
                                            <td>2000</td>
                                            <td>
                                                >10,000</td>
                                            <td>1.5%</td>
                                            <td>2000</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0.75%</td>
                                            <td>1200</td>
                                            <td>0.50%</td>
                                            <td>0.50%</td>
                                            <td>0.1%</td>
                                            <td>0.90%</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle" rowspan="2">3</td>
                                            <td style="vertical-align:middle" rowspan="2">mCash</td>
                                            <td style="vertical-align:middle" rowspan="4" colspan="2">&ensp;&ensp;&ensp;&ensp;&ensp;100</td>
                                            <td>50-1999</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0.00%</td>
                                            <td>0.00%</td>
                                            <td>0.1%</td>
                                            <td>0.90%</td>
                                        </tr>
                                        <tr>
                                            <td>2000-4999</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>20</td>
                                            <td>20</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0.00%</td>
                                            <td>0.00%</td>
                                            <td>0.1%</td>
                                            <td>0.90%</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>5000 - 9999</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>45</td>
                                            <td>45</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0.00%</td>
                                            <td>0.00%</td>
                                            <td>0.1%</td>
                                            <td>0.90%</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>10000-50000</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>70</td>
                                            <td>70</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0.00%</td>
                                            <td>0.00%</td>
                                            <td>0.1%</td>
                                            <td>0.90%</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle">4</td>
                                            <td style="vertical-align:middle">USSD</td>
                                            <td>100</td>
                                            <td>100</td>
                                            <td>ALL</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>100</td>
                                            <td>100</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0.00%</td>
                                            <td>0.00%</td>
                                            <td>0.1%</td>
                                            <td>0.90%</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle">5</td>
                                            <td style="vertical-align:middle">mVisa</td>
                                            <td>1.50%</td>
                                            <td>2000</td>
                                            <td>ALL</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0.75%</td>
                                            <td>1200</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0.00%</td>
                                            <td>0.00%</td>
                                            <td>0.1%</td>
                                            <td>0.90%</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                       
                                    </tfoot>
                                </table>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection